@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="pl-5">
        <div class="col-md-10 ">
            <div class="container">
                <div class="container py-2 col-md-8">
            <h3 class="group-control">Book Category</h3>
                <a class="float-end btn btn-danger group-control " href="{{route('category')}}">Back</a>
                </div>
            </div>
            <div class="container form-group">
            <form action="{{route('category.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="container col-md-8">
                    <div class="col-md-12">
                  
                    <div class="mb-3 form-group">
                        <label for="name">Category</label>
                        <input type="text" name="name" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="summernote" rows="3" class="ckeditor form-control"></textarea>
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
                        <button class="btn btn-primary" type="submit">Save Category</button>
                    </div>
                          
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
