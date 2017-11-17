<?php

namespace App\Http\Controllers;

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
        //$this->isUserAdmin = $request->user()->hasRole('admin');

        return view('home');//->with('isUserAdmin', $isUserAdmin);
    }

}
