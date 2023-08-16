<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    {{-- modal  --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- bootstrap for css and js  --}}
     <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
     <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script> 
     <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


      <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css ')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('admin/css/modal.css') }}"> --}}
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png ')}}" />
   {{-- for summernote  --}}
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
   {{-- datatable link  --}}
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
   {{-- <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css"> --}}
   <style>
 div.dataTables_wrapper div.dataTables_paginate{
     padding: 0px !important;
     margin: 0px !important;
 }
 </style>

</head>
<body>
    <div class="container-scroller">
            @include('layouts.admin.navbar')
        
        <div class="container-fluid page-body-wrapper">
            @include('layouts.admin.sidebar')
            <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                        @include('sweetalert::alert')

                    </div>
            </div>
        </div>
    </div>

   {{-- <script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>  --}}
  <!-- endinject -->
  <!-- Plugin js for this page-->
   <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script> 
   <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script> 
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/js/template.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('admin/js/dashboard.js')}}"></script>
  <script src="{{asset('admin/js/data-table.js')}}"></script>
  <script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>
  <!-- End custom js for this page-->

  <script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  {{-- datatable js link  --}}
  {{-- link for checkeditor  --}}

  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>


  



  {{-- <script>
        $(document).ready(function() {
        $('#summernote').summernote({
            height: 130,
            width: 700,
            
        });
        $('.dropdown-toggle').dropdown();
        });
  </script> --}}
  <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function () {
    $('#table').DataTable();
});
</script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

</body>
</html>
