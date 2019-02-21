<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Post::create([
       	    'user_id' => 1,
       	    'film_id' => 1,
       	    'comment' => 'Its an amazing movie.',
       	    'comment_date' => '2019-04-27 11:00:00'
        ]);

        App\Post::create([
       	    'user_id' => 1,
       	    'film_id' => 1,
       	    'comment' => 'Its the best movie of the world.',
       	    'comment_date' => '2019-04-27 11:20:00'
        ]);

        App\Post::create([
       	    'user_id' => 1,
       	    'film_id' => 2,
       	    'comment' => 'Its an amazing movie.',
       	    'comment_date' => '2019-04-27 13:13:00'
        ]);

        App\Post::create([
       	    'user_id' => 1,
       	    'film_id' => 2,
       	    'comment' => 'Its the best movie of the world.',
       	    'comment_date' => '2019-04-27 14:20:00'
        ]);

        App\Post::create([
       	    'user_id' => 1,
       	    'film_id' => 3,
       	    'comment' => 'Its an amazing movie.',
       	    'comment_date' => '2019-04-27 09:13:00'
        ]);

        App\Post::create([
       	    'user_id' => 1,
       	    'film_id' => 3,
       	    'comment' => 'Its the best movie of the world.',
       	    'comment_date' => '2019-04-27 22:20:00'
        ]);
    }
}
