<?php

use App\Outlet;
use App\Cleaning;
use App\User;
use Carbon\Carbon;


use Illuminate\Database\Seeder;

class CleaningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $outlet1 = Outlet::where('id', 2)->first();
        $outlet2 = Outlet::where('id', 1)->first();
        $user1 = User::where('id', 1)->first();
        $user2 = User::where('id', 2)->first();
        $user3 = User::where('id', 3)->first();

        $cleaning1 = new Cleaning();
        $cleaning1->date = Carbon::createFromDate( 2017, 12, 1, null);
        $cleaning1->cleaning_time = Carbon::createFromTime( 8, 0, 0);
        $cleaning1->outlet_id = $outlet1->id;
        $cleaning1->save();

        $cleaning2 = new Cleaning();
        $cleaning2->date = Carbon::createFromDate( 2017, 12, 2, null);
        $cleaning2->cleaning_time = Carbon::createFromTime( 10, 30, 0);
        $cleaning2->description = 'Clean it properly!!!';
        $cleaning2->outlet_id = $outlet2->id;
        $cleaning2->save();

        $cleaning3 = new Cleaning();
        $cleaning3->date = Carbon::createFromDate( 2018, 1, 2, null);
        $cleaning3->cleaning_time = Carbon::createFromTime( 15, 30, 0);
        $cleaning3->description = 'New years cleaning :) Happy new year!';
        $cleaning3->outlet_id = $outlet2->id;
        $cleaning3->save();

        $cleaning1->users()->attach($user1);
        $cleaning2->users()->attach($user2);
        $cleaning2->users()->attach($user3);
        $cleaning3->users()->attach($user1);
        $cleaning3->users()->attach($user2);
        $cleaning3->users()->attach($user3);

    }
}
