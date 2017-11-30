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
        // at first create roles
        $this->call(AnimalTypeTableSeeder::class);
        // seed external and internal tables
        $this->call(ExternalTrainingSeeder::class);
        $this->call(InternalTrainingSeeder::class);
        // parent of internal and external tables
        $this->call(TrainingTableSeeder::class);
        // create outlet types
        $this->call(OutletTypeSeeder::class);
        // create outlet
        $this->call(OutletSeeder::class);
        // animal
        $this->call(AnimalTableSeeder::class);
        // for feeding we need outlet and animals at first
        $this->call(FeedingTableSeeder::class);
        // initialize some cleanings
        $this->call(CleaningSeeder::class);
    }
}
