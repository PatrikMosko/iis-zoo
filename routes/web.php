<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


////Route::post('/updateUser', ['as' => 'updateUser.post']);
//// route /update
//Route::resource('/settings','SettingsController');
////Route::post('edituser/{iduser}',['as' => 'edituser', 'uses' => 'UserRegController@editregisterform']);
//
//
//Auth::routes();
//
//
//
//
//<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/home', 'ListController@show');

//Route::get('/', 'Controller@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/Feeding', 'FeedingController@index')->name('Feeding');


Route::resource('/settings','SettingsController');
//Route::post('edituser/{iduser}',['as' => 'edituser', 'uses' => 'UserRegController@editregisterform']);


Auth::routes();