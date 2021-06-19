<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class CommentController extends Controller
{
    public function __construct() {

        // // only authenticated users have access to the methods of the controller
        $this->middleware('auth');
    }

    public function show($album)
    {
        return view('add_comment', compact('album'));
    }

    public function store(Request $request){
        
        $comment = new Comment();
        $comment->content = $request->content;
        //$artist->genre_id = Genre::where('genre_name', $request->genre)->value('genre_id');;
        $comment->user_id = $request->user_id;
        $comment->album_id = $request->album_id;
        $comment->song_id = $request->song_id;
        $comment->save();

        // $album = $request->album_id;
        // $comments = Comment::where('album_id','LIKE', $album)->get();
        
        //artist id un genre id
        if($comment->song_id == null){
            return redirect()->route('albums.show', $comment->album_id);
        }
        else{
            return redirect()->route('songs.show', $comment->song_id);
        }
        
        
    }
}
