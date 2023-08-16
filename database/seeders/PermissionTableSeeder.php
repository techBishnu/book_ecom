<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permissions=[
        //     [
        //         'name'=>'Update Slider',
        //         'guard_name'=>'web'
        //     ],
        //     [
        //         'name'=>'Delete Slider',
        //         'guard_name'=>'web'
        //     ],
        //     [
        //         'name'=>'View Slider',
        //         'guard_name'=>'web'
        //     ],
        //     [
        //         'name'=>'Created Slider',
        //         'guard_name'=>'web'
        //     ]
        // ];
        // foreach($permissions as $permission){
        //     Permission::create($permission);
        // }
        // Permission::create(['name'=>'create.slider']);
        // Permission::create(['name'=>'view.slider']);
        // Permission::create(['name'=>'update.slider']);
        // Permission::create(['name'=>'delete.slider']);
        // Permission::create(['name'=>'create.author']);
        // Permission::create(['name'=>'view.author']);
        // Permission::create(['name'=>'update.author']);
        // Permission::create(['name'=>'delete.author']);
        Permission::firstOrCreate(['name' => 'view', 'module' => 'Testing', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete', 'module' => 'Testing', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'store', 'module' => 'Testing', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'update', 'module' => 'Testing', 'guard_name' => 'web']);



    }
}
