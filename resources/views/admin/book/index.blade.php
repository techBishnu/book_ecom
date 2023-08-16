@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
            <div class="container py-3 col-md-8">
        <h3>Book 
            @can('create.book')
                <a class="float-end btn btn-primary" href="{{route('book.create')}}">Add Book</a>
                @endcan
        </h3>

            </div>

    </div>
</div>
<div class="row">
    {{-- <div class="container"> --}}

        {{-- <div class="col-md-22"> --}}
                {{-- <div class="container py-1 "> --}}
                    <table id="table" class="table table-bordered table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                {{-- <th>Slug</th> --}}
                                {{-- <th>Description</th> --}}
                                <th>Image</th>
                                <th>
                                    Category
                                </th>
                                <th>Author Name</th>
                                {{-- <th>Quantity</th> --}}
                                {{-- <th>Status</th> --}}
                                {{-- <th>Special</th> --}}
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($book as $booktItem)

                            <tr>
                            <td>{{$booktItem->id}}</td>
                            <td>{{$booktItem->name}}</td>
                            {{-- <td>{{$booktItem->slug}}</td> --}}
                            {{-- <td >{{ $booktItem->description }}</td> --}}
                            @if($booktItem->hasMedia('book_image'))
                            <td>
                            <img src="{{$booktItem->getMedia('book_image')[0]->getFullUrl()}}" style="width:80px;height:50px">


                            </td>
                           @else
                           <td>Not image Found of {{$booktItem->name}}</td>

                            @endif
                            <td>{{$booktItem->category->name}}
                            </td>
                            <td>{{$booktItem->author->name}}</td>
                            {{-- <td>{{ $booktItem->quantity }}</td> --}}
                            {{-- <td>{{ $booktItem->status}}</td> --}}
                            {{-- <td>{{ $booktItem->special}}</td> --}}
                            <td>{{ $booktItem->price }}</td>
                     

                            <td>

                             @can('update.book')
                                <a class="btn btn-primary " href="{{route('book.edit',$booktItem->id)}}">Edit</a>
                                @endcan
                                @can('delete.book')
                                <a class="btn btn-danger " href="{{ route('book.destroy',$booktItem->id) }}">Delete</a>
                                @else 
                                For <strong> Delete</strong> We need <strong>Admin</strong>        
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
