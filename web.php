<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Trang mặc định (có thể giữ hoặc xoá)
Route::get('/', function () {
    return redirect('/products');
});

// Route CRUD sản phẩm
Route::resource('products', ProductController::class);

// Students, Courses, Enrollments (Đăng ký môn học)
Route::resource('students', StudentController::class)->only(['index','create','store']);
Route::resource('courses', CourseController::class)->only(['index','create','store']);

Route::get('enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
Route::get('enrollments/create', [EnrollmentController::class, 'create'])->name('enrollments.create');
Route::post('enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');