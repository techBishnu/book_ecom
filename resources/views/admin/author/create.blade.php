@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="pl-5">
        <div class="col-md-10 ">
            <div class="container">
                <div class="container py-2 col-md-8">
            <h3 class="group-control"> Author</h3>
                <a class="float-end btn btn-danger group-control " href="{{route('author')}}">Back</a>
                </div>
            </div>
            <div class="container form-group">
            <form action="{{route('author.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="container col-md-8">
                    <div class="col-md-12">
                  
                    <div class="mb-3 form-group">
                        <label for="name">Author Name</label>
                        <input type="text" name="name" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="address">Address</label>
                        <textarea name="address"  rows="3" class="form-control"></textarea>
                        @error('address') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                    <div class="mb-3 form-group">
                            <label for="description">Description</label>
                            <textarea name="description"  rows="3" class="ckeditor form-control"></textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small>@enderror
    
                        </div>
                    <div class="col-md-6 mb-3 form-group">
                            <label for="phone">Author Phone</label>
                            <input type="number" name="phone" class="form-control">
                            @error('phone') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                

                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save Author</button>
                    </div>
                          
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
