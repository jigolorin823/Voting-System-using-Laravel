<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'description' => 'National'
        ]);
        DB::table('levels')->insert([
            'description' => 'Local'
        ]);
    }
}
