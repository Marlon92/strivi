<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('films')->insert([
       	    'genre_id' => 1,
       	    'name' => 'Avengers End Game',
       	    'description' => 'The final battle of our heroes.',
       	    'release_date' => ''
        ]);
    }
}
