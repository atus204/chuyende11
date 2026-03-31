<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Cho phép thêm dữ liệu vào các cột này
    protected $fillable = ['name', 'major', 'email'];
}