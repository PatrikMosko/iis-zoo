<?php

use App\Training;
use App\OutletType;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class OutletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outletType1 = new OutletType();
        $outletType1->name = 'cage';
        $outletType1->req_users_num = 1;
        $outletType1->cleaning_time = Carbon::createFromTime( 1, 0, 0);
        $outletType1->training_id = (Training::where('id', 1))->first()->id;
        $outletType1->save();

        $outletType2 = new OutletType();
        $outletType2->name = 'outdoor';
        $outletType2->req_users_num = 3;
        $outletType2->cleaning_time = Carbon::createFromTime( 2, 0, 0);
        $outletType2->training_id = (Training::where('id', 2))->first()->id;
        $outletType2->save();
    }
}