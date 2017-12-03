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
                    $is_admin = (User::find(auth()->user()->id))->roles()->first()->id == 1 ? false : true;

                    $view->with('is_admin', $is_admin);
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

