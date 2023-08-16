@extends('layouts.admin')
@section('title','Order Item Details')

@section('content')  
<div class="row">
    <div class="col-md-12">
      <form >
        <div class="form-control">
        <div class="text-center">
        <h3 class="form-group" for="">User Details</h3>
        <h5 class="form-group">Name:: <strong class="text-success form-group">{{ $orders->name }}</strong> </h5>
        <h5 class="form-group">Email:: <strong class="text-success form-group">{{ $orders->email }}</strong> </h5>
        <h5 class="form-group"> Address::<strong class="text-success form-group"> {{ $orders->address }}</strong></h5>
        <h5 class="form-group">Pincode:: <strong class="text-success form-group"> {{ $orders->pincode }}</strong></h5>
        <h5 class="form-group"> Payment_mode::<strong class="text-success form-group">{{ $orders->payment_mode }}</strong> </h5>
        <h5 class="form-group"> Status Message::<strong class="text-success form-group"> {{ $orders->status_message }}</strong></h5>
      </div>
      </div>
      </form>
       
    <div class="col-md-12">
      
        
                    <div class="container py-3 col-md-8">
                      @if(session('message'))
                      <div class="alert alert-success">{{ session('message') }}</div>
                      @endif
                        <hr>
                <h3>User Order Item Details

                </h3>
        

                    </div>
                  </div>

    
 <div class="container">
<div class="row">


       <div class="col-md-10">
  <table class="table table-bordered table-striped ">
      <div class="col-md-12">
                        <thead>
                                <hr>
                                <tr  >
                                
                                  
                                    <th>Id</th>
                                    <th>Order Id Name</th>
                                    <th>Book Id Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th> Action</th>
                                </tr>
                        </thead>
                        <tbody>
                          @php
                              $total=0;
                          @endphp
                           @foreach ($orders->orderItem as  $order)
                            <tr>
                           
                            
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_id }}:{{ $order->order->name }}</td>
                            <td>{{ $order->book_id }}:Name {{ $order->book->name }}</td>
                            <td>{{ $order->quantity}}</td>
                            <td>{{ $order->price}}</td>
                            <td>{{ $order->price*$order->quantity }}</td>
                           
                            <td>
                                <a class="btn btn-danger btn-sm"href="{{ route('deleteOrderItem',$order->id) }}">Delete</a>
                            </td>
                            @php
                                $total += $order->price*$order->quantity

                            @endphp
                            @endforeach
                           

                     </tbody>
            </div>
    </table>
                    <h3 class="float-end">Totat Amount:{{ $total }}</h3>
                  </div>
                  
          
 </div>
    </div>
    </div>
</div>

            </div>
            
@endsection
