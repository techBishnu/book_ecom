<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $user = User::with('roles')->get();
        return view('admin.user.user', compact('user', 'roles', 'permissions'));
    }
    public function RoleChange(Request $request, $id)
    {
        if($request->role_name!==null){

            $role_user = Role::where('name',$request->role_name)->first();
            //  dd($role_user['name']);
            $user = User::where('id', $id)->first();

            $roles = Role::get();
            
            foreach ($roles as  $role) {
                $user->removeRole($role);
            }
            
            $user->assignRole($role_user);
            
            
            return redirect()->back()->with('message', 'Role Change SuccessFully');
        }
        else{
            return redirect()->back()->with('message', 'Please Select  Role First');

        }
            
          


        // 
    }
}
