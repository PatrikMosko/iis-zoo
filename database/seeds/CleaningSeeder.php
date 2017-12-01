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

        $cleaning1 = new Cleaning();
        $cleaning1->date = Carbon::createFromDate( 2017, 12, 1, null);
        $cleaning1->cleaning_time = Carbon::createFromTime( 8, 0, 0);
        $cleaning1->outlet_id = $outlet1->id;
        $cleaning1->save();

        $cleaning2 = new Cleaning();
        $cleaning2->date = Carbon::createFromDate( 2017, 12, 2, null);
        $cleaning2->cleaning_time = Carbon::createFromTime( 10, 30, 0);
        $cleaning2->outlet_id = $outlet2->id;
        $cleaning2->save();

        $cleaning1->users()->attach($user1);
        $cleaning2->users()->attach($user2);

    }
}
