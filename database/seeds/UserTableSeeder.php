<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name', 'employee')->first();
        $role_admin    = Role::where('name', 'admin')->first();

        $employee = new User();
        $employee->full_name  = 'Majko Mrkvicka';
        $employee->user_name  = 'majko';
        $employee->email      = 'employe@example.com';
        $employee->password   = bcrypt('poklop');
        $employee->birth_date = Carbon::createFromDate( 1996, 5, 21, null);
        $employee->phone      = '0908123456';
        $employee->is_active  = true;
        $employee->save();


        $admin = new User();
        $admin->full_name  = 'John Doe';
        $admin->user_name  = 'manazer123';
        $admin->email      = 'manager@example.com';
        $admin->password   = bcrypt('poklop');
        $admin->birth_date = Carbon::createFromDate( 1987, 4, 27, null);
        $admin->phone      = '0908123458';
        $admin->is_active  = true;
        $admin->save();

        $admin2 = new User();
        $admin2->full_name  = 'Axel Black';
        $admin2->user_name  = 'manazer999';
        $admin2->email      = 'manager99@example.com';
        $admin2->password   = bcrypt('poklop');
        $admin2->birth_date = Carbon::createFromDate( 1991, 2, 11, null);
        $admin2->phone      = '0908123456';
        $admin2->is_active  = true;
        $admin2->save();

        $admin3 = new User();
        $admin3->full_name  = 'Martin Jakubec';
        $admin3->user_name  = 'Sefko';
        $admin3->email      = 'NebudBlbec@budjakubec.sk';
        $admin3->password   = bcrypt('poklop');
        $admin3->birth_date = Carbon::createFromDate( 1991, 2, 11, null);
        $admin3->phone      = '00101010';
        $admin3->is_active  = true;
        $admin3->save();

        $employee->roles()->attach($role_employee);
        $admin   ->roles()->attach($role_admin);
        $admin2  ->roles()->attach($role_admin);
        $admin3  ->roles()->attach($role_admin);
  }
}
