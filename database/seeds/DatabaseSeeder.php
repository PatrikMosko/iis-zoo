<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // at first create roles
        $this->call(RoleTableSeeder::class);
        // create users with this roles
        $this->call(UserTableSeeder::class);
        // create outlet
        $this->call(OutletSeeder::class);
        // animal
        $this->call(AnimalTableSeeder::class);
        // for feeding we need outlet and animals at first
        $this->call(FeedingTableSeeder::class);
    }
}
