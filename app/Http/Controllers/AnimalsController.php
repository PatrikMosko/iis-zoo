<?php

namespace App\Http\Controllers;

use App\Animal;
use App\AnimalType;
use App\Outlet;
use App\User;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function index(){
        // animals
        $animals = Animal::all();
        // types
        $animal_types = AnimalType::all();

        return view('Animals/animals', compact('animals', 'animal_types'));
    }

    public function create(){

        $all_outlets = Outlet::all()->pluck('name', 'id');
        $all_animals = Animal::all()->pluck('name', 'name')->toArray();
        $all_types = AnimalType::all()->pluck('type_name', 'id');

        return view('Animals/add_new', compact('all_outlets','all_animals', 'all_types'));
    }

    public function store(Request $request){

        $request->validate([
            'name'          => array('required', 'regex:/^[a-zA-Z]([a-zA-Z])*$/u'),
            'birth_date'    => 'required',
            'outlet'        => 'required',
            'birth_country' => array('nullable', 'regex:/^[a-zA-Z]([a-zA-Z])*([\s]([a-zA-Z])*)*$/u')
        ]);

        $params = $request->all();

        $newAnimal = new Animal();
        $newAnimal->name            = $params['name'];
        $newAnimal->outlet_id       = current($params['outlet']);
        $newAnimal->animal_types_id = current($params['animal_types']);
        $newAnimal->birth_date      = $params['birth_date'];
        $newAnimal->birth_country   = $params['birth_country'];
        $newAnimal->parent          = $params['parent'];
        $newAnimal->occurrence_place= $params['occurrence'];
        $newAnimal->description     = $params['description'];
        $newAnimal->save();

        $request->session()->flash('alert-success', 'Animal was successfully created!');
        return redirect()->route('animals.index');
    }

    public function show($id){
        $animal = Animal::find($id);

        return view('Animals/detail', compact('animal'));
    }

    public function edit($id){
    // todo parent cannot be updated on self
        $animal = Animal::find($id);

        $all_outlets = Outlet::all()->pluck('name', 'id');
        $all_animals = Animal::all()->pluck('name', 'name');
        $all_types = AnimalType::all()->pluck('type_name', 'id');

        $actual_type = AnimalType::find($animal->animal_types_id)->id; // for default we need pass id as key!!
        $actual_outlet = $animal->outlet()->first()->id;

        return view('Animals/edit', compact('animal', 'all_outlets', 'all_animals', 'all_types', 'actual_type', 'actual_outlet'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name'          => array('required', 'regex:/^[a-zA-Z]([a-zA-Z])*$/u'),
            'birth_date'    => 'required',
            'outlet'        => 'required',
            'birth_country' => array('nullable', 'regex:/^[a-zA-Z]([a-zA-Z])*([\s]([a-zA-Z])*)*$/u')
        ]);

        $params = $request->all();

        $newAnimal = Animal::find($id);
        $newAnimal->name            = $params['name'];
        $newAnimal->outlet_id       = current($params['outlet']);
        $newAnimal->animal_types_id = current($params['animal_types']);
        $newAnimal->birth_date      = $params['birth_date'];
        $newAnimal->birth_country   = $params['birth_country'];
        $newAnimal->parent          = $params['parent'];
        $newAnimal->occurrence_place= $params['occurrence'];
        $newAnimal->description     = $params['description'];
        $newAnimal->save();

        $request->session()->flash('alert-success', 'Animal was successfully edited!');
        return redirect()->route('animals.index');
    }

    public function destroy(Request $request, $id){
        $animal = Animal::find($id);
        $animal->delete();
        // detach animals from pivot table
        $animal->feedings()->detach();

        $request->session()->flash('alert-success', 'Animal was successfully deleted!');
        return redirect()->route('animals.index');
    }

    /*
     *
     * Animal Type methods
     *
     */

    public function createAnimalType(){

        return view('Animals/AnimalType/add_new');
    }

    public function storeAnimalType(Request $request){
        $params = $request->all();

        $newAnimalType = new AnimalType();
        $newAnimalType->type_name = $params['type_name'];
        $newAnimalType->description = $params['description'];
        $newAnimalType->save();

        $request->session()->flash('alert-success', 'Animal type was successfully created!');
        return redirect()->route('animals.index');
    }

    public function editAnimalType($id){
        $animal_type = AnimalType::find($id);

        return view('Animals/AnimalType/edit', compact('animal_type'));
    }

    public function updateAnimalType(Request $request, $id){
        $params = $request->all();

        $animal_type = AnimalType::find($id);
        $animal_type->type_name = $params['type_name'];
        $animal_type->description = $params['description'];
        $animal_type->save();

        $request->session()->flash('alert-success', 'Animal type was successfully edited!');
        return redirect()->route('animals.index');
    }

    public function destroyAnimalType(Request $request, $id){
        $animal_type = AnimalType::find($id);
        $animal_type->delete();

        $request->session()->flash('alert-success', 'Animal type was successfully deleted!');
        return redirect()->route('animals.index');
    }
}
