<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(){
        $permissions=Permission::latest()->get();
        return view('admin.permission.index',compact('permissions'));
    }

    public function create(){
        return view('admin.permission.create');
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required|unique:permissions,name',
        ]);
       
        Permission::create($data);
        return redirect()->route('permissions')->with('message','permission Created Successfully');
    }
    public function edit($id){
        $permission=Permission::find($id);
        return view('admin.permission.edit',compact('permission'));
    }

    public function update(Request $request,$id){
      $data= $request->validate([
            'name'=>'required|unique:permissions,name',
        ]);

        $permission=Permission::find($id);
        if($permission){
            $permission->update($data);
            return redirect()->route('permissions')->with('message','permission Updated Successfully');
        }
        else{
            return redirect()->route('permissions')->with('message','Something Went Wrong!');
         
        }

    }

    public function delete($id){
        $permission=Permission::find($id);
        if($permission){
            $permission->delete();
            return redirect()->route('permissions')->with('message','permission Deleted Successfully');
        }
        else{
            return redirect()->route('permissions')->with('message','Something Went Wrong!');
        }

    }
}
