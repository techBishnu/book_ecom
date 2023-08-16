@extends('layouts.admin')
@section('title','Order Item Details')

@section('content')

<div class="row">
        <div class="col-md-12">
                <form>
                        <div class="form-control">
                                <table class="table table-borderd table-striped">
                                        <thead>
                                                <tr>
                                                        <th>Id</th>
                                                        <th>Customer Name</th>
                                                        <th>Customer Email</th>
                                                        <th>Customer Address</th>
                                                        <th> Customer Pincode </th>
                                                        <th> Customer Payment_Mode </th>
                                                        <th> Customer Status Message </th>
                                                        <th> Customer OrderId(If online) </th>
                                                </tr>
                                        </thead>
                                        <tbody>

                                                <tr>
                                                        <td>{{ $notification->id }}</td>
<td>{{ $notification->name }}</td>
<td>{{ $notification->email }}</td>
<td>{{ $notification->address }}</td>
<td>{{ $notification->pincode }}</td>
<td>{{ $notification->payment_mode }}</td>
<td>{{ $notification->status_message }}</td>
@if ($notification->status_message =="ESEWA")
<td> {{ $notification->order_id }}</td>
@endif
</tr>

</tbody>
</table>
</form>
<hr>

<div class="col-md-12">


        <div class="container py-3 ">
                @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <hr>
                <h3>User Order Item Details
                        <table class="table table-borderd table-striped">
                                <thead>
                                        <tr>
                                                <th>Id</th>
                                                <th>Order Id</th>
                                                <th>Book Id</th>
                                                <th>Quantity</th>
                                                <th> Unit Price </th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @foreach ($orderItems as $orderItem)
                                        <tr>
                                                <td>{{ $orderItem->id }}</td>
                                                <td>{{ $orderItem->order->name }}=[order Id>>{{ $orderItem->order_id }}]
                                                </td>
                                                <td>{{ $orderItem->book->name }}=[book Id>>{{ $orderItem->book_id }}]
                                                </td>
                                                <td>{{ $orderItem->quantity }}</td>
                                                <td>{{ $orderItem->price }}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>




                </h3>


        </div>
</div>
</div>
</div>

@endsection
{{-- <!DOCTYPE html>
<html lang="en">

<head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
        <button type="submit" class="btn btn-primary modal_button" data-bs-toggle="modal" data-bs-target="#myModal">
                View
        </button>
        <!-- The Modal -->
        <div class="modal" id="myModal">
                <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                        <h4 class="modal-title">Modal Heading</h4>
                                        <a href="{{ route('admin.dashboard') }}" type="button" class="btn-close btn_close" data-bs-dismiss="modal"></a>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                        <div class="row">
                                                <div class="col-md-12">
                                                        <form>
                                                                <div class="form-control">
                                                                        <table
                                                                                class="table table-borderd table-striped">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th>Id</th>
                                                                                                <th>Customer Name</th>
                                                                                                <th>Customer Email</th>
                                                                                                <th>Customer Address
                                                                                                </th>
                                                                                                <th> Customer Pincode
                                                                                                </th>
                                                                                                <th> Customer
                                                                                                        Payment_Mode
                                                                                                </th>
                                                                                                <th> Customer Status
                                                                                                        Message </th>
                                                                                                <th> Customer OrderId(If
                                                                                                        online) </th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        <tr>
                                                                                                <td>{{ $notification->id }}
                                                                                                </td>
                                                                                                <td>{{ $notification->name }}
                                                                                                </td>
                                                                                                <td>{{ $notification->email }}
                                                                                                </td>
                                                                                                <td>{{ $notification->address }}
                                                                                                </td>
                                                                                                <td>{{ $notification->pincode }}
                                                                                                </td>
                                                                                                <td>{{ $notification->payment_mode }}
                                                                                                </td>
                                                                                                <td>{{ $notification->status_message }}
                                                                                                </td>
                                                                                                @if($notification->status_message
                                                                                                =="ESEWA")
                                                                                                <td> {{ $notification->order_id }}
                                                                                                </td>
                                                                                                @endif
                                                                                        </tr>

                                                                                </tbody>
                                                                        </table>
                                                        </form>
                                                        <hr>
                                                        <div class="col-md-12">
                                                                        <div class="form-control">
                                                                        <h3>User Order Item Details
                                                                                <hr>
                                                                                <table
                                                                                        class="table table-borderd table-striped">
                                                                                        <thead>
                                                                                                <tr>
                                                                                                        <th>Id</th>
                                                                                                        <th>Order Id
                                                                                                        </th>
                                                                                                        <th>Book Id</th>
                                                                                                        <th>Quantity
                                                                                                        </th>
                                                                                                        <th> Unit Price
                                                                                                        </th>
                                                                                                </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                                @foreach ($orderItems as
                                                                                                $orderItem)
                                                                                                <tr>
                                                                                                        <td>{{ $orderItem->id }}
                                                                                                        </td>
                                                                                                        <td>{{ $orderItem->order->name }}=[order
                                                                                                                Id>>{{ $orderItem->order_id }}]
                                                                                                        </td>
                                                                                                        <td>{{ $orderItem->book->name }}=[book
                                                                                                                Id>>{{ $orderItem->book_id }}]
                                                                                                        </td>
                                                                                                        <td>{{ $orderItem->quantity }}
                                                                                                        </td>
                                                                                                        <td>{{ $orderItem->price }}
                                                                                                        </td>
                                                                                                </tr>
                                                                                                @endforeach
                                                                                        </tbody>
                                                                                </table>
                                                                        </h3>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                        <a href="{{ route('admin.dashboard') }}" type="button" class="btn btn-danger btn_close"
                                                data-bs-dismiss="modal">Close</a>
                                </div>
                        </div>
                </div>
        </div>
        <script>
                document.getElementsByClassName("modal_button")[0].click();
                document.getElementsByClassName("btn_close").onclick = function () {
                        location.href={{ route('admin.dashboard') }};
    };
        </script>
</body>

</html> --}}