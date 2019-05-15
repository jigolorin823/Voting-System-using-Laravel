<?php

use Illuminate\Database\Seeder;

class PartylistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('partylists')->insert([
            'name' => 'Independent',
            'image' => ''
        ]);
    }
}
