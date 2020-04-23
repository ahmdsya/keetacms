<!DOCTYPE html>
<html>
<head>
  <!-- Header -->
  @include('layouts._header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Navbar -->
    @include('layouts._navbar')
  </header>

  <!-- Sidebar -->
  @include('layouts._sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

      <!-- Konten -->
      @yield('konten')

  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  @include('layouts._footer')

</body>
</html>
