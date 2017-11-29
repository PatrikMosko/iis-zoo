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

        return view('Trainings/trainings', compact('newExtTraining'));

    }
}
