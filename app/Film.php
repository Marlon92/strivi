<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
   	    'country_id', 'name', 'description', 'release_date', 'rating', 'ticket_price', 'photo', 'slug', 'created_at','updated_at'
    ];

    public function country(){
    	return $this->hasOne('App\Country','id','country_id');
    }

    public function genreFilm(){
    	return $this->hasMany('App\GenreFilm');
    }

    public function post() {
    	return $this->hasMany('App\Post');
    }
}
