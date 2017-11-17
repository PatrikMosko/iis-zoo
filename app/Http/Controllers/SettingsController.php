<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public $isUserAdmin;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        parent::__construct(); // get global variables
        $this->middleware('auth');

        //$this->isUserAdmin = session()->get('isUserAdmin');
    }

    /*
     *  get users and their roles
     */
    public function index () {

        $users = \DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->select('role_user.role_id', 'users.user_name', 'users.email', 'users.id')
            ->get();
//        var_dump($users);


        return view('settings')->with(['users' => $users]);
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
//        print_r($user);
        return view('edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        // validation of input
        request()->validate([
            'user_name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);


        $user_name = $request->get('user_name');
        $email = $request->get('email');
        $role = $request->get('role');

        $user = User::find($id);

        // at first get old role id from our user from pivot table
        $oldRoleId = $user->roles()->first()->id;

        // new role depends on old role ;)
        if ($oldRoleId == 1) {
            $newRoleId = 2;
        } else {
            $newRoleId = 1;
        }

        // update instance
        $user->update($request->all());

        /*
         *  update pivot
         */
        // first arg new role_id
        // second arg old  role_id
        $user->roles()->updateExistingPivot($newRoleId, ['role_id' => $oldRoleId]);

        var_dump("old role=", $oldRoleId);
        var_dump("new role=", $newRoleId);


        if ($user == null || $user == false){
            return redirect()->route('settings.index')
                ->with(['failed','User updated unsuccessfully']);
        }
        return redirect()->route('settings.index')
            ->with(['success','User updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // at first delete instance of user
        $user->delete();
        // TODO delete from pivot table
        // detach all roles from pivot table
        $user->roles()->detach();


        return redirect()->route('settings.index')
            ->with(['success','User deleted successfully']);
    }
}
