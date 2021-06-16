<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    //relaton with artist
    public function artist(){
        return $this->belongsTo(Artist::class);
    }
}
