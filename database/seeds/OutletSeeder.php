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
        $outlet1->outlet_type_id = OutletType::where('id', 1)->first()->id;
        $outlet1->save();

        $outlet2 = new Outlet();
        $outlet2->name = 'platinum';
        $outlet2->outlet_type_id = OutletType::where('id', 2)->first()->id;
        $outlet2->save();

        $outlet3 = new Outlet();
        $outlet3->name = 'cats cage';
        $outlet3->outlet_type_id = OutletType::where('id', 1)->first()->id;
        $outlet3->save();
    }
}
