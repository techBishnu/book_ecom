@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
            <div class="container py-3 col-md-8">
        <h3>Book Category
            @can('create.category')
                <a class="float-end btn btn-primary" href="{{route('category.create')}}">Add Category</a>
        @endcan
            </h3>

            </div>

    </div>
</div>
<div class="row">
    <div class="container">

        <div class="col-md-22">
                <div class="container py-1 ">
                    <table id="table" class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $categorytItem)

                            <tr>
                            <td>{{$categorytItem->id}}</td>
                            <td>{{$categorytItem->name}}</td>
                            <td>{!! $categorytItem->description !!}</td>
                            @if($categorytItem->hasMedia('category_image'))
                            <td>
                            <img src="{{$categorytItem->getMedia('category_image')[0]->getFullUrl()}}" style="width:80px;height:50px">


                            </td>
                           @else
                           <td>Not image Found of {{$categorytItem->name}}</td>

                            @endif
                            <td>{{$categorytItem->status==1?'In Stock':'Out Of Stock'}}</td>

                            <td>

                             @can('update.category')
                                <a class="btn btn-primary btn-sm" href="{{route('category.edit',$categorytItem->id)}}">Edit</a>
                                @endcan
                                @can('delete.category')    
                                <a class="btn btn-danger btn-sm" href="{{ route('category.destroy',$categorytItem->id) }}">Delete</a>
                                    @else 
                                    For <strong> delete</strong> We need <strong>Permission</strong>        
                                      @endcan
                                </td>
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
