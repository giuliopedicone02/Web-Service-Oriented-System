<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/players/orderByAge', function () {
    $player = Player::orderBy('age')->get();
    $team = Team::all();
    return view("player.list", compact('player', 'team'));
});

Route::get('/players/greaterThan18', function () {
    $player = Player::where('age', '>=', '18')->get();
    $team = Team::all();
    return view("player.list", compact('player', 'team'));
});

Route::get('/players/delete/lowerThan18', function () {
    Player::where('age', '<', '18')->delete();
    return redirect("/players");
});

Route::resource("/teams", TeamController::class);
Route::resource("/players", PlayerController::class);
