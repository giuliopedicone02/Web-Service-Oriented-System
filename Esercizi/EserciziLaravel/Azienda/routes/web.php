<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\WorkController;
use App\Models\Department;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/works/filterByDepartment', function (Request $request) {
    $work = Work::where('department_id', request('department_id'))->get();
    $department = Department::all();
    return view('work.list', compact('work', 'department'));
});

Route::resource('/departments', DepartmentController::class);
Route::resource('/works', WorkController::class);
