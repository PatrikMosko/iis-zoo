<?php

namespace App\Http\Controllers;

use App\AnimalType;
use App\Outlet;
use App\OutletType;
use App\Training;
use App\TrainingInternal;
use App\User;
use Illuminate\Http\Request;

class InternalTrainingController extends Controller
{
    public $create_type_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->create_type_id = null;
            $this->edit_type_id = null;

            return $next($request);
        });
    }

    public function create(Request $request,$id)
    {
        // backup id of type
        $request->session()->put('create_type_id', $id);

        $outlet_types = Outlet::all()->pluck('name', 'id')->toArray();
        $animal_types = AnimalType::all()->pluck('type_name', 'id')->toArray();
        $users = User::all()->pluck('user_name','id');

        return view('Trainings/TrainingInternal/add_new',compact('animal_types', 'outlet_types','users'));
    }

    public function store(Request $request){
        $request->validate([
            'name'         => 'required',
            'time'         => 'required',
            'date'         => 'required',
            'animal_types' => 'required',
            'outlet_types' => 'required',
            'user'      => 'required'
        ]);

        $params = $request->all();
        $animal_type_id = current($params['animal_types']);
        $outlet_type_id = current($params['outlet_types']);

        $newTraining = new Training();
        $newTraining->name = $params['name'];
        $newTraining->time = $params['time'];
        $newTraining->date = $params['date'];

        // update foreingn keys
        if($animal_type_id != 'none')
            $newTraining->animal_type_id = $animal_type_id;
        else
            $newTraining->animal_type_id = NULL;

        if($outlet_type_id != 'none')
            $newTraining->outlet_type_id = $outlet_type_id;
        else
            $newTraining->outlet_type_id = NULL;

        // todo notification
        if($animal_type_id == 'none' && $outlet_type_id == 'none')
            dd("both empty!");

        $internal = TrainingInternal::where('id',  $request->session()->get('create_type_id'))->first();
        $internal->trainings()->save($newTraining);


        // update training user pivot
        foreach($params['user'] as $user) {
            $newTraining->users()->attach($user);
        }

        $request->session()->flash('alert-success', 'Internal training was successfully created!');
        return redirect()->route('trainings.index');
    }

    public function edit($id)
    {
        $training = Training::find($id);
        $outlet_types = OutletType::all()->pluck('name', 'id')->toArray();
        $animal_types = AnimalType::all()->pluck('type_name', 'id')->toArray();
        $users = User::all()->pluck('user_name','id');

        if($training->outlet_types()->first() != null)
            $actual_outlet_type = $training->outlet_types()->first()->id;
        else
            $actual_outlet_type = 'none';

        if($training->animal_types()->first() != null)
            $actual_animal_type = $training->animal_types()->first()->id;
        else
            $actual_animal_type = 'none';

        //todo sometimes is users_check undefined why? (seeder records)
        $collections = Training::with('users')->where('id', $id)->first()['users'];
        foreach ($collections as $collection){
            $users_check[]= $collection['id'];
        }

        return view('Trainings/TrainingInternal/edit',compact('outlet_types', 'animal_types',
            'users', 'training', 'users_check', 'actual_outlet_type','actual_animal_type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required',
            'time'         => 'required',
            'date'         => 'required',
            'animal_types' => 'required',
            'outlet_types' => 'required',
            'user'      => 'required'
        ]);

        $params = $request->all();
        $animal_type_id = current($params['animal_types']);
        $outlet_type_id = current($params['outlet_types']);

        $newTraining = Training::find($id);
        $newTraining->name = $params['name'];
        $newTraining->time = $params['time'];
        $newTraining->date = $params['date'];

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

        $newTraining->save();
        $newTraining->users()->detach();
        // update training user pivot
        foreach($params['user'] as $user) {
            $newTraining->users()->attach($user);
        }

        $request->session()->flash('alert-success', 'Internal training was successfully updated!');
        return redirect()->route('trainings.index');
    }

    public function remove(Request $request, $id, $count, $id_internal)
    {
        $training = Training::find($id);

        // delete whole internal training
        if ($count == 1) {
            $internal_type = TrainingInternal::find($id_internal);
            $internal_type->delete();

            $request->session()->flash('alert-success', 'Internal training type was successfully deleted!');
            return redirect()->route('trainings.index');
        }

        $training->delete();
        $training->users()->detach();

        $request->session()->flash('alert-success', 'Internal training was successfully deleted!');
        return redirect()->route('trainings.index');
    }
}
