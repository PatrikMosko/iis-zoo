<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Auth;
use App\Providers\AppServiceProvider;
//use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public $isUserAdmin;
    protected $fillable=['full_name'];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    // parent::__construct(); // get global variables
        $this->middleware('auth');
        //$this->isUserAdmin = session()->get('isUserAdmin');
    }

    /*
     *  get users and their roles
     */
    public function index () {

        $users = User::all();
        //dd($users);
        return view('Settings/Admin/settings')->with(['users' => $users]);
    }

    public function show($id){
        $user = User::find($id);

        return view('Settings/Admin/detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $account_status = $user->is_active;
//        print_r($user);
        return view('Settings/Admin/edit', compact('user','account_status'));
    }


    public function update(Request $request, $id)
    {
        // validation of input
        request()->validate([
            'user_name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'full_name' => 'required',
            'phone' => 'required',
            'birth_date' => 'required',
            'is_active' => 'required'
        ]);

        $user_name = $request->get('user_name');
        $email = $request->get('email');
        $role = $request->get('role');
        $full_name = $request->get('full_name');
        $phone = $request->get('phone');
        $birth_date = $request->get('birth_date');
        $is_active = $request->get('is_active');

        $user = User::find($id);

        // at first get old role id from our user from pivot table
        $oldRoleId = $user->roles()->first()->id;

        // new role depends on old role ;)
        if ($oldRoleId == 1) {
            $newRoleId = 2;
        } else {
            $newRoleId = 1;
        }

        // first item in select is active thats why
        if(!$is_active) {
            $is_active = true;
        } else {
            $is_active = false;
        }

        // update instance
        $user->where('id', '=', $user->id)->update([
            'user_name' => $user_name,
            'is_active' => $is_active,
            'full_name' => $full_name,
            'phone'     => $phone,
            'birth_date'=> $birth_date,
            'email'     => $email
        ]);
        /*
         *  update pivot
         */
        // first arg new role_id
        // second arg old  role_id
        $user->roles()->updateExistingPivot($newRoleId, ['role_id' => $oldRoleId]);

        var_dump("old role=", $oldRoleId);
        var_dump("new role=", $newRoleId);


        if ($user == null || $user == false){

            $request->session()->flash('alert-danger', 'User was unsuccessful added!');
            return redirect()->route('settings.index');
        }
        $request->session()->flash('alert-success', 'User was successful added!');
        return redirect()->route('settings.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        // at first delete instance of user
        $user->delete();
        // TODO delete from pivot table
        // detach all roles from pivot table
        $user->roles()->detach();

        $request->session()->flash('alert-success', 'User was successfully deleted!');
        return redirect()->route('settings.index');
    }

    public function userIndex()
    {
        //get logged user
        $user_auth = Auth::user();
        $user = User::find($user_auth->id);

        return view('Settings/User/edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        // validation of input
        request()->validate([
            'user_name' => 'required',
            'email' => 'required',
            'full_name' => 'required',
            'phone' => 'required',
            'birth_date' => 'required',
        ]);

        $user = User::find($id);

        // update instance
        $user->where('id', '=', $user->id)->update([
            'user_name' => $request->get('user_name'),
            'full_name' => $request->get('full_name'),
            'phone'     => $request->get('phone'),
            'birth_date'=> $request->get('birth_date'),
            'email'     => $request->get('email')
        ]);

        $request->session()->flash('alert-success', 'Profile was successfully updated!');
        return redirect()->route('settingsUser.index');
    }
}
