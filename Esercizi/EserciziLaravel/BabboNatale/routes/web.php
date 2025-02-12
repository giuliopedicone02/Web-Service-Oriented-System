<?php

use App\Http\Controllers\GiftController;
use App\Http\Controllers\KidController;
use App\Models\Gift;
use App\Models\Kid;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kids/allGood', function () {
    foreach (Kid::all() as $item) {
        $item->good = true;
        $item->save();
    }

    foreach (Gift::all() as $item) {
        $item->status = true;
        $item->save();
    }

    return redirect('/kids');
});

Route::get('/kids/allBad', function () {
    foreach (Kid::all() as $item) {
        $item->good = false;
        $item->save();
    }

    foreach (Gift::all() as $item) {
        $item->status = false;
        $item->save();
    }

    return redirect('/kids');
});

Route::get('/gifts/deleteAnnullati', function () {
    Gift::where('status', '0')->delete();
    return redirect('/gifts');
});

Route::get('/kids/deleteCattivi', function () {
    Kid::where('good', '0')->delete();
    return redirect('/kids');
});

Route::resource('/kids', KidController::class);
Route::resource('/gifts', GiftController::class);
