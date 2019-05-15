<?php

use Illuminate\Database\Seeder;

class BarangaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangays')->insert([
            'city_id' => '1',
            'description' => 'Maa'
        ]);
        DB::table('barangays')->insert([
            'city_id' => '1',
            'description' => 'Sasa'
        ]);
        DB::table('barangays')->insert([
            'city_id' => '1',
            'description' => 'Mintal'
        ]);
        DB::table('barangays')->insert([
            'city_id' => '1',
            'description' => 'Panacan'
        ]);
    }
}
