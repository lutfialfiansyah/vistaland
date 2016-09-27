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
        	'name' => 'helmi',
        	'email' => 'helmisulaemi@gmail.com',
        	'password' => bcrypt('gakada'),
        ]);
    }
}
