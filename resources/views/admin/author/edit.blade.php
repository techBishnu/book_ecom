@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="container py-3 col-md-12">
            <h3>Book Author</h3>
            <a class="float-end btn btn-danger" href="{{route('author')}}">Back</a>
        </div>
        <div class="container">
            <form action="{{route('author.update',$author->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name">Author</label>
                    <input type="text" name="name" value="{{$author->name}}" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small>@enderror

                </div>
                <div class="mb-3 form-group">
                    <label for="address">Address</label>
                    <textarea name="address" rows="3" class="form-control">{{$author->address}}</textarea>
                    @error('address') <small class="text-danger">{{ $message }}</small>@enderror

                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" value="{{$author->phone}}" class="form-control">
                    @error('phone') <small class="text-danger">{{ $message }}</small>@enderror

                </div>
                <div class="mb-3 form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="3"
                        class="ckeditor form-control">{{$author->description}}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small>@enderror

                </div>

                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Update author</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection