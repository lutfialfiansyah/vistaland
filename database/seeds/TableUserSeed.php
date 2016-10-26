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

        DB::table('official')->insert([
            'name' =>  'Dylie Jall',
            'email' => 'dyliejall@gmail.com',
            'status' =>  'Active',
            'role' => 'Admin',
        ]);
        DB::table('official')->insert([
            'name' =>  'Frenk lykui',
            'email' => 'frenklykui@gmail.com',
            'status' =>  'Active',
            'role' => 'Field Executive',
        ]);
        DB::table('official')->insert([
            'name' =>  'Girynu Fiyla',
            'email' => 'girynufiyla@gmail.com',
            'status' =>  'Active',
            'role' => 'Project Manager Assistant',
        ]);
        DB::table('official')->insert([
            'name' =>  'Hyne wekie',
            'email' => 'hynewekie@gmail.com',
            'status' =>  'Active',
            'role' => 'Staff Finance',
        ]);
        DB::table('official')->insert([
            'name' =>  'Jhon Diery',
            'email' => 'jhondiery@gmail.com',
            'status' =>  'Active',
            'role' => 'Project Manager',
        ]);
        DB::table('official')->insert([
            'name' =>  'Yulia Geraha',
            'email' => 'yuliageraha@gmail.com',
            'status' =>  'Active',
            'role' => 'Staff Inhouse',
        ]);
        DB::table('official')->insert([
            'name' =>  'Muil liy',
            'email' => 'muilliy@gmail.com',
            'status' =>  'Active',
            'role' => 'Project Manager Assistant',
        ]);
        DB::table('official')->insert([
            'name' =>  'Gyia jito',
            'email' => 'gyiajito22@gmail.com',
            'status' =>  'Active',
            'role' => 'Project Manager',
        ]);
        DB::table('official')->insert([
            'name' =>  'Stink Der',
            'email' => 'stinkder@gmail.com',
            'status' =>  'Active',
            'role' => 'Staff Inhouse',
        ]);
        DB::table('official')->insert([
            'name' =>  'Aplie lilie',
            'email' => 'aplielilie91@gmail.com',
            'status' =>  'Active',
            'role' => 'Staff Finance',
        ]);
    }
}
