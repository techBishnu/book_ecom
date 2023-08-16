@extends('layouts.frontend.main')
@section('title')
{{ $book['category']['name'] }} - {{ $book->slug }}
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body mb-3">
            @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
            @endif

            <div class="col-md-12 py-4">
                <div class="py-3 py-md-5 bg-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 mt-3">
                                <div class="bg-white border">
                                    @if($book->hasMedia('book_image'))
                                    


                                    <img src="{{$book->getMedia('book_image')[0]->getFullUrl()}}" class="w-100"
                                        alt="Img">




                                    @else
                                    <td>Not image Found of {{$book->name}}</td>

                                    @endif
                                </div>
                            </div>
                            <div class="col-md-7 mt-3">
                                <div class="product-view">
                                    <h4 class="product-name">
                                        {{ $book->name }}
                                        @if ($book->quantity>0)

                                        <label class="label-stock bg-success">In Stock</label>
                                        @else
                                        <label class="label-stock bg-danger">Out Of Stock</label>
                                    @endif

                                    </h4>
                                    <hr>
                                    <p class="product-path">
                                        Home /{{ $book['category']['name'] }} / {{ $book->slug }}
                                    </p>
                                    <div>
                                        <span class="selling-price">Rs{{ $book->price }}</span>
                                        {{-- <span class="original-price">Rs{{ $book->price }}</span> --}}
                                    </div>
                                    <div class="mt-2">
                                       
                                    </div>
                                    <h5>Author Name : <strong>{{ $book->author->name }}</strong></h5>
                                    <h4 >Category Of Book: <strong>
                                            {{ $book->category->name }}</strong> </h4>


                                    <div class="mt-3">
                                        <h5 class="mb-0">Small Description</h5>
                                       
                                                <p >{{ $book->description }}</p>
                                        
                                    </div>
                                    <a  href="{{ route('addToCart',$book->id) }}"
                                            class="btn  btn-primary form-group" >Add To Cart</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        <h4>Description</h4>
                                    </div>
                                    <div class="card-body">

                                        {{-- <p class=" text-center">{{ $book->description }}</p> --}}Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a ty
                                       

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="container">
			<div class=" row">
				{{-- <div class="preview col-md-12"> --}}
                {{-- <div class="py-3">
                            
                        <div class="card"> --}}
                {{-- <div class="card-body float-end"> --}}
                {{--               

                                
                            
                                @if($book->hasMedia('book_image'))
                                @if ($book->quantity>0)
                                   
                                <small class="text-success"> In Stock </small>                                
                                    
                                @else
                                <small class="text-danger"> Out of Stock </small>       
                                @endif
                          
                                
                                <img src="{{$book->getMedia('book_image')[0]->getFullUrl()}}"
                style="width:1000px;height:400px">




                @else
                <td>Not image Found of {{$book->name}}</td>

                @endif
            </div>
        </div>
        <div class="col-md-20">
            <div class="container">

                <div class="row">
                    <div class=" col-md-20">
                        <div class="card-body text-center">
                            <h4 class=" text-center">Category Of Book: <strong> {{ $book->category->name }}</strong>
                            </h4>
                            <h3 class=" text-center">Name Of Book : <strong>{{ $book->name }}</strong></h3>
                            <h3 class=" text-center ">Price Of Book : <strong>{{ $book->price }}</strong> </h3>




                            <p class=" text-center">
                                <h3>Description:</h3> {{ $book->description }}
                            </p>




                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection