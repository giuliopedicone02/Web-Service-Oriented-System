<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loans/filterByBook/{id}', function ($id) {

    $loan = Loan::where('book_id', $id)->get();
    $book = Book::all();
    return view('loans.list', compact('loan', 'book'));
});


Route::post('/loans/filterByBook', function (Request $request) {

    $loan = Loan::where('book_id', request('book_id'))->get();
    $book = Book::all();
    return view('loans.list', compact('loan', 'book'));
});


Route::resource('/books', BookController::class);
Route::resource('/loans', LoanController::class);
