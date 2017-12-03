<?php

use App\OutletType;
use App\Training;
use Carbon\Carbon;
use App\TrainingExternal;
use App\TrainingInternal;
use App\AnimalType;
use App\User;

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
        $external1 = TrainingExternal::where('id', 1)->first(); // Exponea
        $external2 = TrainingExternal::where('id', 2)->first(); // SolarWinds

        $internal1 = TrainingInternal::where('id', 1)->first(); // main building
        $internal2 = TrainingInternal::where('id', 2)->first(); // secondary

        $animalType1 = AnimalType::where('id', 1)->first();
        $animalType2 = AnimalType::where('id', 2)->first();
        $animalType3 = AnimalType::where('id', 3)->first();

        $outletType1 = OutletType::where('id', 1)->first();
        $outletType2 = OutletType::where('id', 2)->first();

        $user1 = User::where('id', 1)->first();
        $user2 = User::where('id', 2)->first();
        $user3 = User::where('id', 3)->first();

        // create external trainings

        // create new training
        $newTraining = new Training();
        $newTraining->date = Carbon::createFromDate( 2017, 11, 1, null);
        $newTraining->time = Carbon::createFromTime( 11, 30, 0);
        $newTraining->name = 'Training for penguin outlets';
        $newTraining->animal_type_id = $animalType1->id;
        $newTraining->outlet_type_id = $outletType1->id;

        $newTraining2 = new Training();
        $newTraining2->date = Carbon::createFromDate( 2017, 11, 1, null);
        $newTraining2->time = Carbon::createFromTime( 12, 30, 0);
        $newTraining2->name = 'Training for mammal outlets';
        $newTraining2->animal_type_id = $animalType2->id;
        $newTraining2->outlet_type_id = $outletType1->id;

        $newTraining3 = new Training();
        $newTraining3->date = Carbon::createFromDate( 2017, 11, 1, null);
        $newTraining3->time = Carbon::createFromTime( 1, 30, 0);
        $newTraining3->name = 'Training for Bird outlets';
        $newTraining3->animal_type_id = $animalType2->id;
        $newTraining3->outlet_type_id = $outletType1->id;

        $external1->trainings()->save($newTraining);
        $external1->trainings()->save($newTraining2);
        $external2->trainings()->save($newTraining3);

        // create internal trainings

        // create new training
        $newTraining4 = new Training();
        $newTraining4->date = Carbon::createFromDate( 2017, 12, 4, null);
        $newTraining4->time = Carbon::createFromTime( 2, 30, 0);
        $newTraining4->name = 'Internal Training for lama outlets';
        $newTraining4->animal_type_id = $animalType1->id;
        $newTraining4->outlet_type_id = $outletType2->id;

        // create new training
        $newTraining5 = new Training();
        $newTraining5->date = Carbon::createFromDate( 2017, 12, 5, null);
        $newTraining5->time = Carbon::createFromTime( 3, 30, 0);
        $newTraining5->name = 'Internal Training for mammal outlets';
        $newTraining5->animal_type_id = $animalType2->id;
        $newTraining5->outlet_type_id = $outletType2->id;

        // create new training
        $newTraining6 = new Training();
        $newTraining6->date = Carbon::createFromDate( 2017, 12, 5, null);
        $newTraining6->time = Carbon::createFromTime( 4, 30, 0);
        $newTraining6->name = 'Internal Training for Bird outlets';
        $newTraining6->animal_type_id = $animalType1->id;
        $newTraining6->outlet_type_id = $outletType2->id;

        // create new training
        $newTraining7 = new Training();
        $newTraining7->date = Carbon::createFromDate( 2017, 12, 10, null);
        $newTraining7->time = Carbon::createFromTime( 5, 30, 0);
        $newTraining7->name = 'Internal Training for Safety inside mammal outlets';
        $newTraining7->animal_type_id = $animalType3->id;
        $newTraining7->outlet_type_id = $outletType2->id;

        // create new training
        $newTraining8 = new Training();
        $newTraining8->date = Carbon::createFromDate( 2018, 1, 1, null);
        $newTraining8->time = Carbon::createFromTime( 6, 30, 0);
        $newTraining8->name = 'Internal Training for hygiene inside lama outlets';
        $newTraining8->animal_type_id = $animalType3->id;
        $newTraining8->outlet_type_id = $outletType2->id;

        $internal1->trainings()->save($newTraining4);
        $internal1->trainings()->save($newTraining5);
        $internal1->trainings()->save($newTraining6);

        $internal2->trainings()->save($newTraining7);
        $internal2->trainings()->save($newTraining8);
        /*
         *  Trainings for outlets
         */ // todo

        $newTraining ->users()->attach($user1);
        $newTraining2->users()->attach($user2);
        $newTraining3->users()->attach($user2);
        $newTraining4->users()->attach($user2);
        $newTraining5->users()->attach($user3);
        $newTraining6->users()->attach($user1);
        $newTraining7->users()->attach($user3);
        $newTraining8->users()->attach($user1);

    }
}