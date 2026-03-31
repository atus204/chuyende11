<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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