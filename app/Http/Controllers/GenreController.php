<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        // $books = Book::orderBy('title')->get();
        // return view('books',  compact('books'));
        $genres = Genre::all();
        //$albums = Album::where('user_id', Auth::id());
        return view('genres', compact('genres'));
    }
}
