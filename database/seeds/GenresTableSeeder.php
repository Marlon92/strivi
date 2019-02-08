<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Genre::create([
       	    'description' => 'Action',
        ]);

        App\Genre::create([
       	    'description' => 'Animation',
        ]);
    }
}
