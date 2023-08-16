@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
            <div class="container py-3 col-md-8">
        <h3>Book Record
            @role('Admin')
                <a class="float-end btn btn-primary" href="{{route('record.create')}}">Add Record</a>
                @endrole
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
                                <th>User ID</th>
                                <th>Book ID</th>
                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($record as $recordtItem)

                            <tr>
                            <td>{{$recordtItem->id}}</td>
                            <td>{{$recordtItem->user->name}}</td>
                            <td>{{$recordtItem->book->name}}</td>
                            <td>
                             @role('Admin')
                                <a class="btn btn-primary btn-sm" href="{{route('record.edit',$recordtItem->id)}}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('record.destroy',$recordtItem->id) }}">Delete</a>
                               
                                    @else 
                                    For <strong> Action</strong> We need <strong>Admin</strong>        
                                      @endrole </td>
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
