<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $roles=[
        //     [
        //         'name'=>'Admin',
        //         'guard_name'=>'web',
        //     ],
        //     [
        //         'name'=>'User',
        //         'guard_name'=>'web',
        //     ],
        // ];
        // foreach($roles as $role){
        //     Role::create($role);
        // }
       Role::create(['name'=>'editor']);
    }
}
