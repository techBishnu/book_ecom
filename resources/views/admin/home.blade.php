@extends('layouts.admin')

@section('content')
<div class="container">
    {{-- <div class="col-md-12 grid-margin"> --}}

    @if (Auth::id())

    <h2 class="card-header"> <strong class="text-success"> Hello </strong>{{Auth::user()->name}}! </h2>
    @endif
    <div class="card-header text-primary">{{ __('Dashboard') }}</div>
    <div class="row"
    @can('view.category')>
        <div class="col-md-3">
            <div class="card card-body bg-warning text-white mb-3 ">

                <label for="">Book Category</label>
                <h1>{{ $totalBookCategory }}</h1>
                <a class="text-white btn" href="{{ route('category') }}">View</a>
            </div>
        </div>
        @endcan
    @can('view.book')
        <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3 ">

                <label for="">Book</label>
                <h1>{{ $totalBook }}</h1>
                <a class="text-white btn" href="{{ route('book') }}">View</a>
            </div>
        </div>
        @endcan
        @can('view.book')
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3 ">

                <label for="">Customers</label>
                <h1>{{ $user-$admin}}</h1>
                <a class="text-white btn" href="{{ route('book') }}">View</a>
            </div>
        </div>
        @endcan
        @can('view.order')
        <div class="col-md-3">
            <div class="card card-body bg-success text-white mb-3 ">
                <label for="">Order</label>
                <h1>{{ $totalOrder }}</h1>
                <a class="text-white btn" href="{{ route('orderList') }}">View</a>
            </div>
        </div>
        @endcan
        @can('view.order')
        <div class="col-md-3">
            <div class="card card-body bg-secondary text-white mb-3 ">
                <label for="">Today Order</label>
                <h1>{{ $totalDailyOrder }}</h1>
                <a class="text-white btn" href="{{ route('orderList') }}">View</a>
            </div>
        </div>
        @endcan
        @can('view.order')
        <div class="col-md-3">
            <div class="card card-body bg-dark text-white mb-3 ">
                <label for="">Monthly Order</label>
                <h1>{{ $totalMonthOrder }}</h1>
                <a class="text-white btn" href="{{ route('orderList') }}">View</a>
            </div>
        </div>
        @endcan
        @can('view.order')
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3 ">
                <label for="">Yearly Order</label>
                <h1>{{ $totalYEAROrder }}</h1>
                <a class="text-white btn" href="{{ route('orderList') }}">View</a>
            </div>
        </div>
        @endcan
        @can('view.order')
        <div class="col-md-3">
            <div class="card card-body bg-primary text-white mb-3 ">
                <label for="">Completed Order</label>
                <h1>{{ $completeOrder }}</h1>
                <a class="text-white btn" href="{{ route('orderList') }}">View</a>
            </div>
        </div>
        @endcan

    </div>
</div>

@endsection