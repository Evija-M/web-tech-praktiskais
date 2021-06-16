<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = [
        'artist_name',
        'year',
    ];

    //relation with User
    public function user(){
        return $this->belongsTo(User::class);
    }
    //relaton with Album
    public function album(){
        return $this->hasMany(Album::class);
    }
    //relation with song
    public function song(){
        return $this->hasMany(Song::class);
    }
    //relation with genre
    public function genre(){
        return $this->hasMany(Genre::class);
    }
}
