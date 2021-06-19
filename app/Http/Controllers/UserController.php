<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        // only Admins have access to the following methods
        $this->middleware('admin')->only(['index', 'destroy']);
    }
    
    public function index(){
        $users = User::all();
        return view('users', compact('users'));
    }

    public function destroy(){
        //
    }
}
