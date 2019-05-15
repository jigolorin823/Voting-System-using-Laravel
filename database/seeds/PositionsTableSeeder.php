<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'level_id' => '1',
            'description' => 'President',
            'num_winners' => '1'
        ]);
        DB::table('positions')->insert([
            'level_id' => '1',
            'description' => 'Vice-President',
            'num_winners' => '1'
        ]);
        DB::table('positions')->insert([
            'level_id' => '1',
            'description' => 'Senator',
            'num_winners' => '12'
        ]);
        DB::table('positions')->insert([
            'level_id' => '2',
            'description' => 'Governor',
            'num_winners' => '1'
        ]);
        DB::table('positions')->insert([
            'level_id' => '2',
            'description' => 'Mayor',
            'num_winners' => '1'
        ]);
        DB::table('positions')->insert([
            'level_id' => '2',
            'description' => 'Barangay Captian',
            'num_winners' => '1'
        ]);
    }
}
