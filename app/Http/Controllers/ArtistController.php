<?php

namespace App\Http\Controllers;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtistController extends Controller
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
        $artists = Artist::all();
        return view('artists', compact('artists'));
    }

    /**
     * Show the form for creating a new genre.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::id();
        return view('new_artist', compact('user_id'));
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
            'artist_name' => 'required|string|min:2|max:50',
            'year' => 'required|integer',
        );        
        $this->validate($request, $rules); 
        
        $artist = new Artist();
        $artist->artist_name = $request->artist_name;
        var_dump($artist->artist_name);
        $artist->year = $request->year;
        $artist->user_id = $request->user_id;
        $artist->save();        
        return redirect('artists');
        //return view('artists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //
    {
        $artist = Artist::findOrFail($id);
        $albums = $artist->albums;
        $songs = $artist->songs;
        $genres = $artist->genres;
        return view('artists', compact('artist', 'albums', 'songs', 'genres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
