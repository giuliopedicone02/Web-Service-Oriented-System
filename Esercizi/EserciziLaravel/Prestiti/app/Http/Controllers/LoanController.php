<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loan = Loan::all();
        $book = Book::all();
        return view('loans.list', compact('loan', 'book'));
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
        $loan = new Loan();
        $loan->book_id = request('book_id');
        $loan->user_name = request('user_name');
        $loan->email = request('email');
        $loan->loan_date = request('loan_date');
        $loan->return_date = request('return_date');
        $loan->returned = request('returned');
        $loan->save();
        return redirect('/loans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loan $loan)
    {
        $book = Book::all();
        return view('loans.edit', compact('loan', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loan $loan)
    {
        $loan->book_id = request('book_id');
        $loan->user_name = request('user_name');
        $loan->email = request('email');
        $loan->loan_date = request('loan_date');
        $loan->return_date = request('return_date');
        $loan->returned = request('returned');
        $loan->save();
        return redirect('/loans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect('/loans');
    }
}
