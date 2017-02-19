<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorsRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = new Author();
        return view('authors.create', compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorsRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request)
    {
        Author::create($request->all());
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::with('books')->findOrFail($id);
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AuthorsRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::destroy($id);
        return redirect()->back();
    }
}
