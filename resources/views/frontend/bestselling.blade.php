@extends('layouts.frontend.main')
@section('title','Best Selling  Books')
@section('content')
<div class="card">
        <div class="card-body ">
            <h3 class="text-success text-center">
              Best Selling Book
            </h3>
        </div>
       <div class="card">
                    <div class="row">
                                    @foreach ($books_arr as $bookItem)
                                        <div class="col-md-3 ">
                                                <div class="card-body">
                                                <div class="col-md-6">
                                                    @if($bookItem->hasMedia('book_image'))
                                                    <small class="text-danger">BestSelling</small>
                                                    @if ($bookItem->quantity>0)

                                                    <label class="label-stock bg-success">In Stock</label>
                                                    @else
                                                    <label class="label-stock bg-danger">Out Of Stock</label>
                                                @endif
                                                        <a href="{{ route('product_detail',$bookItem->slug) }}">
                                                    <img src="{{$bookItem->getMedia('book_image')[0]->getFullUrl()}}" style="width:250px;height:250px">
                                                </a>
                                                        <h3 >{{ $bookItem->name }}</h3>
                                                   @else
                                                   <td>Not image Found of {{$bookItem->name}}</td>
               
                                                    @endif  
                                                    <a  href="{{ route('addToCart',$bookItem->id) }}"
                                                            class="btn  btn-primary form-group" >Add To Cart</a>
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