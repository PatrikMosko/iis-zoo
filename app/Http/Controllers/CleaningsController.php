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
        $params = $request->all();


        $new_cleaning = new Cleaning();
        $new_cleaning->outlet_id = current($params['outlet']);
        $new_cleaning->date = Carbon::createFromFormat('Y-m-d h:i:s', $params['date'])->toDateString();
        $new_cleaning->cleaning_time = $params['cleaning_time'];
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
        $params = $request->all();
        // validation of input
//        request()->validate([
//            'handler' => 'required',
//            'amount' => 'required|numeric',
//            'unit' => 'required',
//            'animal' => 'required',
//            'date_time' => 'required'
//        ]);

        // todo update date
        // todo saved values into form input

        $cleaning = Cleaning::find($id);
        $old_user_id = $cleaning->user_id;

        //$cleaning->date = Carbon::createFromFormat('Y-m-d h:i:s', $params['date'])->toDateString();
        $cleaning->date = Carbon::createFromFormat('Y-m-d h:i:s', $params['date'])->toTimeString();
        $cleaning->cleaning_time = $params['cleaning_time'];
        $cleaning->outlet_id = $params['outlet'];
        $cleaning->save();

        $cleaning->users()->updateExistingPivot($old_user_id, ['user_id' => $params['cleaner']], false);
        //$pivot = $cleaning->users()->where('id', $old_user_id)->first();
        //$pivot->user_id = $params['cleaner'];
        dd($params['outlet']);

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
