<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function __construct() {
        // only Admins have access to the following methods
        $this->middleware('auth')->only(['create', 'store']);
        // // only authenticated users have access to the methods of the controller
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums', compact('albums'));
    }

    /**
     * Show the form for creating a new album.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($artist_id)
    {
        $user_id = Auth::id();
        return view('new_album', compact('artist_id', 'user_id'));
    }

    /**
     * Store a newly created album in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'album_name' => 'required|string|min:2|max:50',
            'year' => 'required|integer',
            'design' => 'required'
        );        
        $this->validate($request, $rules); 
        
        $album = new Album();
        $album->album_name = $request->album_name;
        $album->year = $request->year;
        $album->design = $request->design;
        $album->artist_id = $request->artist_id;
        $album->user_id = $request->user_id;
        $album->save();        
        return redirect('albums');
        //return view('artists');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($album_id) //
    {
        $album = Album::findOrFail($album_id);
        $songs = Song::where('album_id', $album_id)->get();
        return view('album_show', compact('album', 'songs'));
    }

    public function destroy($id)
    {
        $songs = Song::where('album_id', '=', $id)->delete();
        $album = Album::find($id);
        $album->delete();

        $albums = Album::orderBy('album_name')->get();
        return view('albums', compact('albums'));
    }
}
