<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurant = Restaurant::all();
        $chefs = Chef::all();
        return view("restaurants.list", compact("restaurant", "chefs"));
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
        $restaurant = new Restaurant();
        $restaurant->name = request('name');
        $restaurant->foundation = request('foundation');
        $restaurant->star = request('star');
        $restaurant->chef_id = request('chefId');
        $restaurant->save();
        return redirect("/restaurants");
    }

    /**
     * Display the specified resource.
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $chefs = Chef::all();
        return view("restaurants.edit", compact("restaurant", "chefs"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->name = request('name');
        $restaurant->foundation = request('foundation');
        $restaurant->star = request('star');
        $restaurant->chef_id = request('chefId');
        $restaurant->save();
        return redirect("/restaurants");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect("/restaurants");
    }
}
