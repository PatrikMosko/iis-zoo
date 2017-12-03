<?php

use App\Outlet;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Animal;
use App\User;
use App\AnimalType;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $outlet1 = Outlet::where('id', 1)->first(); // cats cage outlet - cage
        $outlet2 = Outlet::where('id', 2)->first(); // platinum outlet - outdoor

        $animal_type1 = AnimalType::where('id', 1)->first();
        $animal_type3 = AnimalType::where('id', 3)->first();

        $animal1 = new Animal();
        $animal1->name = 'Rico';
        $animal1->outlet_id = $outlet2->id;
        $animal1->animal_types_id = $animal_type3->id;
        $animal1->birth_date = Carbon::createFromDate( 2010, 10, 9, null);
        $animal1->birth_country = 'Finland';
        $animal1->parent = 'Kowalski';
        $animal1->occurrence_place = 'North Pole';
        $animal1->description = 'normal penguin nothing special';
        $animal1->save();

        $animal2 = new Animal();
        $animal2->name = 'Kowalski';
        $animal2->outlet_id = $outlet2->id;
        $animal2->animal_types_id = $animal_type3->id;
        $animal2->birth_date = Carbon::createFromDate( 1995, 23, 3, null);
        $animal2->birth_country = 'North Pole';
        $animal2->parent = 'Unknown';
        $animal2->occurrence_place = 'North Pole';
        $animal2->description = 'Russian guy';
        $animal2->save();

        $animal1 = new Animal();
        $animal1->name = 'Choco';
        $animal1->outlet_id = $outlet1->id;
        $animal1->animal_types_id = $animal_type1->id;
        $animal1->birth_date = Carbon::createFromDate( 2010, 10, 9, null);
        $animal1->birth_country = 'Zambia';
        $animal1->parent = 'Unknown';
        $animal1->occurrence_place = 'Africa';
        $animal1->description = 'lion king!!!';
        $animal1->save();

        $animal1 = new Animal();
        $animal1->name = 'Spoko';
        $animal1->outlet_id = $outlet1->id;
        $animal1->animal_types_id = $animal_type1->id;
        $animal1->birth_date = Carbon::createFromDate( 2010, 10, 9, null);
        $animal1->birth_country = 'South Africa';
        $animal1->parent = 'Unknown';
        $animal1->occurrence_place = 'Africa';
        $animal1->description = '';
        $animal1->save();
    }
}
