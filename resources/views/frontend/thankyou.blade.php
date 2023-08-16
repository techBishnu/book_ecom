@extends('layouts.frontend.main')
@section('title','Thank You')

@section('content')

<div class="row">
    <div class="py-5">
            <div class="col-md-12">
                @if(session('message'))
                <h5 class="alert alert-success">{{session('message')}}</h5>
                @endif
                    <div class="container py-3 col-md-8">
                        <h2 class="text-success">Thank you For Purchase Our Book </h2>
                        <h2 class="text-success">Best Wishes For Your Comming Days! </h2>
                            <hr>
                            <h2 class="alert alert-important">Continue Your Shopping <a class="btn btn-primary btn-sm" href="{{ route('books') }}">Shop Now</a> With Us</h2>

                    </div>
            </div>
    </div>
@endsection
                    