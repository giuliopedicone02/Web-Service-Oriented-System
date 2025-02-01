<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Models\Brand;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/brands", BrandController::class);
Route::resource("/products", ProductController::class);
