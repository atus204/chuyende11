<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'course'])->get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('enrollments.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::findOrFail($data['student_id']);
        $course = Course::findOrFail($data['course_id']);

        // Không cho đăng ký trùng
        if (Enrollment::where('student_id', $student->id)->where('course_id', $course->id)->exists()) {
            return back()->withErrors(['duplicate' => 'Sinh viên đã đăng ký môn này']);
        }

        // Giới hạn tối đa 18 tín chỉ
        $current = $student->totalCredits();
        if ($current + $course->credits > 18) {
            return back()->withErrors(['credits' => 'Vượt quá giới hạn 18 tín chỉ']);
        }

        Enrollment::create($data);

        return redirect()->route('enrollments.index')->with('success', 'Đăng ký thành công');
    }
}
