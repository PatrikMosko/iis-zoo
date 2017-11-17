<?php

use App\Feeding;
use App\Animal;
use App\User;
use App\Outlet;
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

        $employee = User::find(1);
        $employee2 = User::find(2);

        $animal = Animal::where('id', 1)->first();
        $animal2 = Animal::where('id', 2)->first();

        // date time carbon manipulation https://scotch.io/tutorials/easier-datetime-in-laravel-and-php-with-carbon#toc-creating-dates-with-more-fine-grained-control
        $dt = new Carbon();//::create(2017, 12, 15, 0);

        $feed1 = new Feeding();
        $feed1->user_id = $employee2->id;
        $feed1->amount_of_food = '10 kg';
        $feed1->description = 'be careful animal is dangerous';
        $feed1->date_time = $dt;
        $feed1->save();

        $feed2 = new Feeding();
        $feed2->user_id = $employee->id;
        $feed2->amount_of_food = '8 mg';
        $feed2->date_time = $dt->addDays(1);
        $feed2->save();

        $feed3 = new Feeding();
        $feed3->user_id = $employee->id;
        $feed3->amount_of_food = '2 kg';
        $feed3->date_time = $dt->addDays(2);
        $feed3->save();


        $feed1->animals()->attach($animal);
        $feed2->animals()->attach($animal2);
        $feed3->animals()->attach($animal2);

    }
}
