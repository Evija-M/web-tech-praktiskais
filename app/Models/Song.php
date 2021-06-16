<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'year',
    ];
    //relation with artist
    public function artist(){
        return $this->belongsTo(Artist::class);
    }
    //relation with album
    public function album(){
        return $this->belongsTo(Album::class);
    }
    //relation with comment
    public function comment(){
        return $this->hasMany(Comment::class);
    }

}
