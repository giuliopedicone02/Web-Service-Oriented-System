<?php

use App\Http\Controllers\ChefController;
use App\Http\Controllers\RestaurantController;
use App\Models\Chef;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/restaurants/filterByChef', function (Request $request) {
    $restaurant = Restaurant::where('chef_id', request('chef_id'))->get();
    $chefs = Chef::all();
    return view('restaurants.list', compact('chefs', 'restaurant'));
});

Route::get('/chefs/deleteAll', function () {
    foreach (Chef::all() as $chef) {
        $chef->delete();
    }

    return redirect('/chefs');
});

Route::get('/restaurants/deleteAll', function () {
    foreach (Restaurant::all() as $chef) {
        $chef->delete();
    }

    return redirect('/restaurants');
});

Route::resource("/chefs", ChefController::class);
Route::resource("/restaurants", RestaurantController::class);
