<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class CommentController extends Controller
{
    public function __construct() {

        // // only authenticated users have access to the methods of the controller
        $this->middleware('auth');
    }

    public function create()
    {
        $user_id = Auth::id();
        return view('new_artist', compact('user_id'));
    }
}
