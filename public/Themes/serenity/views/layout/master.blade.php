<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  {!! SEO::generate() !!}

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index,follow"/>
  <meta name="googlebot" content="index,follow"/>
  <meta name="msnbot" content="index,follow" />
  <meta name="identifier-url" content="{{setting('web_url')}}" />
  <meta name="author" content="KeetaCMS"/>
  <meta name="copyright" content="KeetaCMS"/>

  <!-- Favicons -->
  <link href="{{ asset('backend/img/'.setting('web_favicon')) }}" rel="icon">
  <link href="{{ asset('backend/img/'.setting('web_favicon')) }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{themes('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{themes('vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{themes('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{themes('vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{themes('vendor/line-awesome/css/line-awesome.min.css')}}" rel="stylesheet">
  <link href="{{themes('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{themes('vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{themes('css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Serenity - v2.0.0
  * Template URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('partial._header')

  @if(Request::segment(1) == '')
  <section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>Welcome to {{setting('app_name')}}</h1>
      <h2>KeetaCMS is a simple Content Management System (CMS) <br> that can be used to create news websites</h2>
      <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
    </div>
  </section>
  @endif

  <main id="main">
    @if(Request::segment(1) == 'category' || Request::segment(1) == 'search' || Request::segment(1) == 'post' || Request::segment(1) == 'page')
        @include('partial._breadcrumbs')
    @endif
    <section id="blog" class="blog">
      <div class="container" style="background: white;">

        @yield('content')

      </div>
    </section>

  </main>

  @include('partial._footer')

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{themes('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{themes('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{themes('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{themes('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{themes('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{themes('vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{themes('vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{themes('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{themes('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{themes('vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{themes('js/main.js')}}"></script>

</body>

</html>