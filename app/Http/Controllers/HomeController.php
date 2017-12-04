<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $now = Carbon::create();
        $now->format('l jS \\of F Y h:i:s A');
        $now->addHour();
        $now = $now->toDayDateTimeString();


        return view('home', compact('now'));
    }

}
