@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
            <div class="container py-3 col-md-12">
        <h3>slider</h3>
            <a class="float-end btn btn-danger" href="{{route('slider')}}">Back</a>
            </div>
        <div class="container">
        <form action="{{route('slider.update',$category->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
                <div class="mb-3">
                    <label for="name">Category</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div class="mb-3 form-group">
                    <label for="description">Description</label>
                    <textarea name="description"  rows="3" class="form-control">{{$category->description}}</textarea>
                </div>
                <div class="mb-3 form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($category->hasMedia('slider_image'))
                    <img src="{{$category->getMedia('slider_image')[0]->getFullUrl()}}" style="width:80px;height:50px">
                    @endif
                </div>
                <div class="mb-3 form-group">
                    <label for="status">Status</label>
                    <input type="checkbox" name="status" style="width:80px;height:50px" {{$category->status=='1' ? 'checked':''}}>
                </div>



                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Update slider</button>
                </div>
        </form>
        </div>
    </div>
</div>

@endsection
