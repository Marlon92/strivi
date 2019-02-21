<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(FilmsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(GenreFilmsTableSeeder::class);
    }
}
