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
            'name' =>  'Bale Bengong',
            'company' => 'Sejahtera',
            'area' =>  901212,
            'unit_total' => 12,
            'location' =>  'Bogor Timur',
            'booking_free' =>  5000,
            'booking_comission' =>  2000,
            'nup_free' =>  48676,
            'nup_comission' =>  28900,
            'akad_comission' =>  2000,
        ]);

        DB::table('project')->insert([
            'name' =>  'Gading Gerande',
            'company' =>  'Komplek Jaya',
            'area' =>  234512,
            'unit_total' => 15,
            'location' =>  'Kelapa Gading',
            'booking_free' =>  60000,
            'booking_comission' =>  20000,
            'nup_free' =>  50000,
            'nup_comission' =>  30000,
            'akad_comission' =>  2000,
        ]);

        DB::table('project')->insert([
            'name' =>  'Gading Indah',
            'company' =>  'Komplek Makmur',
            'area' =>  898765,
            'unit_total' => 20,
            'location' =>  'Kelapa Gading',
            'booking_free' =>  35000,
            'booking_comission' =>  10000,
            'nup_free' =>  50000,
            'nup_comission' =>  48000,
            'akad_comission' =>  2000,
        ]);

        DB::table('strategic_type')->insert([
            'type' =>  'Park',
        ]);

        DB::table('strategic_type')->insert([
            'type' =>  'Cool',
        ]);

        DB::table('kavling_type')->insert([
            'type' =>  's1',
            'description' => str_random(30),
        ]);

        DB::table('kavling_type')->insert([
            'type' =>  's2',
            'description' => str_random(30),
        ]);

        DB::table('kavling')->insert([
            'number' =>  3452,
            'field_size' =>  200,
            'bpn_size' =>  234512,
            'left_over_size' => 15,
            'Imb_parent' =>  str_random(10),
            'Imb_parent_date' =>  60000,
            'Imb_fraction' =>  20000,
            'Imb_fraction_date' =>  50000,
            'pbb' =>  30000,
            'pln_no' =>  2000,
            'status' =>  "Open",
            'progress' =>  "Genteng",
            'strategic_type_id' =>  2,
            'project_id' =>  2,
            'kavling_type_id' =>  1,
        ]);

        DB::table('kavling')->insert([
            'number' =>  3451,
            'field_size' =>  200,
            'bpn_size' =>  898765,
            'left_over_size' => 20,
            'Imb_parent' =>  str_random(10),
            'Imb_parent_date' =>  35000,
            'Imb_fraction' =>  10000,
            'Imb_fraction_date' =>  50000,
            'pbb' =>  48000,
            'pln_no' =>  2000,
            'status' =>  "Open",
            'progress' =>  "Keramik",
            'strategic_type_id' =>  1,
            'project_id' =>  2,
            'kavling_type_id' =>  1,
        ]);

        DB::table('siteplan')->insert([
            'id' =>  1,
            'image' =>  'satu.jpg',
            'project_id' =>  1,
        ]);

        DB::table('siteplan')->insert([
            'id' =>  2,
            'image' =>  'dua.jpg',
            'project_id' =>  1,
        ]);
        DB::table('price')->insert([
            'expired_date' =>  '2016-10-12',
            'price' =>  '10000000',
            'administration_price' =>'400000',
            'renovation_price'=>'500000',
            'left_over_price'=>'200000',
            'move_kavling_price'=>'100000',
            'change_name_price'=>'50000',
            'management_confirm_status'=>'10000',
            'memo'=>'tidak ada kata untuk memo',
            'project_id'=>2,
            'kavling_type_id'=>1
        ]);
        DB::table('price')->insert([
            'expired_date' =>  '2016-10-12',
            'price' =>  '10000000',
            'administration_price' =>'400000',
            'renovation_price'=>'500000',
            'left_over_price'=>'200000',
            'move_kavling_price'=>'100000',
            'change_name_price'=>'50000',
            'management_confirm_status'=>'10000',
            'memo'=>'tidak ada kata untuk memo',
            'project_id'=>1,
            'kavling_type_id'=>2
        ]);


    }
}
