<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Outlet;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function index(){

        $animals = Animal::all();

        return view('Animals/animals', compact('animals'));
    }

    public function create(){

        $all_outlets = Outlet::all()->pluck('name', 'id');
        $all_animals = Animal::all()->pluck('name', 'name')->toArray();
//        dd($all_animals);

        return view('Animals/add_new', compact('all_outlets','all_animals'));
    }

    public function store(Request $request){
        $params = $request->all();

        $newAnimal = new Animal();
        $newAnimal->name = $params['name'];
        $newAnimal->outlet_id = current($params['outlet']);
        $newAnimal->birth_date = $params['birth_date'];
        $newAnimal->birth_country = $params['birth_country'];
        $newAnimal->parent = $params['parent'];
        $newAnimal->occurrence_place = $params['occurrence'];
        $newAnimal->description = $params['description'];
        $newAnimal->save();

        return redirect()->route('animals.index');
    }

    public function show($id){
        $animal = Animal::find($id);

        return view('Animals/detail', compact('animal'));
    }

    public function destroy($id){
        $animal = Animal::find($id);
        $animal->delete();
        // detach animals from pivot table
        $animal->feedings()->detach();

        return redirect()->route('animals.index');
    }

    public function edit($id){

        $animal = Animal::find($id);
        $outlet = $animal->outlet_id;//todo
        dd($outlet);

        return view('Animals/edit', compact('animal'));
    }

    public function update(){

    }
}
