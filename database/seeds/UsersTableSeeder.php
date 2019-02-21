<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
       	    'name' => 'Marlon Mejía',
       	    'email' => 'j_marlon95@live.com',
       	    'password' => bcrypt('marliton21'),
        ]);

        /*App\Users::create([
       	    'name' => 'Juan Ortiz',
       	    'email' => 'marsheytech@gmail.com',
       	    'password' => bcrypt('marliton21'),
        ]);*/
    }
}
