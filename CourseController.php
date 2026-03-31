<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'credits' => 'required|integer|min:1|max:18',
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Thêm môn học thành công');
    }
}
