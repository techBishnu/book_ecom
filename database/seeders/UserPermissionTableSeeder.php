<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole=Role::where('name','admin')->first();
        $userRole=Role::where('name','User')->first();
        $editorRole=Role::where('name','editor')->first();

        $createSliderPermission=Permission::where('name','create.slider')->first();
        $viewSliderPermission=Permission::where('name','view.slider')->first();
        $updateSliderPermission=Permission::where('name','update.slider')->first();
        $deleteSliderPermission=Permission::where('name','delete.slider')->first();

        $createCategoryPermission=Permission::where('name','create.category')->first();
        $viewCategoryPermission=Permission::where('name','view.category')->first();
        $updateCategoryPermission=Permission::where('name','update.category')->first();
        $deleteCategoryPermission=Permission::where('name','delete.category')->first();

        $createBookPermission=Permission::where('name','create.book')->first();
        $viewBookPermission=Permission::where('name','view.book')->first();
        $updateBookPermission=Permission::where('name','update.book')->first();
        $deleteBookPermission=Permission::where('name','delete.book')->first();

        $createAuthorPermission=Permission::where('name','create.author')->first();
        $viewAuthorPermission=Permission::where('name','view.author')->first();
        $updateAuthorPermission=Permission::where('name','update.author')->first();
        $deleteAuthorPermission=Permission::where('name','delete.author')->first();


        $users=User::all();
        foreach($users as $user){
            if($user['name']=='User'){
                $user->assignRole($userRole);
                $user->givePermissionTo($viewSliderPermission);
                $user->givePermissionTo($viewAuthorPermission);
                $user->givePermissionTo($viewBookPermission);
                $user->givePermissionTo($viewCategoryPermission);
            }
            if($user['name']=='Admin'){
                $user->assignRole($adminRole);

                $user->givePermissionTo($createSliderPermission);
                $user->givePermissionTo($viewSliderPermission);
                $user->givePermissionTo($updateSliderPermission);
                $user->givePermissionTo($deleteSliderPermission);

                $user->givePermissionTo($createAuthorPermission);
                $user->givePermissionTo($viewAuthorPermission);
                $user->givePermissionTo($updateAuthorPermission);
                $user->givePermissionTo($deleteAuthorPermission);

                $user->givePermissionTo($createBookPermission);
                $user->givePermissionTo($viewBookPermission);
                $user->givePermissionTo($updateBookPermission);
                $user->givePermissionTo($deleteBookPermission);

                $user->givePermissionTo($createCategoryPermission);
                $user->givePermissionTo($viewCategoryPermission);
                $user->givePermissionTo($updateCategoryPermission);
                $user->givePermissionTo($deleteCategoryPermission);
            }
            if($user['name']=='editor'){
                $user->assignRole($editorRole);
                $user->givePermissionTo($updateSliderPermission);
                $user->givePermissionTo($viewSliderPermission); 

                $user->givePermissionTo($updateAuthorPermission);
                $user->givePermissionTo($viewAuthorPermission); 

                $user->givePermissionTo($updateBookPermission);
                $user->givePermissionTo($viewBookPermission); 

                $user->givePermissionTo($updateCategoryPermission);
                $user->givePermissionTo($viewCategoryPermission); 
            }
        }
        $admin_user=User::where('name','Admin')->first();

        $admin_user->assignRole($adminRole);
        $adminRole->givePermissionTo(Permission::all());
        

    }
}
