@extends('layouts.admin')
@section('title','Order Details')

@section('content')

<div class="row">
    <h3>My Order Details </h3>
    <form action="{{ route('filter_order') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="">Filter By Date</label>
                <input type="date" name="date" value="{{ date('Y-m-d') }}"   class="form-control">
            </div>
            <div class="col-md-3">
                <label for="">Filter By Status</label>
                <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    @foreach ($status as $statu)
                    <option value="{{ $statu->name }}"  >{{ $statu->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('orderList') }} " class="btn btn-success">Reset</a>
            </div>
        </div>
    </form>
    <hr>
</div>
<div class="row">
    <div class="container">


        {{-- <div class="col-md-22"> --}}
        {{-- <div class="container py-1 "> --}}
        <table id="table" class="table table-bordered table-striped ">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Total</th>
                <th>Online</th>
                <th>Status</th>
                <th>Payment Mode</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $orderItem)
                <tr>

                    <td>{{ $orderItem->id }}</td>
                    <td>{{$orderItem->name}}</td>
                    <td>{{ $orderItem->email}}</td>
                    <td>{{ $orderItem->address}}</td>
                    <td>{{ $orderItem->pincode}}</td>
                    <td>{{ $orderItem->total}}</td>
                    <td>{!! $orderItem->online_res !!}</td>
                    <td>
                        <label>Change Status</label>
                        <form action="{{ route('statusChangeOrder',$orderItem->id) }}" method="post">
                            @csrf
                            <select name="status_message">
                                <option value="">Select Status</option>
                                @foreach ($status as $statu)
                                <option value="{{ $statu->name }}">{{ $statu->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit">update</button>
                            <p>current status: <strong
                                    class="text-success text-uppercase">{{ $orderItem->status_message }}</strong> </p>
                        </form>
                    </td>
                    <td>{{ $orderItem->payment_mode}}</td>
                    <td>
                        {{-- <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" 
                                    data-bs-target="#myModal">View</button> --}}

                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#myModal{{ $orderItem->id }}"
                            href="{{ route('orderview',$orderItem->id) }}">View</a>

                        <a class="btn btn-danger btn-sm"
                            href="{{ route('orderview.delete',$orderItem->id) }}">Delete</a>
                    </td>
                    <div class="modal fade" id="myModal{{$orderItem->id  }}" role="dialog">
                        <div class="modal-dialog modal-xl">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Order Item Details</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    @php
                                    $total=0;
                                    @endphp


                                    <div class="container">
                                        <div class="row">

                                            @foreach($orderItem->orderItem as $item)

                                            <div class="card-body">

                                                <div class="col-md-3">
                                                    <h4>Order iD: {{ $item->id }}</h4>
                                                    <h4>Order Item Name: {{ $item->order->name }}</h4>
                                                    <h4>Order Item Book: {{ $item->book->name }}</h4>
                                                    <h4>Order Quantity::{{ $item->quantity }}</h4>
                                                    <h4>Order Price:: {{ $item->price }}</h4>
                                                    <h4>Total:: {{$item->price*$item->quantity }} </h4>

                                                    @php

                                                    $total +=$item->price*$item->quantity;
                                                    @endphp
                                                </div>
                                            </div>
                                            @endforeach
                                            <hr>
                                            <div class="col-md-4">
                                                <label for="">User Details</label>
                                                <h5>User Id::{{ $orderItem->id }}</h5>
                                                <h5>User Name:{{$orderItem->name}}</h5>
                                                <h5>User Email:{{ $orderItem->email}}</h5>
                                                <h5>User Address:{{ $orderItem->address}}</h5>
                                                <h5>User Pincode:{{ $orderItem->pincode}}</h5>
                                                <h5>User Total Price{{ $orderItem->total}}</h5>
                                                @if ($orderItem->online_res !=null)
                                                <h5>{!! $orderItem->online_res !!}</h5>

                                                @endif
                                                <br>
                                                @php

                                                $total +=$item->price*$item->quantity;
                                                @endphp
                                            </div>
                                        </div>
                                    </div>
                                    <p class="float-end">Total Amount = <strong>{{ $total }}</strong> </p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
    </div>
</div>
</div>
</div>



@endforeach


</tbody>
</table>
</div>
<div class="col-md-8">
</div>
<div class="py-5"></div>
</div>
<hr>


</div>
@endsection