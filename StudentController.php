<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Hiển thị danh sách + tìm kiếm + sắp xếp + phân trang
    public function index(Request $request)
    {
        $query = Student::query();

        // Tìm kiếm theo tên
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp theo tên
        $query->orderBy('name', 'asc');

        // Phân trang (5 bản ghi / trang)
        $students = $query->paginate(5);

        return view('students.index', compact('students'));
    }

    // Hiển thị form thêm
    public function create()
    {
        return view('students.create');
    }

    // Lưu sinh viên
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'major' => 'required',
            'email' => 'required|email|unique:students,email'
        ]);

        // Lưu vào DB
        Student::create($request->all());

        return redirect()->route('students.index')
                         ->with('success', 'Thêm sinh viên thành công');
    }
}