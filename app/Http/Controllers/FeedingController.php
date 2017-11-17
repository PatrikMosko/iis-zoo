<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Outlet;
use App\User;
use DB;
use Illuminate\Http\Request;

use \App\Feeding;
use Illuminate\Support\Facades\Input;

class FeedingController extends Controller
{
    private $all_users = array();
    private $all_outlets = array();
    private $all_animals = array();

    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all feedings
    public function index()
    {
        // get all feedings
        $all_feedings = Feeding::with('users')->get();

        return view('Feeding/feeding', compact('all_feedings'));
    }

    public function edit($id)
    {
        $feeding = Feeding::find($id);

        $all_users_obj = User::all();
        $all_outlets_obj = Outlet::all();
        $all_animals_obj = Animal::all();

        $all_users_obj->each(function ($user){
            $this->all_users[$user->user_name]= $user->user_name;
        });

        $all_outlets_obj->each(function ($outlet){
            $this->all_outlets[$outlet->name] = $outlet->name;
        });

        $all_animals_obj->each(function ($animal){
            $this->all_animals[$animal->name] = $animal->name;
        });

        $all_users = $this->all_users;
        $all_outlet_names = $this->all_outlets;
        $all_animal_names = $this->all_animals;

        return view('Feeding/edit', compact(['feeding','all_users','all_outlet_names', 'all_animal_names']));
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
        // validation of input
        request()->validate([
            'handler' => 'required',
            'outlet' => 'required',
            'amount' => 'required|numeric',
            'unit' => 'required',
            'animal' => 'required'
        ]);

        // todo update date
        // todo saved values into form inputs

        // get specific feeding
        $feeding = Feeding::find($id);

        $new_user_name = $params['handler'];
        $new_user_id = User::where('user_name', '=', $new_user_name)->first()->id;

        // changing feeding where animal name was is ...
        $old_animal_name = $feeding->animals()->first()->name;
        // use name to find our record id in model Animal
        $old_animal_id = Animal::where('name', '=', $old_animal_name)->first()->id;

        // need for updating pivot table
        $new_animal_name = $params['animal'];
        $new_animal_id = Animal::where('name', '=', $new_animal_name)->first()->id;

        // update food
        $feeding->amount_of_food = $params['amount'];
        // update units
        $feeding->unit = $params['unit'];
        // update foreign key for user
        $feeding->user_id = $new_user_id;
        $feeding->save();

        /*
         *  update animal
         */
        // update pivot
        // TODO NECHAPEM TEJTO POSRANEJ FUNKCII PRECO TO NA JEDNOM MIESTE IDE V PORADI new+old a na druhom old+new??!!!
        $feeding->animals()->updateExistingPivot($old_animal_id, ['animal_id' => $new_animal_id], false);


        // update instance feeding-animal

        return redirect()->route('feeding.index')
            ->with(['success','User updated successfully']);
    }
}
