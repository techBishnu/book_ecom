@extends('layouts.frontend.main')
@section('title','My Cart')

@section('content')

<div class="row">
   
    <div class="col-md-12">
        @if(session('message'))
    <h5 class="alert alert-success"> <small>{{ session('bookQuantity') }}</small> {{session('message')}}</h5>
    @endif
            <div class="container py-3 col-md-8">
                <hr>
        <h3>My Cart

        </h3>
       

            </div>

    </div>
</div>
<div class="row">
    <div class="container">

        @php
            $total=0;
        @endphp
        <div class="col-md-22">
            @if (Session::has('cart'))
                
                <div class="container py-1 ">
             
                        <table class="table table-bordered table-striped ">
                         <thead>
                                <hr>
                                
                                <th>Image</th>
                                <th>Book</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($cart as $id => $cartItem)
                            <tr>
                            <td>
                            <a href="{{ $cartItem['url'] }}">
                            <img src="{{ $cartItem['image'] }}" alt="" style="height:100px">
                            </a>    
                            </td>
                            <td>{{$cartItem['name']}}</td>
                            <td>
                                <form action="{{ route('updateToCart',$cartItem['id']) }}" method="post" class="update-cart-form">
                                    @csrf
                                   
                                    <label for="">Quantity</label>
                                    <input type="hidden" name="book_id" value="{{ $cartItem['id'] }}">
                                    <button class="btn-minus" ><i class="fa fa-minus" data-book-id="{{ $cartItem['id'] }}" ></i></button>
                                    <input type="number" name="quantity" id="quantity" min="1" max="10" value="{{$cartItem['quantity']}}">
                                    <button class="btn-plus" ><i class="fa fa-plus"  data-book-id="{{ $cartItem['id'] }}"></i></button>
                                   
                           </form>
                           
                            </td>
                            <td>{{$cartItem['price']}}</td>
                            <td>{{$cartItem['price']*$cartItem['quantity']}}</td>

                            <td>               
                                     <a class="btn btn-danger btn-sm" href="{{ route('cartdelete', $cartItem['id']) }}">
                                            <i class="fas fa-trash" aria-hidden="true"></i></a> 
                                </td>
                            </tr>
                                   @php
                                       $total +=$cartItem['price']*$cartItem['quantity'];
                                   @endphp
                            @endforeach
                        </tbody>
                    </table>
                    <label class="float-end " for="">Total Price : <strong>{{ $total }}</strong></label>
                    <br>
                    {{-- <form action="{{ route('checkout') }}" method="get">
                    @csrf --}}
                    <a href="{{ route('checkout') }}" class="btn btn-warning btn-lg float-end " type="button">CheckOut</a>
                {{-- </form> --}}
                    <br>
                    <br>
                    <div>
                        <hr> 
                        <h2 class="alert alert-important">Continue Your Shopping <a class="btn btn-primary btn-sm" href="{{ route('books') }}">Shop Now</a> With Us</h2>
                        
                    </div>
                </div>
        </div> 
        @else
        <h1 class="text-center">You Have No Any Cart </h1>
        <h2 class=" alert-success text-center"> Please Continue Your Shopping <a class="btn btn-primary btn-sm" href="{{ route('books') }}">Shop Now</a> With Us</h2>

        @endif
    </div>
</div>
</div>
<hr>
<script>

    $(document).ready(function (){
        var $btnPlus= $('.btn-plus');
        var $btnMinus=  $('.btn-minus');
        var $cartQuantity=$('#quantity')
        // $('.update-cart-form').on('submit',function(e){
        //     e.preventDefault();
        //     var $form=$(this);
        //     var url=$form.attr('action');
        //     var data=$form.serialize();
        //     var bookId=data.split('&')[1];
        //     var quantity=data.split('&')[2];
        //     debugger;
        // $.ajax({
        //             method:"post",
        //             url:url,
        //             data:{
        //                 _token:"{{ csrf_token() }}",
        //                 bookId:bookId,
        //                 quantity:quantity
        //             },
        //             success:function(res){
                       
        //                 console.log(res)
        //                 window.location.reload();
        //             }
        //         });
        // })
      
      $btnMinus.click(function (){
           var input=$(this).next('#quantity');
            var value=parseInt(input.val());
            value--;
           
            if(value>=1){
               
                input.val(value);
                
            }
        });
       $btnPlus.click(function (){
           var input=$(this).prev('#quantity');
            var value=parseInt(input.val());
            value++;
            if(value<10){
               
                input.val(value);
               
            }
        });
    });
</script>
@endsection 
