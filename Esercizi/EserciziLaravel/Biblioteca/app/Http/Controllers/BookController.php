<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $genres = Genre::all();
        return view("books.list", compact("genres", "books"));
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
        $book = new Book();
        $book->name = request('name');
        $book->author = request('author');
        $book->year = request('year');
        $book->genre_id = request('genre_id');
        $book->save();
        return redirect("/books");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $genres = Genre::all();
        return view("books.edit", compact("book", "genres"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->name = request('name');
        $book->author = request('author');
        $book->year = request('year');
        $book->genre_id = request('genre_id');
        $book->save();
        return redirect("/books");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect("/books");
    }
}
