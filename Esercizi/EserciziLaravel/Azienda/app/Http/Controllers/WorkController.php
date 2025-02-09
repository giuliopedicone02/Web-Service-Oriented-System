<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $work = Work::all();
        $department = Department::all();
        return view('work.list', compact('work', 'department'));
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
        $work = new Work();
        $work->name = request('name');
        $work->salary = request('salary');
        $work->employees = request('employees');
        $work->availability = request('availability');
        $work->department_id = request('department_id');
        $work->save();
        return redirect('/works');
    }

    /**
     * Display the specified resource.
     */
    public function show(Work $work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        $department = Department::all();
        return view('work.edit', compact('work', 'department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
        $work->name = request('name');
        $work->salary = request('salary');
        $work->employees = request('employees');
        $work->availability = request('availability');
        $work->department_id = request('department_id');
        $work->save();
        return redirect('/works');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect('/works');
    }
}
