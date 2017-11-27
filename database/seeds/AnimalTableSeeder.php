<?php

use App\Outlet;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Animal;
use App\User;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = new Carbon();

        $outlet1 = Outlet::where('id', 1)->first();
        $outlet2 = Outlet::where('id', 2)->first();

        $animal1 = new Animal();
        $animal1->name = 'Rico';
        $animal1->outlet_id = $outlet1->id;
        $animal1->birth_date = $dt->addDays(1);;
        $animal1->birth_country = 'Finland';
        $animal1->parent = 'Kowalski';
        $animal1->occurrence_place = 'North Pole';
        $animal1->description = 'normal penguin nothing special';
        $animal1->save();

        $animal2 = new Animal();
        $animal2->name = 'Kowalski';
        $animal2->outlet_id = $outlet2->id;
        $animal2->birth_date = $dt->addDays(1);;
        $animal2->birth_country = 'North Pole';
        $animal2->parent = 'Unknown';
        $animal2->occurrence_place = 'North Pole';
        $animal2->description = 'Russian guy';
        $animal2->save();
    }
}
