<?php

use App\Training;
use Carbon\Carbon;
use App\TrainingExternal;
use App\TrainingInternal;
use App\AnimalType;

use Illuminate\Database\Seeder;

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

        $animalType1 = AnimalType::find(1);
        $animalType2 = AnimalType::find(2);
        $animalType3 = AnimalType::find(3);

        // create external trainings

        // create new training
        $newTraining = new Training();
        $newTraining->date = Carbon::createFromDate( 2017, 11, 1, null);
        $newTraining->name = 'Training for penguin outlets';
        $newTraining->animal_type_id = $animalType1->id;

        $newTraining2 = new Training();
        $newTraining2->date = Carbon::createFromDate( 2017, 11, 1, null);
        $newTraining2->name = 'Training for mammal outlets';
        $newTraining2->animal_type_id = $animalType2->id;

        $newTraining3 = new Training();
        $newTraining3->date = Carbon::createFromDate( 2017, 11, 1, null);
        $newTraining3->name = 'Training for Bird outlets';
        $newTraining3->animal_type_id = $animalType2->id;

        $external1->trainings()->save($newTraining);
        $external1->trainings()->save($newTraining2);
        $external2->trainings()->save($newTraining3);

        // create internal trainings

        // create new training
        $newTraining4 = new Training();
        $newTraining4->date = Carbon::createFromDate( 2017, 12, 4, null);
        $newTraining4->name = 'Internal Training for lama outlets';
        $newTraining4->animal_type_id = $animalType1->id;

        // create new training
        $newTraining5 = new Training();
        $newTraining5->date = Carbon::createFromDate( 2017, 12, 5, null);
        $newTraining5->name = 'Internal Training for mammal outlets';
        $newTraining5->animal_type_id = $animalType2->id;

        // create new training
        $newTraining6 = new Training();
        $newTraining6->date = Carbon::createFromDate( 2017, 12, 5, null);
        $newTraining6->name = 'Internal Training for Bird outlets';
        $newTraining6->animal_type_id = $animalType1->id;

        // create new training
        $newTraining7 = new Training();
        $newTraining7->date = Carbon::createFromDate( 2017, 12, 10, null);
        $newTraining7->name = 'Internal Training for Safety inside mammal outlets';
        $newTraining7->animal_type_id = $animalType3->id;

        // create new training
        $newTraining8 = new Training();
        $newTraining8->date = Carbon::createFromDate( 2018, 1, 1, null);
        $newTraining8->name = 'Internal Training for hygiene inside lama outlets';
        $newTraining8->animal_type_id = $animalType3->id;

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