<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Outlet;
use App\User;
use DB;
use Illuminate\Http\Request;

use \App\Feeding;
use Illuminate\Support\Carbon;
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

    // TODO find feeding

    // get all feedings
    public function index()
    {
        // get all feedings
        $all_feedings = Feeding::with('users')->get();

        return view('Feeding/feeding', compact('all_feedings'));
    }

    public function create()
    {
        $users = User::all()->pluck('user_name','id'); // get associative array 'id' => 'user_name'
        $animals = Animal::all()->pluck('name','id');

        return view('Feeding/add_new', compact('users', 'animals'));
    }

    public function store(Request $request)
    {
        $params = $request->all();

        // todo osetrit
        // validation of input
//        request()->validate([
//            'handler' => 'required',
//            'amount' => 'required|numeric',
//            'unit' => 'required',
//            'animal' => 'required',
//            'date_time' => 'required'
//        ]);

        $new_feeding = new Feeding();
        $new_feeding->user_id = current($params['handler']); // pass user_id directly from blade, get value from associative array
        $new_feeding->amount_of_food = $params['amount'];
        $new_feeding->description = $params['description'];
        $new_feeding->unit = $params['unit'];
        $new_feeding->save();

        // update animal pivot table
        $new_feeding->animals()->attach(current($params['animal']));

        return redirect()->route('feeding.index');
    }

    public function edit($id)
    {
        $feeding = Feeding::find($id);

        $all_users_obj = User::all();
        $all_outlets_obj = Outlet::all();
        $all_animals_obj = Animal::all();

        /*
         * todo rework this nasty conversions model to key=>value TO pluck!, example:
         * User::all()->pluck('user_name','id');
        **/

        $all_users_obj->each(function ($user){
            $this->all_users[$user->user_name]= $user->user_name;
        });

        $all_outlets_obj->each(function ($outlet){
            $this->all_outlets[$outlet->name] = $outlet->name;
        });

        $all_animals_obj->each(function ($animal){
            $this->all_animals[$animal->name] = $animal->name;
        });

        $actual_user = $feeding->users()->first()->user_name;

        $all_users = $this->all_users;
        $all_outlet_names = $this->all_outlets;
        $all_animal_names = $this->all_animals;

        //todo
//        $feeding->animals()->first()->where()
//        $actual_animal_name =

        return view('Feeding/edit', compact(['feeding','all_users','all_outlet_names', 'all_animal_names', 'actual_user']));
    }

    public function update(Request $request, $id)
    {
        $params = $request->all();
        // validation of input
        request()->validate([
            'handler' => 'required',
            'amount' => 'required|numeric',
            'unit' => 'required',
            'animal' => 'required',
            'date_time' => 'required'
        ]);

        // todo update date
        // todo saved values into form input

        // get specific feeding
        $feeding = Feeding::find($id);

        // use name to find our record id in model Animal
        $new_user_id = User::where('user_name', '=', $params['handler'])->first()->id;
        $old_animal_id = Animal::where('name', '=', $feeding->animals()->first()->name)->first()->id;
        $new_animal_id = Animal::where('name', '=', $params['animal'])                 ->first()->id;

        // update Amount of Food and Units
        $feeding->amount_of_food = $params['amount'];
        $feeding->unit = $params['unit'];

        // update foreign key for user
        $feeding->user_id = $new_user_id;
        $feeding->date_time = $params['date_time'];
        $feeding->description = $params['description'];
        $feeding->save();
//        dd($feeding->date_time);

        /*
         *  update animal
         */
        // update pivot
        // TODO NECHAPEM TEJTO POSRANEJ FUNKCII PRECO TO NA JEDNOM MIESTE IDE V PORADI new+old a na druhom old+new??!!!
        $feeding->animals()->updateExistingPivot($old_animal_id, ['animal_id' => $new_animal_id], false);


        return redirect()->route('feeding.index')
            ->with(['success','User updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeding = Feeding::find($id);
        $feeding->delete();
        // detach feedings from pivot table
        $feeding->animals()->detach();

        return redirect()->route('feeding.index')
            ->with(['success','User deleted successfully']);
    }
}
