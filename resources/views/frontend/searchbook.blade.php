@extends('layouts.frontend.main')
@section('title','Best Selling  Books')
@section('content')
<div class="card">
        <div class="card-body ">
            <h3 class="text-success text-center">
             Search Book
            </h3>
        </div>
        @if(session('message'))
              <div class="alert alert-success">{{ session('message') }}</div>
        @endif
       <div class="card">
                    <div class="row">
                       
                                    @foreach ($book as $bookItem)
                                        <div class="col-md-3 ">
                                                <div class="card-body">
                                                <div class="col-md-6">
                                                    @if($bookItem->hasMedia('book_image'))
                                                    <small class="text-danger">SearchingBook</small>
                                                        <a href="{{ route('product_detail',$bookItem->slug) }}">
                                                    <img src="{{$bookItem->getMedia('book_image')[0]->getFullUrl()}}" style="width:250px;height:250px">
                                                </a>
                                                        <h3 >{{ $bookItem->name }}</h3>
                                                   @else
                                                   <td>Not image Found of {{$bookItem->name}}</td>
               
                                                    @endif  
                                                    <a  href="{{ route('addToCart',$bookItem->id) }}"
                                                            class="btn  btn-success form-group" >Add To Cart</a>
                                                            <p class=" "><strong>Rs. {{ $bookItem->price }}</strong></p>                                     
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            </div>
                        </div>
                    </div>
        </div>
@endsection