@extends('layouts.frontend.main')
@section('title','Checkout')

@section('content')

<div class="row">
        <div class="py-5">
                <div class="col-md-12">
                        @if(session('message'))
                        <h5 class="alert alert-success">{{session('message')}}</h5>
                        @endif
                        <div class="container py-3 col-md-8">
                                <hr>
                                <h3>Your Total Price is :: {{ $totalPrice }}

                                </h3>


                                <hr>
                                <div class="container">
                                        <div class="row">
                                                <form action="{{ route('orderAdded') }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                        <label>Full Name</label>
                                                                        <input type="text" name="name"
                                                                                class="form-control"
                                                                                placeholder="Enter Full Name"
                                                                                value="{{ Auth::user()->name }}" />
                                                                                @error('name') <small
                                                                                class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                        <label>Phone Number</label>
                                                                        <input type="number" name="phone"
                                                                                class="form-control"
                                                                                placeholder="Enter Phone Number" />
                                                                        @error('phone') <small
                                                                                class="text-danger">{{ $message }}</small>@enderror
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                        <label>Email Address</label>
                                                                        <input type="email" name="email"
                                                                                class="form-control"
                                                                                placeholder="Enter Email Address"
                                                                                value="{{ Auth::user()->email }}" />
                                                                        @error('email') <small
                                                                                class="text-danger">{{ $message }}</small>@enderror

                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                        <label>Pin-code (Zip-code)</label>
                                                                        <input type="number" name="pincode"
                                                                                class="form-control"
                                                                                placeholder="Enter Pin-code" />
                                                                        @error('pincode') <small
                                                                                class="text-danger">{{ $message }}</small>@enderror

                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                        <label>Full Address</label>
                                                                        <textarea name="address" class="form-control"
                                                                                rows="2"></textarea>
                                                                    @error('address') <small class="text-danger" >{{ $message }}</small>@enderror

                                                                </div>
                                                                {{-- <div class="col-md-12 mb-3 form-control ">
                                                                        <label for="cod">COD</label>
                                                                       <input id="cod" type="radio" value="COD" name="payment_mode"/>
                                                                        <label for="esewa">ESEWA</label>
                                                                       <input id="esewa" type="radio" value="ESEWA" name="payment_mode"/>

                                                                </div> --}}
                                                                <div class="col-md-12 mb-3 checkout ">
                                                                        <label>Select Payment Mode: </label>
                                                                        <div class="d-md-flex align-items-start">
                                                                                <div class="nav col-md-3 flex-column nav-pills me-3"
                                                                                        id="v-pills-tab" role="tablist"
                                                                                        aria-orientation="vertical">
                                                                                        <button class="nav-link fw-bold"
                                                                                                id="cashOnDeliveryTab-tab"
                                                                                                data-bs-toggle="pill"
                                                                                                data-bs-target="#cashOnDeliveryTab"
                                                                                                type="button" role="tab"
                                                                                                aria-controls="cashOnDeliveryTab"
                                                                                                aria-selected="true">Cash
                                                                                                on Delivery</button>
                                                                                        <button class="nav-link fw-bold"
                                                                                                id="onlinePayment-tab"
                                                                                                data-bs-toggle="pill"
                                                                                                data-bs-target="#onlinePayment"
                                                                                                type="button" role="tab"
                                                                                                aria-controls="onlinePayment"
                                                                                                aria-selected="false">Online
                                                                                                Payment</button>
                                                                                </div>
                                                                                <div class="tab-content col-md-9"
                                                                                        id="v-pills-tabContent">
                                                                                        <div class="tab-pane fade"
                                                                                                id="cashOnDeliveryTab"
                                                                                                role="tabpanel"
                                                                                                aria-labelledby="cashOnDeliveryTab-tab"
                                                                                                tabindex="0">
                                                                                                <h6>Cash on Delivery
                                                                                                        Mode</h6>
                                                                                                <hr />
                                                                                                <button name="payment_mode" type="submit" value="COD"
                                                                                                        class="btn btn-primary">Place
                                                                                                        Order (Cash on
                                                                                                        Delivery)</button>

                                                                                        </div>
                                                                                        <div class="tab-pane fade"
                                                                                                id="onlinePayment"
                                                                                                role="tabpanel"
                                                                                                aria-labelledby="onlinePayment-tab"
                                                                                                tabindex="0">
                                                                                                <h6>Online Payment Mode
                                                                                                </h6>
                                                                                                <hr />
                                                                                               
                                                                                                <button name="payment_mode" type="submit" value="ESEWA"
                                                                                                class="btn btn-primary">
                                                                                              ESewa</button>      
                                                                                                <button name="payment_mode" type="submit" value="KHALTI"
                                                                                                class="btn btn-primary">
                                                                                              Khalti</button>      
                                                                                        </div>
                                                                                </div>
                                                                        </div>

                                                                </div>
                                                        </div>
                                                       
                                                </form>

                                              
                                        </div>
                                </div>

                        </div>


                </div>
        </div>
</div>


@endsection