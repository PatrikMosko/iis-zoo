<?php

namespace App\Http\Controllers;

use App\AnimalType;
use App\Outlet;
use App\Training;
use App\TrainingExternal;
use App\User;
use Illuminate\Http\Request;

class ExternalTrainingController extends Controller
{
    public $create_type_id;

    public function __construct(){

        $this->middleware(function ($request, $next) {
            $this->create_type_id = null;
            return $next($request);
        });
    }

    public function create(Request $request,$id){
        // backup id of type
//        $this->create_type_id = $id;
        $request->session()->put('create_type_id', $id);

        $outlet_types = Outlet::all()->pluck('name', 'id')->toArray();
        $animal_types = AnimalType::all()->pluck('type_name', 'id')->toArray();
        $users = User::all()->pluck('user_name','id');

        return view('Trainings/TrainingExternal/add_new',compact('animal_types', 'outlet_types','users'));
    }

    public function store(Request $request){
        $request->validate([
            'name'         => 'required',
//            'time'         => 'required',
//            'date'         => 'required', todo
            'animal_types' => 'required',
            'outlet_types' => 'required',
            'user'      => 'required'
        ]);

        $params = $request->all();
        $animal_type_id = current($params['animal_types']);
        $outlet_type_id = current($params['outlet_types']);

        $newTraining = new Training();
        $newTraining->name = $params['name'];
        $newTraining->time = '';//$params['time'];
        $newTraining->date = '';//$params['date'];

        // update foreingn keys
        if($animal_type_id != 'none')
            $newTraining->animal_type_id = $animal_type_id;
        else
            $newTraining->animal_type_id = NULL;

        if($outlet_type_id != 'none')
            $newTraining->outlet_type_id = $outlet_type_id;
        else
            $newTraining->outlet_type_id = NULL;

        if($animal_type_id == 'none' && $outlet_type_id == 'none')
            dd("both empty!");

        $external1 = TrainingExternal::where('id',  $request->session()->get('create_type_id'))->first(); // Exponea
        $external1->trainings()->save($newTraining);


        // update training user pivot
        foreach($params['user'] as $user) {
            $newTraining->users()->attach($user);
        }

        return redirect()->route('trainings.index');
    }
}
