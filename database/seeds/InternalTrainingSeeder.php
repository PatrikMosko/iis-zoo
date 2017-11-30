<?php

use App\TrainingInternal;
use Illuminate\Database\Seeder;

class InternalTrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newIntTraining = new TrainingInternal();
        $newIntTraining->place = 'Main zoo build building';
        $newIntTraining->save();

        $newIntTraining2 = new TrainingInternal();
        $newIntTraining2->place = 'Secondary zoo building';
        $newIntTraining2->save();

    }
}