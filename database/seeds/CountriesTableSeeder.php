<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Country::create([
       	    'name' => 'United States'
        ]);

        App\Country::create([
       	    'name' => 'England'
        ]);

        App\Country::create([
            'name' => 'Spain'
     ]);
    }
}
