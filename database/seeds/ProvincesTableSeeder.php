<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
            'region_id' => '15',
            'description' => 'Compostela Valley'
        ]);
        DB::table('provinces')->insert([
            'region_id' => '15',
            'description' => 'Davao del Norte'
        ]);
        DB::table('provinces')->insert([
            'region_id' => '15',
            'description' => 'Davao Oriental'
        ]);
        DB::table('provinces')->insert([
            'region_id' => '15',
            'description' => 'Davao del Sur'
        ]);
        DB::table('provinces')->insert([
            'region_id' => '15',
            'description' => 'Davao'
        ]);
    }
}
