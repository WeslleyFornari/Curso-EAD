<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/img/favicon/apple-icon-57x57.png')}}">
  <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/img/favicon/apple-icon-60x60.png')}}">
  <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/img/favicon/apple-icon-72x72.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/favicon/apple-icon-76x76.png')}}">
  <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/img/favicon/apple-icon-114x114.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/img/favicon/apple-icon-120x120.png')}}">
  <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/img/favicon/apple-icon-144x144.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/img/favicon/apple-icon-152x152.png')}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicon/apple-icon-180x180.png')}}">
  <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('assets/img/favicon/android-icon-192x192.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/img/favicon/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon/favicon-96x96.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/img/favicon/favicon-16x16.png')}}">
  <link rel="manifest" href="{{asset('assets/img/favicon/manifest.json')}}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{asset('assets/img/favicon/ms-icon-144x144.png')}}">
  <meta name="theme-color" content="#ffffff">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/nucleo-icons.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/40b7169917.js" crossorigin="anonymous"></script>
  <link href="{{asset('assets/nucleo-svg.css')}}" rel="stylesheet" />
 

  <link href="{{asset('build/assets/app-c59b5838.css')}}" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-100">

<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      
    </div>
  </div>

  <main class="main-content  mt-0">

    <section class="min-vh-100">
      <div class="page-header min-vh-100">
        <div class="container min-vh-100">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
            
                <div class="card-body">
                    @yield('content')
                 
                </div>
               
              </div>
            </div>
      
          </div>
        </div>
      </div>
    </section>
  </main>
  
  <!--   Core JS Files   -->
  <script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('/assets/js/plugins/chartjs.min.js')}}"></script>
    <script src="{{asset('/build/assets/app-4a1a0c12.js')}}"></script>

 
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('assets/js/soft-ui-dashboard.min.js?v=1.0.7')}}"></script>
  <script src="{{asset('build/assets/app-a83ed21d.js')}}"></script>
</body>

</html>