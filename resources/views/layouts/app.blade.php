<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- Title -->
		<title> SIPSU - Sistem Informasi Prasarana, Sarana, dan Utilitas </title>

		<!-- Bootstrap css -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" />

    <!-- Icons css -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

    <!--  Owl-carousel css-->
    <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />

    <!--  Right-sidemenu css -->
    <link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

    
    
    <!-- style css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style-dark.css')}}" rel="stylesheet">

    <!-- Internal Data table css -->
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap4.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    
     
		<!--- Color css-->
		<link id="theme" href="{{asset('assets/css/colors/color4.css')}}" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

		   
        <!--LEAFLET-->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>
<!--
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>-->
<script src="{{asset('leaflet/leaflet-src.js')}}" type="text/javascript"></script>  


	  <link rel="stylesheet" href="{{asset('leaflet/plugins/leaflet.wmslegend.css')}}" type="text/css">
<script src="{{asset('leaflet/plugins/leaflet.wmslegend.js')}}" type="text/javascript"></script>  

  <link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.Pan.css')}}" type="text/css">
<script src="{{asset('leaflet/plugins/L.Control.Pan.js')}}" type="text/javascript"></script>  

  <link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.Zoomslider.css')}}" type="text/css">
<script src="{{asset('leaflet/plugins/L.Control.Zoomslider.js')}}" type="text/javascript"></script> 

  <link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.BetterScale.css')}}" type="text/css">
<script src="{{asset('leaflet/plugins/L.Control.BetterScale.js')}}" type="text/javascript"></script>

  <link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.MousePosition.css')}}" type="text/css">
<script src="{{asset('leaflet/plugins/L.Control.MousePosition.js')}}" type="text/javascript"></script>  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.3.2/leaflet.draw.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.3.2/leaflet.draw.js"></script>    
  <link rel="stylesheet" href="{{asset('leaflet/plugins/leaflet.measurecontrol.css')}}" type="text/css">
  <script src="{{asset('leaflet/plugins/leaflet.measurecontrol.js')}}" type="text/javascript"></script>

  <link rel="stylesheet" href="{{asset('leaflet/plugins/easy-button.css')}}" type="text/css">
  <script src="{{asset('leaflet/plugins/easy-button.js')}}" type="text/javascript"></script>

  <link rel="stylesheet" href="{{asset('leaflet/plugins/L.Control.Sidebar.css')}}" type="text/css">
  <script src="{{asset('leaflet/plugins/L.Control.Sidebar.js')}}" type="text/javascript"></script>

  <script src="{{asset('leaflet/plugins/leaflet.ajax.js')}}" type="text/javascript"></script>
  <link rel="stylesheet" href="{{asset('leaflet/plugins/leaflet-search.css')}}" type="text/css">

  <script src="{{asset('leaflet/plugins/leaflet-search.js')}}" type="text/javascript"></script>

  <script src="{{asset('leaflet/plugins/wicket.js')}}" type="text/javascript"></script>

  <script src="{{asset('leaflet/plugins/wicket-leaflet.js')}}" type="text/javascript"></script>
   

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-psu shadow-sm">
            <div class="container bg-psu">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('images/logo.png')}}"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="background-color: white">
            @yield('content')
        </main>
    </div>
</body>
</html>


	<!-- JQuery min js -->
    <script src="{{asset('assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>

    <!-- Bootstrap4 js-->
    <script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!--Internal  Chart.bundle js -->
    <script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>

    <!-- Ionicons js -->
    <script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>

    <!-- Moment js -->
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

    <!--Internal Sparkline js -->
    <script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Moment js -->
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>

    <!--Internal  Flot js-->
    <script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>

    

    <!-- Chart-circle js -->
    <script src="{{asset('assets/js/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/js/chart-circle.js')}}"></script>


    <!-- Suggestion js-->
    <!--<script src="{{asset('assets/plugins/suggestion/jquery.input-dropdown.js')}}"></script>-->
    <!--<script src="{{asset('assets/js/search.js')}}"></script>-->

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

    <!-- Eva-icons js -->
    <script src="{{asset('assets/js/eva-icons.min.js')}}"></script>

    <!-- right-sidebar js -->
    <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>
    <script src="{{asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{asset('assets/js/sticky.js')}}"></script>
    <script src="{{asset('assets/js/modal-popup.js')}}"></script>

    <!-- Left-menu js-->
    <script src="{{asset('assets/plugins/side-menu/sidemenu.js')}}"></script>


    <!-- custom js -->
    <script src="{{asset('assets/js/custom.js')}}"></script>


 <!-- Internal Data tables -->
 <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
 <script src="{{asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>


<Script>
    $( document ).ready(function() {
        @yield("javasc")
    });
</script>
