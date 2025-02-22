<?php

use App\Http\Controllers\GiftController;
use App\Http\Controllers\KidController;
use App\Models\Gift;
use App\Models\Kid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/kids/filterByGift', function (Request $request) {
    $kid = Kid::where('gift_id', request('gift_id'))->get();
    $gift = Gift::all();
    return view('kid.list', compact('kid', 'gift'));
});

Route::resource('/gifts', GiftController::class);
Route::resource('/kids', KidController::class);
