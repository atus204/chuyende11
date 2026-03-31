<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    // Cho phép thêm dữ liệu vào các cột này
    protected $fillable = ['name', 'major', 'email'];

    // Các môn học sinh viên đã đăng ký
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimestamps();
    }

    // Tổng tín chỉ đã đăng ký
    public function totalCredits(): int
    {
        return (int) $this->courses()->sum('credits');
    }
}