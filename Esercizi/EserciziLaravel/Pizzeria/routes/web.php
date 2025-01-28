<?php

use App\Http\Controllers\ChefController;
use App\Http\Controllers\RestaurantController;
use App\Models\Chef;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/chefs", ChefController::class);
Route::resource("/restaurants", RestaurantController::class);
