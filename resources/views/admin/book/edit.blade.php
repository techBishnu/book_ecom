@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
            <div class="container py-3 col-md-12">
        <h3>Book </h3>
            <a class="float-end btn btn-danger" href="{{route('book')}}">Back</a>
            </div>
        <div class="container">
        <form action="{{route('book.update',$book->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
                <div class="mb-3">
                    <label for="name">Book</label>
                <input type="text" name="name" value="{{$book->name}}" class="form-control">
                @error('name') <small class="text-danger">{{ $message }}</small>@enderror

                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                <input type="text" name="slug" value="{{$book->slug}}" class="form-control">
                @error('slug') <small class="text-danger">{{ $message }}</small>@enderror

                </div>
                <div class="mb-3 form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="summernote" rows="3" class="ckeditor form-control">{{$book->description}}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small>@enderror

                </div>
                <div class="mb-3 form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if($book->hasMedia('book_image'))
                    <img src="{{$book->getMedia('book_image')[0]->getFullUrl()}}" style="width:80px;height:50px">
                    @endif
                </div>
                <div class="mb-3 form-group">
                        <label for="">Select Your Category</label>
                        <select name="category_id"  class="form-control">
                            
                            @foreach ($category as $categoryItem )
                            <option value="{{ $categoryItem->id }}"{{ $book->category_id==$categoryItem->id ?'selected':'' }}>{{ $categoryItem->name }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 form-group">
                            <label for="">Select Your Author</label>
                            <select name="author_id" class="form-control">
                                
                                @foreach ($author as $authorItem )
                                <option value="{{ $authorItem->id }}" {{ $book->author_id== $authorItem->id ? 'selected':''}}>{{ $authorItem->name }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                      
                                <div class="col-md-6 mb-3">
                                    <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" value="{{ $book->quantity }}" >
                                    
                            <br>
                            </div>
                      
                                    <div class="col-md-6 mb-3">
                                        <label for="status">Status</label>
                                            <input type="checkbox" name="status"  style="width:80px;height:50px"  {{ $book->status==1?'checked':'' }}>
                                        
                                    </div>
                      
                                    <div class="col-md-6 mb-3">
                                        <label for="special">Special Book</label>
                                            <input type="checkbox" name="special"  style="width:80px;height:50px"  {{ $book->special==1?'checked':'' }}>
                                        
                                    </div>
                                    <br>
                                    <div class="col-md-6 mb-3">
                                            <label for="price">Price</label>
                                                <input type="number" name="price" class="form-control" value="{{ $book->price }}">
                                            
                                        </div>
                                   
                               

                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Update Book</button>
                </div>
        </form>
        </div>
    </div>
</div>

@endsection
