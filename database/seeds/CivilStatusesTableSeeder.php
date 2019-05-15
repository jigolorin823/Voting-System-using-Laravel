<?php

use Illuminate\Database\Seeder;

class CivilStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('civil_statuses')->insert([
            'description' => 'Single'
        ]);
        DB::table('civil_statuses')->insert([
            'description' => 'Married'
        ]);
        DB::table('civil_statuses')->insert([
            'description' => 'Divorced'
        ]);
        DB::table('civil_statuses')->insert([
            'description' => 'Widowed'
        ]);
    }
}
