<?php

namespace App\Http\Controllers;

use App\User;
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
//        parent::__construct(); // get global variables

        $this->middleware('auth');
        //$this->isUserAdmin = session()->get('isUserAdmin');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

//        $is_admin = (User::find(Auth::user()->id))->roles()->first()->id==1 ? false : true;

        //$this->isUserAdmin = $request->user()->hasRole('admin');

        return view('home');//->with('isUserAdmin', $isUserAdmin);
    }

}
