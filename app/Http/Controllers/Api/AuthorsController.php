<?php

namespace App\Http\Controllers\Api;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorsController extends Controller
{
    public function index()
    {
        return Author::with('books')->get();
    }
}
