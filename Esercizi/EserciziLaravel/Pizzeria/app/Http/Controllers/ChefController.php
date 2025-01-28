<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chef = Chef::all();
        return view("chef.list", compact("chef"));
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
        $chef = new Chef();
        $chef->name = request('name');
        $chef->age = request('age');
        $chef->level = request('level');
        $chef->save();
        return redirect("/chefs");
    }

    /**
     * Display the specified resource.
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chef $chef)
    {
        return view("chef.edit", compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chef $chef)
    {
        $chef->name = request('name');
        $chef->age = request('age');
        $chef->level = request('level');
        $chef->save();
        return redirect("/chefs");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect("/chefs");
    }
}
