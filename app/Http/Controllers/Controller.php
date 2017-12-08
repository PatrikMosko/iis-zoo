<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
//use Symfony\Component\HttpFoundation\Request;
//use Illuminate\Http\Response;
//use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller as BaseController;
//use Illuminate\Routing\Controller as Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use View;
//use Illuminate\Routing\Route;
use Route;
//use App\User;




//class Controller extends BaseController
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $isUserAdmin;
    protected $app;

    //public function __construct()
    //{

//        $userReq = Request::create('/settings', 'GET');
//        //dd($userReq);
//        $instance = Route::dispatch($userReq)->getValue();
//        dd($instance);
//
//        $this->middleware(function (Request $r, $next) {
//
//            $this->something($r);
//            return $next($r);
//        });



    //}//Request $request
    //public function index(){}

//    public function something(Request $request){

//        $userReq = $request->create('/', 'GET');

//        dd($request->route('settings')->parameters());

//
//        $request = Request::create('/settings', 'GET');
//        //$instance = dd(json_decode(Route::dispatch($request)->getContent()));
//        //dd(\Route::run($request));
//        dd($request->route());


        //dd($userReq);
//        $instance = Route::dispatch($userReq);

//        dd($instance);
//        dd(app()->handle($request));
        //return Response::json($content);

//    }

//    public function wtf()
//    {
//        $userReq = Request::create('/settings', 'GET');
//
////        //dd($userReq);
////        $instance = Route::dispatch($userReq)->getValue();
////        dd($instance);
////        dd($this->isUserAdmin = $request->user()->hasRole('admin')->getValue());
//    }
}