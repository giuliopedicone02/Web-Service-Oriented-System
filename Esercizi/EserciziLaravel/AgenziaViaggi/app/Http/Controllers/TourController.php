<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tour = Tour::all();
        $place = Place::all();
        return view("tour.list", compact('tour', 'place'));
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
        $tour = new Tour();
        $tour->title = request('title');
        $tour->place_id = request('place_id');
        $tour->price = request('price');
        $tour->save();
        return redirect("/tours");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tour $tour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        $place = Place::all();
        return view("tour.edit", compact('tour', 'place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {
        $tour->title = request('title');
        $tour->place_id = request('place_id');
        $tour->price = request('price');
        $tour->save();
        return redirect("/tours");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect("/tours");
    }
}
