<?php

use Illuminate\Database\Seeder;

class TableUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Helmi Sulaemi',
            'username' => 'helmi',
        	'email' => 'helmisulaemi@gmail.com',
        	'password' => bcrypt('gakada'),
        ]);

        DB::table('users')->insert([
            'name' => 'Mr. Alexander Gecko Yui',
            'username' => 'gecko yui',
            'email' => 'AlexanderGeckoYui@gmail.com',
            'password' => bcrypt('gakada'),
        ]);
    }
}
