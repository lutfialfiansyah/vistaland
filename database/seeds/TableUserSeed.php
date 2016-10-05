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
            'name' => 'Master Admin',
            'username' => 'master',
            'email' => 'master_vistaland@gmail.com',
            'password' => bcrypt('masteradmin'),
        ]);
    }
}
