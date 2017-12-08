<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalType;
use App\Outlet;
use App\OutletType;
use App\Training;
use App\TrainingExternal;
use App\TrainingInternal;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function index(){
        $all_external_trainings = TrainingExternal::all();
        $all_internal_trainings = TrainingInternal::all();
        $all_trainings = Training::all();

        $athent_user_id = auth()->user()->id;
        $user = User::find($athent_user_id);

        $logged_user_trainings = $user->trainings()->get();


        return view('Trainings/trainings', compact('all_external_trainings', 'all_internal_trainings', 'logged_user_trainings'));
    }

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

        $request->session()->flash('alert-success', 'Training type was successfully created!');
        return redirect()->route('trainings.index');
    }
}
