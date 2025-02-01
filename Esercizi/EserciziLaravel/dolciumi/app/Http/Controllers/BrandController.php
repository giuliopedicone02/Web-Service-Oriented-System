<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::all();
        return view('brand.list', compact('brand'));
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
        $brand = new Brand();
        $brand->name = request('name');
        $brand->employees = request('employees');
        $brand->save();
        return redirect("/brands");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view("brand.edit", compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $brand->name = request('name');
        $brand->employees = request('employees');
        $brand->save();
        return redirect("/brands");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect("/brands");
    }
}
