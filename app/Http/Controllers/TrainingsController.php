<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalType;
use App\Outlet;
use App\OutletType;
use App\Training;
use App\TrainingExternal;
use App\TrainingInternal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function index(){
        $all_external_trainings = TrainingExternal::all();
        $all_internal_trainings = TrainingInternal::all();
//        dd($all_internal_trainings);

        return view('Trainings/trainings', compact('all_external_trainings', 'all_internal_trainings'));
    }

//    public function trainingExternal

//    public function create($type){
//        $outlet_types = Outlet::all()->pluck('name', 'id')->toArray();
//        $animal_types = AnimalType::all()->pluck('type_name', 'id')->toArray();
//
//        return view('Trainings/add_new', compact('outlet_types', 'animal_types', 'type'));
//    }

//    public function store(Request $request){
//        request()->validate([
//            'name' => 'required',
//            'time' => 'required',
//            'date' => 'required',
//            'animal_types' => 'required',
//            'outlet_types' => 'required',
//        ]);
//        $params = $request->all();
//        $animal_type_id = current($params['animal_types']);
//        $outlet_type_id = current($params['outlet_types']);
//
//        $newTraining = new Training();
//        $newTraining->name = $params['name'];
//        $newTraining->time = '';
//        $newTraining->date = '';
//
//        if($animal_type_id != 'none') {ph p
////            $outlet_id = OutletType::all()->where('id', '=', $outlet_type)->first()->id;
//            //$animal_type_id = Animal::all()->where('id', '=', $animal_type);
//            $newTraining->animal_type_id = $animal_type_id;
//        } else {
//            $newTraining->animal_type_id = NULL;
//        }
//        $external1 = TrainingExternal::where('id', 1)->first(); // Exponea
//        $external1->trainings()->save($newTraining);
//
//        // todo error message
//        if($animal_type_id  == 'none' && $outlet_type_id == 'none')
//            dd("BOTH EMPTY KID!!!");
//
//        dd();
//        redirect()->route('trainings.index');
//        return view('/home');
//    }

    public function trainingTypeCreate($type) {
        if ($type == 'internal') {
            return view('Trainings/TrainingType/Internal/add_new');
        } else if ($type == 'external') {
            return view('Trainings/TrainingType/External/add_new');
        }
    }

    public function trainingTypeStore(Request $request, $type){
        $params = $request->all();

        if($type == 'internal') {

            $request->validate([
                'place' => 'required',
            ]);
            $newInternalType = new TrainingInternal();
            $newInternalType->place = $params['place'];
            $newInternalType->save();

        } else if($type == 'external') {

            $request->validate([
                'name' => 'required',
                'address' => 'required',
            ]);
            $newExternalType = new TrainingExternal();
            $newExternalType->company_name = $params['name'];
            $newExternalType->company_address = $params['address'];
            $newExternalType->save();
        }

        return redirect()->route('trainings.index');
    }
}
