<?php

use App\TrainingExternal;
use Illuminate\Database\Seeder;

class ExternalTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newExtTraining = new TrainingExternal();
        $newExtTraining->description = 'This is desc about ext training';
        $newExtTraining->save();

    }
}
