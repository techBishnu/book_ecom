@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="container py-3 col-md-12">
            <h3>Role</h3>
            <a class="float-end btn btn-danger" href="{{route('roles')}}">Back</a>
        </div>
        <div class="container">
            <form action="{{route('role.update',$role->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name">Role</label>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small>@enderror

                </div>
                <h3 class="text-xl my-4 text-gray-600">Permissions</h3>
                <div class="grid grid-cols-3 gap-4">
                  
                  @foreach($permissions as $permission)
                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}"
                                  @if(count($role->permissions->where('id',$permission->id)))
                                  checked 
                                @endif >
                                  <span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                              </label>
                          </div>
                      </div>
                  @endforeach
                </div>
                
         
                @can('update.role')
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Update Role</button>
                </div>
                @endcan
            </form>
        </div>
    </div>
</div>

@endsection