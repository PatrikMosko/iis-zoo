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
Route::resource('/Feeding/feeding', 'FeedingController', ['except' => 'destroy']);
Route::post(
    '/Feeding/feeding/destroy/{id}',
    ['as' => 'feeding.destroy', 'uses' => 'FeedingController@destroy']
);
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

/*
 * Trainings
 */

// show dashboard for all trainings
Route::get('/Trainings/trainings', 'TrainingsController@index')->name('trainings.index');

Route::get('/Trainings/trainings/create/{id}', array('as' => 'trainingExternal.create', 'uses' => 'ExternalTrainingController@create'));
Route::resource('/Trainings/trainings/trainingExternal', 'ExternalTrainingController', ['except' => 'create']);
Route::resource('/Trainings/trainings/trainingInternal', 'TrainingsController');

Route::get('/Trainings/trainings/trainingType/{type}', 'TrainingsController@trainingTypeCreate')->name('trainings.create_type');
Route::post('/Trainings/trainings/trainingType/{type}/post', 'TrainingsController@trainingTypeStore')->name('trainings.store_type');

Auth::routes();

/*
 * cleanings
 */
Route::resource('/Cleanings/cleanings', 'CleaningsController');
Route::delete(  '/Cleanings/cleanings/remove/{id}/{user}/{count}',
                ['as' => 'cleanings.remove', 'uses' => 'CleaningsController@remove']);

