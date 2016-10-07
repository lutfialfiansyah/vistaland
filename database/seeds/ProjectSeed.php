<?php

use Illuminate\Database\Seeder;

class ProjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('project')->insert([
            'name' =>  str_random(10),
            'company' =>  str_random(10),
            'area' =>  901212,
            'unit_total' => 12,
            'location' =>  str_random(10),
            'booking_free' =>  5000,
            'booking_comission' =>  2000,
            'nup_free' =>  48676,
            'nup_comission' =>  28900,
            'akad_comission' =>  2000,
        ]);

        DB::table('project')->insert([
            'name' =>  str_random(10),
            'company' =>  str_random(10),
            'area' =>  234512,
            'unit_total' => 15,
            'location' =>  str_random(10),
            'booking_free' =>  60000,
            'booking_comission' =>  20000,
            'nup_free' =>  50000,
            'nup_comission' =>  30000,
            'akad_comission' =>  2000,
        ]);

        DB::table('project')->insert([
            'name' =>  str_random(10),
            'company' =>  str_random(10),
            'area' =>  898765,
            'unit_total' => 20,
            'location' =>  str_random(10),
            'booking_free' =>  35000,
            'booking_comission' =>  10000,
            'nup_free' =>  50000,
            'nup_comission' =>  48000,
            'akad_comission' =>  2000,
        ]);
    }
}
