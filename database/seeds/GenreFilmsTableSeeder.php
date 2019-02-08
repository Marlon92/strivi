<?php

use Illuminate\Database\Seeder;

class GenreFilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\GenreFilm::create([
       	    'film_id' => 1,
       	    'genre_id' => 1
        ]);

        App\GenreFilm::create([
       	    'film_id' => 2,
       	    'genre_id' => 1
        ]);

        App\GenreFilm::create([
       	    'film_id' => 3,
       	    'genre_id' => 1
        ]);

        App\GenreFilm::create([
       	    'film_id' => 3,
       	    'genre_id' => 2
        ]);
    }
}
