<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'province_id' => '5',
            'description' => 'Davao City'
        ]);
        DB::table('cities')->insert([
            'province_id' => '1',
            'description' => 'Compostela'
        ]);
        DB::table('cities')->insert([
            'province_id' => '2',
            'description' => 'Tagum City'
        ]);
        DB::table('cities')->insert([
            'province_id' => '3',
            'description' => 'Mati City'
        ]);
        DB::table('cities')->insert([
            'province_id' => '4',
            'description' => 'Digos City'
        ]);
    }
}
