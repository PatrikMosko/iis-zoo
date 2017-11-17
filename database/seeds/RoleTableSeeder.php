<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'employee';
        $role_employee->description = 'This is some employee';
        $role_employee->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->description = 'This is some admin';
        $role_admin->save();
    }
}
