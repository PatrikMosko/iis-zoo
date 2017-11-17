<?php

use App\Outlet;
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
        $outlet1->save();

        $outlet2 = new Outlet();
        $outlet2->name = 'platinum';
        $outlet2->save();
    }
}
