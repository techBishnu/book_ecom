@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
            <div class="container  col-md-6">
        <h3>Book Record
            <a class="float-end btn btn-danger" href="{{route('record')}}">Back</a></h3>
            </div>
        <div class="container col-md-6">
        <form action="{{route('record.update',$record->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('put')
            <div class="mb-3 col-md-6 form-control">
                    <select name="book_id" >
                        @foreach ($book as $bookItem )
                        <option value="{{ $bookItem->id }}">{{ $bookItem->name }}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-md-6 form-control">
                    <select name="user_id" >
                        @foreach ($user as $userItem )
                        <option value="{{ $userItem->id }}">{{ $userItem->name }}</option>
                            
                        @endforeach
                    </select>
                </div>




                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit">Update Record</button>
                </div>
        </form>
        </div>
    </div>
</div>

@endsection
