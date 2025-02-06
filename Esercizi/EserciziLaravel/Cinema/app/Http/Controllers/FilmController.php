<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();
        $genre = Genre::all();
        return view('film.list', compact('film', 'genre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $film = new Film();
        $film->name = request('name');
        $film->year = request('year');
        $film->author = request('author');
        $film->genre_id = request('genre_id');
        $film->save();
        return redirect('/films');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        $genre = Genre::all();
        return view('film.edit', compact('film', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $film->name = request('name');
        $film->year = request('year');
        $film->author = request('author');
        $film->genre_id = request('genre_id');
        $film->save();
        return redirect('/films');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return redirect('/films');
    }
}
