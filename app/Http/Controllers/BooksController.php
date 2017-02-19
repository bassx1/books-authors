<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books/create', ['book' => new Book()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BooksRequest|Request $request
     * @param Book $book
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request, Book $book)
    {
        $book = $book->create($request->all());
        $book->authors()->sync($request->get('authors') ?: []);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BooksRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        $book->authors()->sync($request->get('authors') ?: []);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->back();
    }
}
