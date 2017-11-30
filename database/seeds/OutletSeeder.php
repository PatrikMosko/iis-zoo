<?php

use App\Outlet;
use App\OutletType;

use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outlet1 = new Outlet();
        $outlet1->name = 'momentum';
        $outlet1->outlet_type_id = (OutletType::find(1))->id;
        $outlet1->save();

        $outlet2 = new Outlet();
        $outlet2->name = 'platinum';
        $outlet2->outlet_type_id = (OutletType::find(2))->id;
        $outlet2->save();
    }
}
