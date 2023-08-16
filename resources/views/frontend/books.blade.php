@extends('layouts.frontend.main')
@section('title','Books')

@section('content')
<div class="form-group " >
        <div class="row">
            <div class="flex-right">
                <form action="{{ route('categorysearch') }}" method="post" class="form-control">
                    @csrf
                    <select name="category_id" id="" style="background-color:gray">
                        <option value="">Select Your Category</option>
                        @foreach ($category as $categoryItem )
                        <option value="{{ $categoryItem->id }}">{{ $categoryItem->name }}</option>
                            
                        @endforeach
                      
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </form>
            </div>
        </div>
    </div>
<div class="card">
     <div class="card-body ">
            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
      @endif
        <h3 class="text-success text-center">
                    
        Our Book
         </h3>
    </div>
        

<div class="card">
    <div class="row">
         @foreach ($book as $bookItem)
             
                  
                                
             <div class="col-md-3 ">
                 <div class="card-body">
                     <div class="border ">
                        <div class="col-md-12">
                             @if($bookItem->hasMedia('book_image'))
                            
                                 <a href="{{ route('product_detail',$bookItem->slug) }}">
                                        @if ($bookItem->quantity>0)

                             <label class="label-stock bg-success text-dark">In Stock</label>
                             @else
                             <label class="label-stock bg-danger text-dark">Out Of Stock</label>
                         @endif
                                     <img src="{{$bookItem->getMedia('book_image')[0]->getFullUrl()}}" style="width:250px;height:250px">
                                 </a>
                                 <h3 >{{ $bookItem->name }}</h3>
                                 <a  href="{{ route('addToCart',$bookItem->id) }}"
                                    class="btn  btn-primary form-group" >Add To Cart</a>
                                    <p class=" "><strong>Rs. {{ $bookItem->price }}</strong></p>
                                    @else
                                    Not image Found of {{$bookItem->name}}
                                    @endif                                       
                         </div>
                     </div>
                 </div>
             </div>
               
         @endforeach
    </div>
</div>

    
@endsection