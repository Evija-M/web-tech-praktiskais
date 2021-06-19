<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Comment;
use App\Models\User;
use App\Models\Artist;
use Illuminate\Support\Facades\DB;

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
        );        
        $this->validate($request, $rules); 
        
        $song = new Song();
        $song->title = $request->title;
        $song->artist_id = $request->artist_id;
        $song->album_id = $request->album_id;
        $song->save();     
        
        $album = $song->album_id;
        return redirect()->route('albums.show', $album);
    }

    public function show($song_id) //
    {
        $song = Song::findOrFail($song_id);
        $comments = Comment::where('song_id','=', $song_id)->get();
        
        $user = Artist::where('id', '=', $song->artist_id)->first();
        return view('song_show', compact('song', 'comments', 'user'));
    }


    public function edit($song_id)
    {
        // $artist_id = Song::select('artist_id')->where('id', '=', $song_id)->first();
        // $album_id = Song::select('album_id')->where('id', '=', $song_id)->first();
        return view('edit_song', compact('album_id','artist_id', 'song_id'));
    }


    public function update(Request $request)
    {   
        $song = Song::find($request->song_id);
        $song->title = $request->title;
        // $song->album_id = $request->album_id;
        // $song->artist_id = $request->artist_id;
        $song->save();
        return redirect()->route('songs.show', $request->song_id);
    }


    public function destroy($song_id)
    {
        
        //$comments = DB::table('comments')->where('song_id', '=', $song_id)->delete();
        $song = Song::find($song_id);
        $album = Album::where('id', '=', $song->album_id)->first();
        $song->delete();
        return redirect()->route('albums.show', $album);
    }
}
