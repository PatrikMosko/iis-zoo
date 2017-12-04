<?php

namespace App\Providers;

use App\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
//use Route;
use View;
use Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

        view()->composer(
            ['layouts.app',
             'home',
             'Feeding.*',
             'Cleanings.*',
             'Animals.*',
             'Settings.*',
             'Trainings.*',
            ],
            function($view) {
                if(auth()->user() != null) {
                    $my_id = auth()->user()->id;
                    $is_admin = User::find($my_id)->roles()->first()->id == 1 ? false : true;

                    $view->with('is_admin', $is_admin)->with('my_id', $my_id);

                }
            }
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}

