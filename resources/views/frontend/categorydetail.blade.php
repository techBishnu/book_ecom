@extends('layouts.frontend.main')
@section('content')
<div class="card">
            
                
        <div class="card">
                <div class="card-body ">
                    <h3 class="text-success text-center">
                        Our Category 
                    </h3>
                    <h4 class="text-danger"><a href="{{ route('books') }}" class="btn btn-danger">Back For Other Category</a></h4>
                </div>            <div class="row">
                            @forelse ($book as $bookItem)
                                
                            
                                <div class="col-md-3 ">
                                    <div class="mb-3">
                                        <div class="card-body">

                                        <div class="col-md-3">
                               
                        
                                            @if($bookItem->hasMedia('book_image'))
                                            @if ($bookItem->quantity>0)

                                            <label class="label-stock bg-success">In Stock</label>
                                            @else
                                            <label class="label-stock bg-danger">Out Of Stock</label>
                                        @endif
                                                <a href="{{ route('product_detail',$bookItem->slug) }}">
                                            <img src="{{$bookItem->getMedia('book_image')[0]->getFullUrl()}}" style="width:250px;height:200px">
                                        </a>
                                               
                                          
                                      
                                  
                                           @else
                                           <td>Not image Found of {{$bookItem->name}}</td>
                
                                            @endif    
                                                                             
                                </div>
                                <h3>{{ $bookItem->name }}</h3>
                                <a  href="{{ route('addToCart',$bookItem->id) }}"
                                        class="btn  btn-primary form-group" >Add To Cart</a>
                                 <p class=" "><strong>Rs. {{ $bookItem->price }}</strong></p>    
                                        
                    </div>
                </div>
   
                    </div>
                       
                    @empty
                            <h3>No Book Found</h3>
                    @endforelse 
                    </div>
                    </div>
                </div>
            
            </div>
            </div>
@endsection