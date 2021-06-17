<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::all();
        return view('songs', compact('songs'));
    }

    /**
     * Show the form for creating a new genre.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        $artist_id = Album::select('artist_id')->where('id','=', $album_id)->first();
        return view('new_song', compact('album_id', 'artist_id'));
    }


    /**
     * Store a newly created genre in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required|string|min:2|max:50',
            'year' => 'required|integer',
        );        
        $this->validate($request, $rules); 
        
        $song = new Song();
        $song->title = $request->title;
        $song->year = $request->year;
        $song->artist_id = $request->artist_id;
        $song->album_id = $request->album_id;
        $song->save();        
        return redirect('songs');
        //return view('artists');
    }
}
