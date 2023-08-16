@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="pl-5">
        <div class="col-md-10 ">
            <div class="container">
                <div class="container py-2 col-md-8">
            <h3 class="group-control"> Permission</h3>
                <a class="float-end btn btn-danger group-control " href="{{route('permissions')}}">Back</a>
                </div>
            </div>
            <div class="container form-group">
            <form action="{{route('permission.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="container col-md-8">
                    <div class="col-md-12">
                  
                    <div class="mb-3 form-group">
                        <label for="name">Permission Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>

                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save Permission</button>
                    </div>
                          
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
