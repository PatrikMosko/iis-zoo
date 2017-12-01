<?php

namespace App\Http\Controllers;

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

    public function trainingTypeCreate($type) {

        if ($type == 'internal'){

            return view('Trainings/TrainingType/Internal/add_new');

        } else if ($type == 'external') {

            return view('Trainings/TrainingType/External/add_new');
        }
    }
}
