<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
   		'description', 'created_at','updated_at'
    ];

    public function genreFilm() {
    	return $this->hasMany('App\GenreFilm');
    }
}
