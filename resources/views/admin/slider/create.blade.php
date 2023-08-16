@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="pl-5">
        <div class="col-md-10 ">
            <div class="container">
                <div class="container py-2 col-md-8">
            <h3 class="group-control">Slider</h3>
                <a class="float-end btn btn-danger group-control " href="{{route('slider')}}">Back</a>
                </div>
            </div>
            <div class="container form-group">
            <form action="{{route('slider.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="container col-md-8">
                    <div class="col-md-12">
                  
                    <div class="mb-3 form-group">
                        <label for="name">slider</label>
                        <input type="text" name="name" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description">Description</label>
                        <textarea name="description"  rows="3" class="form-control"></textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                    <div class="mb-3 form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                    <div class="mb-3 form-group">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" style="width:80px;height:50px">
                    </div>


                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save slider</button>
                    </div>
                          
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
