@extends('layouts.frontend.main')
@section('title','user profile')

@section('content')

<div class="card">

    <div class="card-body ">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <h3 class="text-success text-center">
            User Details
            <a href="{{ route('change-password') }}" class="btn btn-primary float-end">Change Password</a>
        </h3>
    </div>
<div class="container">
    <div class="card ">
        <div class="col-md-12">
        {{-- <div class="col-md-12 "> --}}
        <div class="row">
            <form action="{{ route('profile.user') }}" method="POST" class="form-control">
                @csrf
                    <div class="col-md-6 mb-3">
                        <label>Full Name</label>
                        <input type="text"  name="name" class="form-control" placeholder="Enter Full Name"
                            value="{{ Auth::user()->name }}" />
                        @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email Address</label>
                        <input type="email" readonly name="email" class="form-control" placeholder="Enter Email Address"
                        value="{{ Auth::user()->email }}" />
                        @error('email') <small class="text-danger">{{ $message }}</small>@enderror
                        @if($userDetail)
                    </div>
                            <div class="col-md-6 mb-3">
                                <label>Phone Number</label>
                                <input type="number"  name="phone" value="{{ $userDetail->phone }}"  class="form-control" placeholder="Enter Phone Number" />
                                @error('phone') <small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                    <div class="col-md-6 mb-3">
                        <label>Pin-code (Zip-code)</label>
                        <input type="number" name="pincode" value="{{ $userDetail->pincode }}" class="form-control" placeholder="Enter Pin-code" />
                        @error('pincode') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Full Address</label>
                        <textarea name="address" value="" class="form-control" rows="2">{{ $userDetail->address }}</textarea>
                        @error('address') <small class="text-danger">{{ $message }}</small>@enderror

                    </div>
                    @else
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone Number</label>
                    <input type="number"  name="phone"  class="form-control" placeholder="Enter Phone Number" />
                    @error('phone') <small class="text-danger">{{ $message }}</small>@enderror
                </div>
        <div class="col-md-6 mb-3">
            <label>Pin-code (Zip-code)</label>
            <input type="number" name="pincode"  class="form-control" placeholder="Enter Pin-code" />
            @error('pincode') <small class="text-danger">{{ $message }}</small>@enderror

        </div>
        <div class="col-md-12 mb-3">
            <label>Full Address</label>
            <textarea name="address" class="form-control" rows="2"></textarea>
            @error('address') <small class="text-danger">{{ $message }}</small>@enderror

        </div>
        @endif
                    <button type="submit" >Update Profile</button>
                </form>
            </div>
    </div>
</div>
</div>
@endsection