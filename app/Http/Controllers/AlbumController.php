<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use App\Models\Comment;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;

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
        $comments = Comment::where('album_id','=', $album_id)->get();
        $artist = DB::table('artists')->where('id', '=', $album->artist_id)->first();
        $rating =  DB::table('album_ratings')->where('user_id', '=', Auth::id())->where('album_id', '=', $album_id)->first();
        return view('album_show', compact('album', 'songs', 'comments', 'rating', 'artist'));
    }

    public function destroy($id)
    {
        $songs = Song::where('album_id', '=', $id)->delete();
        $ratings = DB::table('album_ratings')->where('album_id', '=', $id)->delete();
        $comments = DB::table('comments')->where('album_id', '=', $id)->delete();
        $album = Album::find($id);
        $album->delete();

        $albums = Album::orderBy('album_name')->get();
        return view('albums', compact('albums'));
    }

    public function rate(Request $request){
        $sql = "INSERT INTO `album_ratings` (`album_id`, `user_id`,`rating`) VALUES ( $request->album_id, $request->user_id, $request->rating);";
        DB::insert($sql);
        return redirect()->route('albums.show', $request->album_id);
    }

    public function edit($album_id)
    {   
        $album = Album::where('id', '=', $album_id)->first();
        $artist_id = Album::select('artist_id')->where('id', '=', $album_id)->first();
        return view('edit_album', compact('album','artist_id'));
    }

    public function update(Request $request)
    {   
        $album = Album::find($request->id);
        $album->album_name = $request->album_name;
        $album->year = $request->year;
        $album->design = $request->design;
        $album->save();
        return redirect()->route('albums.show', $request->id);
    }
}
