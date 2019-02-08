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
        App\Film::create([
            'country_id' => 1,
       	    'name' => 'Avengers End Game',
       	    'description' => 'The final battle of our heroes.',
       	    'release_date' => '2019-04-27 00:00:00',
            'rating' => 5,
            'ticket_price' => 25,
            'photo' => '',
            'slug' => 'avengers'
        ]);

        App\Film::create([
            'country_id' => 1,
       	    'name' => 'Captain Marvel',
       	    'description' => 'The new Super-heroe has come.',
       	    'release_date' => '2019-03-24 00:00:00',
            'rating' => 4,
            'ticket_price' => 20,
            'photo' => '',
            'slug' => 'cap-marvel'
        ]);

        App\Film::create([
            'country_id' => 2,
       	    'name' => 'Dumbo',
       	    'description' => 'Elephant that want to fly.',
       	    'release_date' => '2019-05-14 00:00:00',
            'rating' => 3,
            'ticket_price' => 15,
            'photo' => '',
            'slug' => 'dumbo'
        ]);
    }
}
