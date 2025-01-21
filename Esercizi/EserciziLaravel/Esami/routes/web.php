<?php

use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

Route::resource("/exams", ExamController::class);
