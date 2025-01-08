<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['azione_pref' => ['dormire']]);
});

Route::get('/alt', function () {
    return view('welcome', ['azione_pref' => ['correre']]);
});

Route::get('/foreach', function () {
    return view('welcome', ['azione_pref' => ['correre', 'dormire']]);
});


/*
Alternativa:

Route::get('/', function () {
    return "<h1> Hello </h1>";
});

*/

Route::get('/hello', function () {
    return view('hello', ['tempo' => request('time')]);
});

Route::get('/ciao', function () {
    return "<h1> Ciao! </h1>";
});
