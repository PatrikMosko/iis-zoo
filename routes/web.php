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

Route::get('/', 'HomeController@index')->name('home');
Route::resource('/Feeding/feeding', 'FeedingController');
Route::resource('/Trainings/trainings', 'TrainingsController');
/*
 * Animals
 */
Route::post  ('/Animals/animals/animalType'          , 'AnimalsController@storeAnimalType'  )->name('animals.store_type');   // store
Route::get   ('/Animals/animals/animalType/create'   , 'AnimalsController@createAnimalType' )->name('animals.create_type');  // create
Route::get   ('/Animals/animals/animalType/{id}/edit', 'AnimalsController@editAnimalType'   )->name('animals.edit_type');    // edit
Route::patch ('/Animals/animals/animalType/{id}'     , 'AnimalsController@updateAnimalType' )->name('animals.update_type');  // update
Route::delete('/Animals/animals/animalType/{id}'     , 'AnimalsController@destroyAnimalType')->name('animals.destroy_type'); // update
//Route::get('/Animals/animals/animalType', 'AnimalsController@someMethod');
Route::resource('/Animals/animals', 'AnimalsController');
/*
 * settings
 */
Route::resource('/settings','SettingsController');
Auth::routes();