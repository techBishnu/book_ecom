@extends('layouts.frontend.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        
        <div class="col-md-8">
            <div class="card">
                    <div class="text-primary mb-2"> 
                            <div class="text-uppercase py-3">
                                <h1 class="text-dark">Welcome to <strong> {{ Auth::user()->name }}</strong></h1>
                            </div>
                        </div>
                <hr>
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>

            <hr>
            <hr>
            <div class="container">
                <div class="text-success  text-uppercase">We Believe  You <strong>Enjoy</strong>  Our Library</div>
                <br>
                <h5 class="text-success"> <a class="btn btn-primary" href="{{ route('books') }}">Shop Now</a> </h5>
            <hr>
            <hr>

            </div>
        </div>
    </div>
</div>
@endsection