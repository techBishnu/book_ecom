@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
                <div class="container py-3 col-md-8">
            <h3>Our User 
               
            </h3>

                </div>

        </div>
    </div>
    <div class="row">
            <div class="container">
        
                <div class="col-md-22">
                        <div class="container py-1 ">
                            <table class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Change Role</th>
                                        {{-- <th>Change Permission</th> --}}
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $userItem)
        
                                    <tr>
                                    <td>{{$userItem->id}}</td>
                                    <td>{{$userItem->name}}</td>
                                    <td>{{$userItem->email}}</td>
                                    <td>
                                        <form action="{{ route('change_role',$userItem->id) }}" method="POST">
                                            @csrf
                                            <select name="role_name" class="form-control" multiple>
                                                
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    @foreach($userItem['roles'] as $ur)
                                                    <option value="{{ $role->name }}" {{ $ur->id == $role->id?'selected':'' }}>{{ $role->name }}</option>
                                                    {{-- {{ $ur->id == $role->id?'selected':'' }}  --}}
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            <button type="submit">Update</button>
                                        </form>
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