<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
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

Route::post('/players/findByTeam', function (Request $request) {
    $player = Player::where('team_id', request('team_id'))->get();
    $team = Team::all();
    return view("player.list", compact('player', 'team'));
});


Route::post('/players/greaterThanAge', function (Request $request) {
    $player = Player::where('age', '>=', request('age'))->get();
    $team = Team::all();
    return view("player.list", compact('player', 'team'));
});

Route::post('/teams/findByWin', function (Request $request) {
    $team = Team::where('champions', '>=', request('campionati'))->get();
    return view("team.list", compact('team'));
});

Route::get('/teams/halfCups', function () {
    foreach (Team::all() as $team) {
        $team->cups = floor($team->cups / 2);
        $team->save();
    }
    return redirect("/teams");
});

Route::resource("/teams", TeamController::class);
Route::resource("/players", PlayerController::class);
