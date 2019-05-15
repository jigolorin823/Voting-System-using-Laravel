<?php

use Illuminate\Database\Seeder;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->insert([
            'year' => '2010',
            'status' => '0'
        ]);
        DB::table('years')->insert([
            'year' => '2013',
            'status' => '0'
        ]);
        DB::table('years')->insert([
            'year' => '2016',
            'status' => '0'
        ]);
        DB::table('years')->insert([
            'year' => '2019',
            'status' => '1'
        ]);
    }
}
