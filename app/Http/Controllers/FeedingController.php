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
        // validation of input
        request()->validate([
            'feeder'  => 'required',
            'amount'  => 'required|numeric',
            'unit'    => 'required',
            'animals' => 'required',
            'date'    => 'required',
            'time'    => 'required'
        ]);

        $params = $request->all();

        $new_feeding = new Feeding();
        $new_feeding->user_id        = current($params['feeder']); // pass user_id directly from blade, get value from associative array
        $new_feeding->amount_of_food = $params['amount'];
        $new_feeding->description    = $params['description'] ? $params['description']: '';
        $new_feeding->unit           = $params['unit'];
        $new_feeding->save();

        // update animal pivot table
        foreach($params['animals'] as $animal) {
            $new_feeding->animals()->attach($animal);
        }

        return redirect()->route('feeding.index');
    }

    public function edit($id)
    {

        $feeding = Feeding::find($id);
        $users = User::all()->pluck('user_name','id');
        $animals = Animal::all()->pluck('name','id');
        $actual_user = $feeding->users()->first()->user_name;

        $animals_check = array();

        $collections = Feeding::with('animals')->where('id', $id)->first()['animals'];
        foreach ($collections as $collection){
            $animals_check[] = $collection['id'];
        }

        return view('Feeding/edit', compact(['feeding','users', 'animals', 'actual_user', 'animals_check']));
    }

    public function update(Request $request, $id)
    {
        // validation of input
        request()->validate([
            'feeder' => 'required',
            'amount' => 'required|numeric',
            'unit' => 'required',
            'animals' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        $params = $request->all();
        $feeding = Feeding::find($id);

        // update Amount of Food and Units
        $feeding->amount_of_food = $params['amount'];
        $feeding->unit           = $params['unit'];
        $feeding->user_id        = $params['feeder'][0];
        $feeding->date           = $params['date'];
        $feeding->time           = $params['time'];
        $feeding->description    = $params['description'];
        $feeding->save();

        $feeding->animals()->detach();
        foreach($params['animals'] as $animal) {
            $feeding->animals()->attach($animal);
        }

        return redirect()->route('feeding.index')
            ->with(['success','User updated successfully']);
    }

    public function remove($id, $animal, $count)
    {
        $feeding = Feeding::find($id);
        if ($count == 1)
            $feeding->delete();

        $feeding->animals()->detach($animal);

        return redirect()->route('feeding.index')
            ->with(['success','Animal removed successfully!']);
    }

    public function destroy($id)
    {
        $feeding = Feeding::find($id);
        $feeding->delete();
        // detach feedings from pivot table
        $feeding->animals()->detach();

        return redirect()->route('feeding.index')
            ->with(['success','Feeding destroyed successfully']);
    }
}
