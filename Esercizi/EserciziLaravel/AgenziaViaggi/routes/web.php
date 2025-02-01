<?php

use App\Http\Controllers\PlaceController;
use App\Http\Controllers\TourController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/places", PlaceController::class);
Route::resource("/tours", TourController::class);
