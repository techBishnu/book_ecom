@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="pl-5">
        <div class="col-md-10 ">
            <div class="container">
                <div class="container py-2 col-md-8">
            <h3 class="group-control"> Role</h3>
                <a class="float-end btn btn-danger group-control " href="{{route('roles')}}">Back</a>
                </div>
            </div>
            <div class="container form-group">
            <form action="{{route('role.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="container col-md-8">
                    <div class="col-md-12">
                  
                    <div class="mb-3 form-group">
                        <label for="name">Role Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <h3 class="text-xl my-4 text-gray-600">Permissions</h3>
                    <div class="grid grid-cols-3 gap-4">
                      @foreach($permissions as $permission)
                          <div class="flex flex-col justify-cente">
                              <div class="flex flex-col">
                                  <label class="inline-flex items-center mt-3">
                                      <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="permissions[]" value="{{$permission->id}}"
                                      ><span class="ml-2 text-gray-700">{{ $permission->name }}</span>
                                  </label>
                              </div>
                          </div>
                      @endforeach
                    </div>
                    @can('create.role')
                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save Role</button>
                    </div>
                    @endcan
                          
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
