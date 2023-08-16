<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- modal  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>

    {{-- bootstrap for css and js  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>
   
        {{-- for icon  --}}
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

     {{-- for ajax  --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


        <link rel="stylesheet" href="{{ asset('css/index.css') }}">


     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      {{-- for summernote  --}}

      {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
       --}}
</head>
<body>
    @include('layouts.frontend.navbar')
    @yield('content')
    @include('sweetalert::alert')

    <div class="whatsapp float-end">
        <a href=" https://wa.me/+977986858585?text=I'm%20interested%20to%20chat%20with%20you!" target="_blank">
        <img src="{{ asset('admin/images/whatsapp_icon.png') }}" alt="" srcset="" style="height:50px;width:50px">
        </a>
        

    </div>
    @yield('text')
        <br>
    
        <hr>
    @include('layouts.frontend.footer')
    <script>
          var availableTags = [];
          $.ajax({
              method:"GET",
              url: "/book_list",
              success:function(data)
                 {
                    startAutocomplete(data)   
                 }
          })
          function startAutocomplete(availableTags){

              $( "#search" ).autocomplete({
                source: availableTags
              });
          }
        </script>
</body>
</html>