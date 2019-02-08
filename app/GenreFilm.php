<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreFilm extends Model
{
    
    protected $fillable = ['id', 'film_id', 'genre_id', 'created_at', 'updated_at']; 

    /*public function genre(){
    	return $this->hasOne('App\Genre','id','genre_id');
    }

    public function film(){
    	return $this->hasOne('App\Film','id','film_id');
    }*/

    public function genre() {
    	return $this->belongsTo('App\Genre');
    }

    public function film() {
    	return $this->belongsTo('App\Film');
    }

}
