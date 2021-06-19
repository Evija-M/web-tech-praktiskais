<?php

namespace App\Http\Controllers;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;





class ArtistController extends Controller
{
    public function __construct() {
        // only Admins have access to the following methods
        $this->middleware('auth')->only(['create', 'store','destroy', 'edit', 'update']);
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
        // $books = Book::orderBy('title')->get();
        // return view('books',  compact('books'));
        // if($genre == null){
            $artists = Artist::orderBy('artist_name')->get();
            $message = "";
            return view('artists', compact('artists', 'message'));
        // }
        // else{
        //     $artists = Artist::where('genre_id', $genre)->get();
        //     return view('artists', compact('artists'));
        // }
        
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
            'genre' =>'required'
        );        
        $this->validate($request, $rules); 
        
        $artist = new Artist();
        $artist->artist_name = $request->artist_name;
        $artist->year = $request->year;
        $artist->genre_id = Genre::where('genre_name', $request->genre)->value('genre_id');;
        $artist->user_id = $request->user_id;
        $artist->save();
        
        //artist id un genre id
        
        $sql = "INSERT INTO `artists_and_genres` (`artist_id`, `genre_id`) VALUES ( $artist->id, $artist->genre_id);";
        DB::insert($sql);
        return redirect('artists');
        //return view('artists');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($artist_id) //
    {
        $artist = Artist::where('id', $artist_id)->first();
        $albums = Album::where('artist_id',$artist_id)->get();
        return view('artist_show', compact('artist', 'albums'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($artist_id)
    {
        $artist = Artist::where('id', '=', $artist_id)->first();
        $genre = DB::table('artists_and_genres')->select('genre_id')->where('artist_id', '=', $artist_id)->first();
        return view('edit_artist', compact('artist_id', 'artist', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $artist = Artist::find($request->id);
        $artist->artist_name = $request->artist_name;
        $artist->year = $request->year;
        $artist->genre = $request->genre;
        $artist->save();
        $albums = Album::where('artist_id',$request->id)->get();
        return view('artist_show', compact('artist','albums'));
    }


    // public function confirmDelete($id){
    //     return function(){
    //         echo "Do you really wish to delete this artist? All albums, songs and comments will also be deleted";
    //     };
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);
        $songs = Song::where('artist_id', '=', $id)->get();
        $albums = Album::where('artist_id', '=', $id)->get();
        DB::table('artists_and_genres')->where('artist_id', '=', $id)->delete();
        foreach ($songs as $song) {
            DB::table('comments')->where('song_id', '=', $song->id)->delete();
        }

        foreach ($albums as $album) {
            DB::table('comments')->where('album_id', '=', $album->id)->delete();
        }

        foreach ($albums as $album) {
            DB::table('album_ratings')->where('album_id', '=', $album->id)->delete();
        }

        $songs = Song::where('artist_id', '=', $id)->delete();
        $albums = Album::where('artist_id', '=', $id)->delete();

        $artist->delete();

        $artists = Artist::orderBy('artist_name')->get();
        return view('artists', compact('artists'));
    }
}
