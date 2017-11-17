<?php

namespace App\Providers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
//use Route;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        //
        Schema::defaultStringLength(191);
//        dd($request->user());
        // Using view composer to set following variables globally
//        view()->composer('*',function($view) {
//
//            //->user()->hasRole('admin'));
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        // provide variable isUserAdmin to all templates
//        View::composer('*', function($view){
//            $userReq = Request::create('/', 'GET');
//            //dd($userReq);
            //$instance = Route::dispatch($userReq);
//
//            $userReq1 = Request::create('/isUserAdmin', 'GET');
//            dd(Route::dispatch($userReq1));
////            $instance = json_decode(Route::c($userReq)->getContent());
////            dd($instance);
////            dd($instance);
//            $view->with('isUserAdmin', $instance);
//        });

    }
}

