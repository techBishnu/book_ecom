@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
            <div class="container py-3 col-md-8">
        <h3>Roles
            @can('create.role')
                <a class="float-end btn btn-primary" href="{{route('role.create')}}">Add Role</a>
                @endcan
        </h3>

            </div>

    </div>
</div>
<div class="row">
    <div class="container">

        <div class="col-md-22">
                <div class="container py-1 ">
                    <table  class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                               
                                <th>Name</th>
                                <th>permission</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)

                            <tr>
                          
                            <td>{{$role->name}}</td>
                            <td class="py-4 px-6 border-b border-grey-light">
                                    @foreach($role->permissions as $permission)
                                      <span class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none  bg-gray-500 rounded-full">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
           
                             <td>
                                 @can('update.role')
                                    <a class="btn btn-primary btn-sm" href="{{route('role.edit',$role->id)}}">Edit</a>
                                @endcan
                                @can('delete.role')
                                    <a class="btn btn-danger btn-sm" href="{{ route('role.delete',$role->id) }}">Delete</a>
                                 @endcan
                           
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection
