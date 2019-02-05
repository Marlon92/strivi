<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
   	    'genre_id', 'country_id', 'name', 'description', 'release_date', 'rating', 'ticket_price', 'photo', 'created_at','updated_at'
    ];

   public function genre(){
    	return $this->hasOne('App\Genre','id','genre_id');
    }

    public function country(){
    	return $this->hasOne('App\Country','id','country_id');
    }
}
