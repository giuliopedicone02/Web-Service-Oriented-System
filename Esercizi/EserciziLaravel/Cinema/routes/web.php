<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/films/addYear', function () {
    foreach (Film::all() as $film) {
        $film->year = $film->year + 1;
        $film->save();
    }
    return redirect('/films');
});

Route::post('/films/filterByGenre', function (Request $request) {
    $film = Film::where('genre_id', request('genre_id'))->get();
    $genre = Genre::all();
    return view('film.list', compact('film', 'genre'));
});

Route::resource('/genres', GenreController::class);
Route::resource('/films', FilmController::class);
