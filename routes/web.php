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

//Route::group(['middleware' => 'web'], function () {
//    // Put routes in here

Route::get('/', 'HomeController@index')->name('home');
/*
 * Animals
 */
Route::post  ('/Animals/animals/animalType'          , 'AnimalsController@storeAnimalType'  )->name('animals.store_type');   // store
Route::get   ('/Animals/animals/animalType/create'   , 'AnimalsController@createAnimalType' )->name('animals.create_type');  // create
Route::get   ('/Animals/animals/animalType/{id}/edit', 'AnimalsController@editAnimalType'   )->name('animals.edit_type');    // edit
Route::patch ('/Animals/animals/animalType/{id}'     , 'AnimalsController@updateAnimalType' )->name('animals.update_type');  // update
Route::delete('/Animals/animals/animalType/{id}'     , 'AnimalsController@destroyAnimalType')->name('animals.destroy_type'); // update
//Route::get('/Animals/animals/animalType', 'AnimalsController@someMethod');
//Route::get('/Animals/animals/animalSearch'   , 'AnimalsController@mySearch' )->name('animals.search');  // search
Route::resource('/Animals/animals', 'AnimalsController');

//search
//Route::get("mySearch","AnimalsController@mySearch");

/*
 * settings
 */
// settings for user
Route::get  ('/settings/settingsUser'     , 'SettingsController@userIndex' )->name('settingsUser.index' ); //edit
Route::patch('/settings/settingsUser/{id}', 'SettingsController@userUpdate')->name('settingsUser.update'); //update
// admin
Route::resource('/settings','SettingsController');

/*
 * Trainings
 */

// show dashboard for all trainings
Route::get('/Trainings/trainings', 'TrainingsController@index')->name('trainings.index');

Route::get('/Trainings/trainings/createExternal/{id}', array('as' => 'trainingExternal.create', 'uses' => 'ExternalTrainingController@create'));
Route::get('/Trainings/trainings/createInternal/{id}', array('as' => 'trainingInternal.create', 'uses' => 'InternalTrainingController@create'));
Route::delete('/Trainings/trainings/removeInternal/{id}/{count}/{id_internal}', ['as' => 'trainingInternal.remove', 'uses' => 'InternalTrainingController@remove']);
Route::delete('/Trainings/trainings/removeExternal/{id}/{count}/{id_external}', ['as' => 'trainingExternal.remove', 'uses' => 'ExternalTrainingController@remove']);
Route::resource('/Trainings/trainings/trainingExternal', 'ExternalTrainingController', ['except' => 'create']);
Route::resource('/Trainings/trainings/trainingInternal', 'InternalTrainingController', ['except' => 'create']);

Route::get('/Trainings/trainings/trainingType/{type}'      , 'TrainingsController@trainingTypeCreate')->name('trainings.create_type');
Route::post('/Trainings/trainings/trainingType/{type}/post', 'TrainingsController@trainingTypeStore' )->name('trainings.store_type' );

Auth::routes();

/*
 * cleanings
 */
Route::resource('/Cleanings/cleanings', 'CleaningsController');
Route::delete(  '/Cleanings/cleanings/remove/{id}/{user}/{count}',
                ['as' => 'cleanings.remove', 'uses' => 'CleaningsController@remove']);

/*
 * feedings
 */
Route::resource('/Feeding/feeding', 'FeedingController');
Route::delete(  '/Feeding/feeding/remove/{id}/{animal}/{count}',
                ['as' => 'feeding.remove', 'uses' => 'FeedingController@remove']
);

//});

