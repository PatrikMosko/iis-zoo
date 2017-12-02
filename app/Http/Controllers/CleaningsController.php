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
            'cleaner'       => 'required',
            'date'          => 'required',
            'cleaning_time' => 'required',
            'description'   => 'nullable'
        ]);

        $params = $request->all();

        $new_cleaning = new Cleaning();
        $new_cleaning->outlet_id     = current($params['outlet']);
        $new_cleaning->date          = $params['date'];
        $new_cleaning->cleaning_time = $params['cleaning_time'];
        $new_cleaning->description   = $params['description'] ? $params['description']: '';
        $new_cleaning->save();

        // update animal pivot table
        foreach($params['cleaner'] as $cleaner) {
            $new_cleaning->users()->attach($cleaner);
        }

        return redirect()->route('cleanings.index');
    }

    public function edit($id)
    {
        $cleaning = Cleaning::find($id);
        $users = User::all()->pluck('user_name','id');
        $outlets = Outlet::all()->pluck('name','id');

        $users_check = array();

        $collections = Cleaning::with('users')->where('id', $id)->first()['users'];
        foreach ($collections as $collection){
            $users_check[]= $collection['id'];
        }

        return view('Cleanings/edit', compact('cleaning', 'users', 'outlets', 'users_check'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cleaner'       => 'required',
            'date'          => 'required',
            'cleaning_time' => 'required',
            'description'   => 'nullable'
        ]);

        $params = $request->all();

        $cleaning = Cleaning::find($id);

        //$collections = Cleaning::with('users')->where('id', $id)->first()['users'];

        $cleaning->date          = $params['date'];
        $cleaning->cleaning_time = $params['cleaning_time'];
        $cleaning->outlet_id     = $params['outlet'][0];
        $cleaning->description   = $params['description'];
        $cleaning->save();

        $cleaning->users()->detach();
        foreach($params['cleaner'] as $cleaner) {
            $cleaning->users()->attach($cleaner);
        }

        return redirect()->route('cleanings.index')
            ->with(['success','Cleaning updated successfully!']);
    }

    public function remove($id, $user, $count)
    {
        $cleaning = Cleaning::find($id);
        if ($count == 1)
            $cleaning->delete();

        $cleaning->users()->detach($user);

        return redirect()->route('cleanings.index')
            ->with(['success','Cleaning deleted successfully!']);
    }

    public function destroy($id)
    {

        $cleaning = Cleaning::find($id);
        $cleaning->delete();
        $cleaning->users()->detach();

        return redirect()->route('cleanings.index')
            ->with(['success','Cleaning deleted successfully!']);
    }

}
