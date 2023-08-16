<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $roles=Role::all();
        return view('admin.role.index',compact('roles'));
    }

    public function create(){
        $permissions=Permission::get();
        return view('admin.role.create',compact('permissions'));
    }

    public function store(Request $request){
        // dd($request->all());
        $data=$request->validate([
            'name'=>'required|unique:roles,name',
        ]);
       
      $role=Role::create($data);

      $permissions=$request->permissions;
      $role->syncPermissions($permissions);
        return redirect()->route('roles')->with('message','Role Created Successfully');
    }
    public function edit($id){
        $role=Role::find($id);
        $permissions=Permission::all();
        return view('admin.role.edit',compact('role','permissions'));
    }

    public function update(Request $request,$id){
      $data= $request->validate([
            'name'=>'required',
        ]);

        $role=Role::find($id);
        if($role){
            $role->update($data);
            $permissions=$request->permissions;
            $role->syncPermissions($permissions);

            return redirect()->route('roles')->with('message','Role Updated Successfully');
        }
        else{
            return redirect()->route('roles')->with('message','Something Went Wrong!');
         
        }

    }

    public function delete($id){
        $role=Role::find($id);
        if($role){
            $role->delete();
            return redirect()->route('roles')->with('message','Role Deleted Successfully');
        }
        else{
            return redirect()->route('roles')->with('message','Something Went Wrong!');
        }

    }
}
