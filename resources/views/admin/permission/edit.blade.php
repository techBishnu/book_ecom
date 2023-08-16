@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="container py-3 col-md-12">
            <h3>Permission</h3>
            <a class="float-end btn btn-danger" href="{{route('permissions')}}">Back</a>
        </div>
        <div class="container">
            <form action="{{route('permission.update',$permission->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name">Permission</label>
                    <input type="text" name="name" value="{{$permission->name}}" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small>@enderror

                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Update Permission</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection