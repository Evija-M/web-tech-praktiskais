<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    //relation with user
    public function user(){
        return $this->belongsTo(User::class);
    }
    //relation with album
    public function album(){
        return $this->belongsTo(Album::class);
    }
    //relation with song
    public function song(){
        return $this->belongsTo(Song::class);
    }
}
