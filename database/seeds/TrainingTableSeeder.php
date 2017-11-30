<?php

use App\Training;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\TrainingExternal;
use App\TrainingInternal;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         *  Trainings for animals
         */
        $external1 = TrainingExternal::find(1); // Exponea
        $external2 = TrainingExternal::find(2); // SolarWinds

        $internal1 = TrainingInternal::find(1); // main building
        $internal2 = TrainingInternal::find(2); // secondary

        // create external trainings

        // create new training
        $newTraining = new Training();
        $newTraining->date = new Carbon();
        $newTraining->name = 'Training for penguin outlets';

        $newTraining2 = new Training();
        $newTraining2->date = new Carbon();
        $newTraining2->name = 'Training for mammal outlets';

        $newTraining3 = new Training();
        $newTraining3->date = new Carbon();
        $newTraining3->name = 'Training for Bird outlets';

        $external1->trainings()->save($newTraining);
        $external1->trainings()->save($newTraining2);
        $external2->trainings()->save($newTraining3);

        // create internal trainings

        // create new training
        $newTraining4 = new Training();
        $newTraining4->date = new Carbon();
        $newTraining4->name = 'Internal Training for lama outlets';

        // create new training
        $newTraining5 = new Training();
        $newTraining5->date = new Carbon();
        $newTraining5->name = 'Internal Training for mammal outlets';

        // create new training
        $newTraining6 = new Training();
        $newTraining6->date = new Carbon();
        $newTraining6->name = 'Internal Training for Bird outlets';

        // create new training
        $newTraining7 = new Training();
        $newTraining7->date = new Carbon();
        $newTraining7->name = 'Internal Training for Safety inside mammal outlets';

        // create new training
        $newTraining8 = new Training();
        $newTraining8->date = new Carbon();
        $newTraining8->name = 'Internal Training for hygiene inside lama outlets';

        $internal1->trainings()->save($newTraining4);
        $internal1->trainings()->save($newTraining5);
        $internal1->trainings()->save($newTraining6);

        $internal2->trainings()->save($newTraining7);
        $internal2->trainings()->save($newTraining8);


        /*
         *  Trainings for outlets
         */ // todo
    }
}
