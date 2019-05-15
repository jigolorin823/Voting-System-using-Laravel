<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(CivilStatusesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(BarangaysTableSeeder::class);
        $this->call(LevelTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(PartylistsTableSeeder::class);
        $this->call(YearsTableSeeder::class);
    }
}
