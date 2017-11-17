<?php

namespace App\Http\Controllers;

use App\Animal;
use App\User;
use DB;
use Illuminate\Http\Request;

use \App\Feeding;

class FeedingController extends Controller
{
    //
    public function index()
    {

        // get all feedings
        $all_feedings = Feeding::with('users')->get();
        $feeding = Feeding::find(1);

        //dd(Animal::find(1)->outlet()->get());
//        dd($feeding->animals()->first()->name);
            //->animals()->first());
//        foreach ($all_feedings as $feeding) {
//            var_dump($feeding);
//        }

        return view('Feeding/feeding', compact('all_feedings'));
    }
}
