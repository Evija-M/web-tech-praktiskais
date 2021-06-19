<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;

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

    public function artistsGenre($genre_id){
        $artist_id = DB::table('artists_and_genres')->where('genre_id', '=', $genre_id)->first();

        if(isset($artist_id)){
            $artists = Artist::where('id', '=', $artist_id->artist_id)->get();
            return view('artists', compact('artists'));
        }
        else{
            $message = "There are no artists of this genre yet";
            $artists = Artist::where('id', '=', 0)->get();
            return view('artists', compact('message', 'artists'));
        }
        
    }
}
