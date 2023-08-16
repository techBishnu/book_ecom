@extends('layouts.app')
@section('content')

<div class="row">
    <div class="pl-5">
        <div class="col-md-10 ">
            <div class="container">
                <div class="container py-2 col-md-8">
            <h3 class="group-control">Book Record</h3>
                <a class="float-end btn btn-danger group-control " href="{{route('record')}}">Back</a>
                </div>
            </div>
            <div class="container form-group">
            <form action="{{route('record.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="container col-md-8">
                    <div class="col-md-8">
                  
                            <div class="col-md-8 form-control">
                                <div class="mb-2">
                                    <select name="book_id" >
                                        <option value="">Select the Book</option>
                                        @foreach ($book as $bookItem )
                                        <option value="{{ $bookItem->id }}">{{ $bookItem->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                </div>
                               
                            </div>
                            <br>
                                <div class="col-md-8 form-control">
                                        <div class="col-md-12">
                                    <select name="user_id" >
                                            <option value="">Select the User</option>

                                        @foreach ($user as $userItem )
                                        <option value="{{ $userItem->id }}">{{ $userItem->name }}</option>
                                            
                                        @endforeach
                                    </select>
                                        </div>
                                </div>
                   
                                <br>

                    <div class="col-md-6">
                        <button class="btn btn-primary" type="submit">Save Record</button>
                    </div>
                          
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
