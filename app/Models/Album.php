<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

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
}
