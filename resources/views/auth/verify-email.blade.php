@extends('layouts.frontend.main')

@section('content')
@if(Auth::user()->email_verified_at==null)
<hr>
<div class="container bg-secondary text-white">
    <div class="row">
        <br>
        <br>
        <br>
        <br>
        <form action="{{ route('verification.send') }}" method="POST">
            <div class="mt-3">
                <h4>Email Varification Send </h4>
            </div>
            <div class="mt-2 ">

                @csrf
                <button type="submit" class="btn btn-primary text-white">Send Email To Varification</button>
                <br>

            </div>
        </form>
    </div>
</div>
@else
<div class="container-fluid">
    <div class="row">
        
            <div class="col-lg-2 my-3 bg-warning ">Congratulation!</div>
            <div class="col-lg-1 "></div>


            <div class="col-lg-3 my-3 fs-5  bg-info ">Your Email SuccessFully Verified</div>
            <div class="col-lg-3 "></div>
           
       
    </div>
</div>
@endif
<br>
<br>
<br>
<hr>
<hr>
@endsection