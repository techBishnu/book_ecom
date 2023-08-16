@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="pl-5">
        <div class="col-md-10 ">
            <div class="container">
                <div class="container py-2 col-md-8">
            <h3 class="group-control">Book</h3>
                <a class="float-end btn btn-danger group-control " href="{{route('book')}}">Back</a>
                </div>
            </div>
            <div class="container form-group">
            <form action="{{route('book.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
              
                <div class="container col-md-8">
                    <div class="col-md-12">
                  
                    <div class="mb-3 form-group">
                        <label for="name">Book</label>
                        <input type="text" name="name" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    
                    <div class="mb-3 form-group">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3" class=" ckeditor form-control"></textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                    <div class="mb-3 form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                    <div class="col-md-6 mb-3 form-control">
                        <select name="category_id" class="col-md-6 " >
                            @foreach ($category as $categoryItem )
                            <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6 form-control">
                            <select name="author_id" class="col-md-6">
                                @foreach ($author as $authorItem )
                                <option value="{{ $authorItem->id }}">{{ $authorItem->name }}</option>
                                    
                                @endforeach
                            </select>
                    </div>
                 
                        <div class="col-md-6 mb-3">
                            <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" >
                            
                        </div>
                    
                
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                    <input type="checkbox" name="status"  style="width:80px;height:50px">
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="special">Special Book</label>
                                    <input type="checkbox" name="special"  style="width:80px;height:50px">
                                
                            </div>
                        
                        <br>
                      
                                <div class="col-md-6 mb-3">
                                    <label for="price">Price</label>
                                        <input type="number" name="price" class="form-control" >
                                    
                                </div>
                           
                  


                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save Book</button>
                    </div>
                          
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
