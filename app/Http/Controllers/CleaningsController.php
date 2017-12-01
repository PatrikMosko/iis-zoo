<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\Cleaning;
use App\User;
use Carbon\Carbon;
use DateTime;

use Illuminate\Http\Request;

class CleaningsController extends Controller
{

    public function index(){

        // list of all cleanings
        $cleanings = Cleaning::with('users')->get();
        $outlets = Outlet::all();

        return view('Cleanings/cleanings', compact('cleanings', 'outlets'));
    }

    public function create()
    {
        $users = User::all()->pluck('user_name','id');
        $outlets = Outlet::all()->pluck('name','id');

        return view('Cleanings/add_new', compact('users', 'outlets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cleaner' => 'required',
            'date' => 'required',
            'cleaning_time' => 'required',
            'description' => 'nullable'
        ]);

        $params = $request->all();

        $new_cleaning = new Cleaning();
        $new_cleaning->outlet_id = current($params['outlet']);
        $new_cleaning->date = $params['date'];
        $new_cleaning->cleaning_time = $params['cleaning_time'];
        $new_cleaning->description = $params['description'];// ? $params['description']: '';
        $new_cleaning->save();

        // update animal pivot table
        $new_cleaning->users()->attach(current($params['cleaner']));

        return redirect()->route('cleanings.index');
    }

    public function edit($id)
    {
        $cleaning = Cleaning::find($id);
        $users = User::all()->pluck('user_name','id');
        $outlets = Outlet::all()->pluck('name','id');

        return view('Cleanings/edit', compact('cleaning', 'users', 'outlets'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cleaner' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'nullable'
        ]);

        $params = $request->all();

        // todo update date
        // todo saved values into form input

        $cleaning = Cleaning::find($id);
        $old_user_id = $cleaning->user_id;

        $cleaning->date = $params['date'];
        $cleaning->cleaning_time = $params['cleaning_time'];
        $cleaning->outlet_id = $params['outlet'][0];
        $cleaning->description = $params['description'];
        $cleaning->save();

        $cleaning->users()->updateExistingPivot($old_user_id, ['user_id' => $params['cleaner'][0]], false);

        return redirect()->route('cleanings.index')
            ->with(['success','Cleaning updated successfully!']);
    }

    public function destroy($id)
    {
        $cleaning = Cleaning::find($id);
        $cleaning->delete();
        // detach cleanings from pivot table
        $cleaning->users()->detach();

        return redirect()->route('cleanings.index')
            ->with(['success','Cleaning deleted successfully!']);
    }

}
