<?php

use App\Feeding;
use App\Animal;
use App\User;
use Carbon\Carbon;


use Illuminate\Database\Seeder;

class FeedingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $employee = User::where('id', 1)->first();
        $employee2 = User::where('id', 2)->first();

        $animal = Animal::where('id', 1)->first();
        $animal2 = Animal::where('id', 2)->first();
        $animal3 = Animal::where('id', 3)->first();
        $animal4 = Animal::where('id', 4)->first();

        $feed1 = new Feeding();
        $feed1->user_id = $employee2->id;
        $feed1->amount_of_food = '10';
        $feed1->unit = 'kg';
        $feed1->description = 'be careful animal is dangerous';
        $feed1->date = Carbon::createFromDate( 2017, 12, 1, null);
        $feed1->time = Carbon::createFromTime( 12, 30, 0);
        $feed1->save();

        $feed2 = new Feeding();
        $feed2->user_id = $employee->id;
        $feed2->amount_of_food = '8';
        $feed2->unit = 'g';
        $feed2->date = Carbon::createFromDate( 2017, 12, 1, null);
        $feed2->time = Carbon::createFromTime( 14, 0, 0);
        $feed2->save();

        $feed3 = new Feeding();
        $feed3->user_id = $employee->id;
        $feed3->amount_of_food = '2';
        $feed3->unit = 'kg';
        $feed3->date = Carbon::createFromDate( 2017, 12, 2, null);
        $feed3->time = Carbon::createFromTime( 9, 30, 0);
        $feed3->save();

        $feed1->animals()->attach($animal);
        $feed1->animals()->attach($animal2);
        $feed2->animals()->attach($animal2);
        $feed3->animals()->attach($animal3);
        $feed3->animals()->attach($animal4);

    }
}
