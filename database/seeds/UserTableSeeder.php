<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

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
        $role_admin  = Role::where('name', 'admin')->first();

        $employee = new User();
        $employee->user_name = 'majko';
        $employee->email = 'employe@example.com';
        $employee->password = bcrypt('poklop');
        $employee->save();


        $admin = new User();
        $admin->user_name = 'manazer123';
        $admin->email = 'manager@example.com';
        $admin->password = bcrypt('poklop');
        $admin->save();

        $admin2 = new User();
        $admin2->user_name = 'manazer999';
        $admin2->email = 'manager99@example.com';
        $admin2->password = bcrypt('poklop');
        $admin2->save();

        $employee->roles()->attach($role_employee);
        $admin->roles()->attach($role_admin);
        $admin2->roles()->attach($role_admin);
  }
}
