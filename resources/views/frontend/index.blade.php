@extends('layouts.frontend.main')
@section('title','Home')
@section('content')
@if(session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif
<div id="carouselExampleDark" class="carousel carousel-primary slide">

    <div class="carousel-inner">
        @foreach ($slider as $key=> $sliderItem )

        <div class="carousel-item {{ $key== 0 ? 'active':'' }}">
            @if($sliderItem->hasMedia('category_image'))

            <img class="d-block " src="{{$sliderItem->getMedia('category_image')[0]->getFullUrl()}}"
                class="d-block w-100" style="width:100%;height:550px">
            @endif

            <div class="carousel-caption d-none d-md-block">
                <h6 class="text-white fs-6 fw-bold">{{ $sliderItem->name }}</h6>
                <p class="text-white fs-6 fw-lighter">{{ $sliderItem->description }}</p>
            </div>
        </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

@endsection
@section('text')

<div class="py-3 mb-3">
    <hr>
    <div class="card">
        <div class="card-body ">

            <h3 class="text-success text-center">
                Library ManageMent System
            </h3>
            <h4 class="text-center">welcome</h4>
            <p class="text-center text-uppercase">यस Library Management System आयोजनामा भइरहेको नव आगन्तुक
                विद्यार्थीलाई स्वागत तथा पुरस्कार वितरण समारोहका सभाध्यक्ष महोदय, प्रमुख अतिथि,
                कलेजका सेयरधनी तथा म्यानेजमेन्ट कमिटिका सरहरू, कलेज कोअर्डिनेटर सर, डिपार्टमेन्ट हेड सरहरू,
                विभिन्न विषयका प्राध्यापक तथा लेक्चरल सरहरू, प्रशासन शाखाका सरहरू, परीक्षा शाखाका सरहरू,
                लाइब्रेरी र रिसेप्सनका आदरणीय म्यामहरू, विभिन्न विद्यार्थी संगठनका मञ्चमा आसिन पदाधिकारी एवं प्रतिनिधि
                साथीहरू, मञ्चमा आसिन अन्य विशिष्ट अतिथिगणहरू, कलेजका सहयोगी दिदीहरू तथा उपस्थित सम्पूर्ण
                सज्जनवृन्द तथा साथीहरू !</p>
        </div>
        <h3 class="text-success text-center">
            Some Special Book
        </h3>
        <div class="card" id="special">
            <div class="row">
                @foreach ($book as $bookItem)
                <div class="col-md-3 ">
                    <div class="card-body" id="card">

                        <div class="col-md-6">

                            @if($bookItem->hasMedia('book_image'))

                            <small class="text-danger">Special</small>
                            @if ($bookItem->quantity>0)

                            <label class="label-stock bg-success">In Stock</label>
                            @else
                            <label class="label-stock bg-danger">Out Of Stock</label>
                            @endif
                            <a href="{{ route('product_detail',$bookItem->slug) }}">

                                <img src="{{$bookItem->getMedia('book_image')[0]->getFullUrl()}}"
                                    style="width:250px;height:300px">
                            </a>
                            <h3>{{ $bookItem->name }}</h3>

                            @else
                            <td>Not image Found of {{$bookItem->name}}</td>
                            @endif
                            <a href="{{ route('addToCart',$bookItem->id) }}" class="add-to-cart btn btn-primary mt-2"
                                type="submit" value="quantity">
                                <span><i class="fab fa-shopping-cart"></i> Add Cart</span> </a>
                            <p>{{ $bookItem->price }}</p>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endsection