<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Comment;
use App\Models\User;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'album_name',
        'year',
        'design',
    ];

    //relation with artist
    public function artist(){
        return $this->belongsTo(Artist::class);
    }
    //relation with song
    public function song(){
        return $this->hasMany(Song::class);
    }
    //relation with comment
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    //relation with user
    public function user(){
        return $this->belongsTo(User::class);
    }

}
