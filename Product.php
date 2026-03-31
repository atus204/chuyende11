<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Cho phép insert dữ liệu
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category'
    ];
}