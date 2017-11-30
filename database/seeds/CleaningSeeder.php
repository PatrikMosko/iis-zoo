<?php

use App\Outlet;
use App\Cleaning;
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
        $cleaning1 = new Cleaning();
        $cleaning1->date = Carbon::createFromDate( 2017, 12, 1, null);
        $cleaning1->cleaning_time = Carbon::createFromTime( 8, 0, 0);
        $cleaning1->outlet_id = (Outlet::find(2))->id;
        $cleaning1->save();

        $cleaning2 = new Cleaning();
        $cleaning2->date = Carbon::createFromDate( 2017, 12, 2, null);
        $cleaning2->cleaning_time = Carbon::createFromTime( 10, 30, 0);
        $cleaning2->outlet_id = (Outlet::find(1))->id;
        $cleaning2->save();
    }
}
