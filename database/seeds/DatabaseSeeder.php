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
        // create outlet
        $this->call(OutletSeeder::class);
        // animal
        $this->call(AnimalTableSeeder::class);
        // for feeding we need outlet and animals at first
        $this->call(FeedingTableSeeder::class);
        // create child seeders at first
        $this->call(ExternalTrainingSeeder::class);
        $this->call(InternalTrainingSeeder::class);
        // parent
        $this->call(TrainingTableSeeder::class);
    }
}
