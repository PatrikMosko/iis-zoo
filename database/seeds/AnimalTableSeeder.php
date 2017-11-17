<?php

use App\Outlet;
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
        $outlet1 = Outlet::where('id', 1)->first();
        $outlet2 = Outlet::where('id', 2)->first();

        $animal1 = new Animal();
        $animal1->name = 'Rico';
        $animal1->outlet_id = $outlet1->id;
        $animal1->save();

        $animal2 = new Animal();
        $animal2->name = 'Kowalski';
        $animal2->outlet_id = $outlet2->id;
        $animal2->save();
    }
}
