<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
   	    'user_id', 'film_id', 'comment', 'comment_date', 'created_at','updated_at'
    ];

    public function user(){
    	return $this->hasOne('App\Menu','id','user_id');
	}

	public function film(){
    	return $this->hasOne('App\Menu','id','film_id');
	}
}
