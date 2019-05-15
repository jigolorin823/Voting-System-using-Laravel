<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regions')->insert([
            'description' => 'AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)'
        ]);
        DB::table('regions')->insert([
            'description' => 'CORDILLERA ADMINISTRATIVE REGION (CAR)'
        ]);
        DB::table('regions')->insert([
            'description' => 'NATIONAL CAPITAL REGION (NCR)'
        ]);
        DB::table('regions')->insert([
            'description' => 'I-Ilocos Region'
        ]);
        DB::table('regions')->insert([
            'description' => 'II-Cagayen Valley'
        ]);
        DB::table('regions')->insert([
            'description' => 'III-Central Luzon'
        ]);
        DB::table('regions')->insert([
            'description' => 'IVA-CALABARZON'
        ]);
        DB::table('regions')->insert([
            'description' => 'IVB-MIMAROPA'
        ]);
        DB::table('regions')->insert([
            'description' => 'V-Bicol Region'
        ]);
        DB::table('regions')->insert([
            'description' => 'VI-Western Visayas'
        ]);
        DB::table('regions')->insert([
            'description' => 'VII-Central Visayas'
        ]);
        DB::table('regions')->insert([
            'description' => 'VIII-Eastern Visayas'
        ]);
        DB::table('regions')->insert([
            'description' => 'IX-Zamboanga Peninsula'
        ]);
        DB::table('regions')->insert([
            'description' => 'X-Northern Mindanao'
        ]);
        DB::table('regions')->insert([
            'description' => 'XI-Davao Region'
        ]);
        DB::table('regions')->insert([
            'description' => 'XII-SOCCSKSARGEN'
        ]);
        DB::table('regions')->insert([
            'description' => 'XIII-Caraga Region'
        ]);
    }
}
