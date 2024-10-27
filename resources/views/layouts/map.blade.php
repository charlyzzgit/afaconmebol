<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SUBTE Z - ADMIN</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

  
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-table/bootstrap-table.css')}} ">

  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/estilos.css').refreshCache() }}">



  <!-- ****************************libraries************************************** -->
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/json-viewer/jquery.json-viewer.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/colorpicker/bootstrap-colorpicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/datepicker/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/datetimepicker/bootstrap-datetimepicker.css').refreshCache() }}">
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/sweetAlert/sweetalert.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/Switch/bootstrap-switch.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Libraries/iCheck/minimal/_all.css?0.0.0.1') }}">
  <link rel="stylesheet" href="{{ asset('plugins/Form/form.css')}}">

  @include('partials.flex')
  
  <style>
    

   
  </style>
  @yield('css')
</head>
<body>
  <div id="preload">

    <div class="custom-inner-loading d-flex flex-row justify-content-center align-items-center">
      
      <div class="custom-preloader d-flex flex-row justify-content-center align-items-center">
        <div class="custom-preloader-inner"></div>
        <!-- <img src="{{ asset('images/dragon.png') }}" class="custom-preoader"> -->
      </div>
    </div>
  </div>
  
<div class="wrapper">

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ml-0">
    
      @if(Auth::user())
        <div class="content p-0">
          <div class="container-fluid">
             @yield('content')
          </div><!-- /.container-fluid -->
        </div> 
        <!-- /.content -->
      @endif
  </div>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- <script src="{{ asset('js/app.js') }}"></script> -->

<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ asset('/plugins/bootstrap-table/bootstrap-table.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap-table/bootstrap-table-filter-control-min.js') }}"></script>

<script src="{{ asset('/plugins/bootstrap-table/locale/bootstrap-table-es-AR.js') }}"></script>



<script src="{{ asset('/plugins/bootstrap-table/bootstrap-table-export.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/JQueryNumeric/jquery.numeric.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>


<!-- ******************************************libraries********************************* -->
<script src="{{ asset('plugins/Libraries/json-viewer/jquery.json-viewer.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.phone.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.regex.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.numeric.extensions.js') }}"></script>
<script src="{{ asset('plugins/Libraries/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('plugins/Libraries/moment/moment.js') }}"></script>
<script src="{{ asset('plugins/Libraries/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/Libraries/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('plugins/Libraries/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/Libraries/select2/select2.min.js') }}"></script>
<script src="{{ asset('plugins/Libraries/sweetAlert/sweetalert.min.js') }}"></script>
<script src="{{ asset('plugins/Libraries/Switch/bootstrap-switch.js') }}"></script>
<script src="{{ asset('plugins/Libraries/Modal/modal.js').refreshCache() }}"></script>
<script src="{{ asset('plugins/Libraries/qr-code/qr-code.js?0.0.0.1') }}"></script>
<script src="{{ asset('plugins/Libraries/qr-code/qr.js?0.0.0.1') }}"></script>
<script src="{{ asset('plugins/Libraries/iCheck/icheck.min.js?0.0.0.1') }}"></script>
<script src="{{ asset('plugins/Form/form.js').refreshCache() }}"></script>

@include('partials.scripts')
@yield('js')
<script>
  
  $(function(){
    

    

  })
</script> 

</body>
</html>
