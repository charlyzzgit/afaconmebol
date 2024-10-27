<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTBOL - ADMIN</title>
  
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

  <link rel="stylesheet" href="{{ asset('plugins/Form/form.css')}}">

  @include('partials.flex')
  
  <style>
    .sidebar-dark-primary{
      background: rgb(11,52,72);
    }
    .sub-menu{
      display: none;
      list-style:  none;
    }

   
  </style>
  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
  <div id="preload">

    <div class="custom-inner-loading d-flex flex-row justify-content-center align-items-center">
      
      <div class="custom-preloader d-flex flex-row justify-content-center align-items-center">
        <div class="custom-preloader-inner"></div>
        <!-- <img src="{{ asset('images/dragon.png') }}" class="custom-preoader"> -->
      </div>
    </div>
  </div>
  @if(Auth::user())
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      
      <li class="nav-item">
        <a class="nav-link" data-slide="false" href="#" role="button">
          <i class="fa fa-user"></i>
          <span class="ml-1">{{ Auth::user()->name ? Auth::user()->name : 'Usuario' }}</span>
        </a>
      </li>
      <li class="nav-item">
        <a id="logout" class="nav-link"  data-slide="false" href="#" role="button">
          <i class="fa fa-sign-out-alt"></i>
          <span class="ml-1">Cerrar Sesión</span>
        </a>
      </li>
    </ul>
  </nav>


  <!-- /.navbar fin nav -->
 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary bg-dark elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('images/logo.png') }}" alt="logo" class="brand-image -img-circle -elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FUTBOL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->

      <nav class="mt-2">
        <ul id="menu-left" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item" data-page="home">
                <a href="{{ route('home') }}" class="nav-link">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Inicio</p>
                </a>
              </li>
              <!-- <li class="nav-item nav-menu" data-state="close">
                <a href="#" class="nav-link">
                  <i class="fa fa-wrench nav-icon"></i>
                  <p>Configuracion</p>
                </a>
                <menu class="sub-menu">
                  <li class="submenu-item">
                    <a href="" class="nav-link">
                      <i class="fas fa-sync-alt"></i>
                      <p>Versión</p>
                    </a>
                  </li>
                  <li class="submenu-item">
                    <a href="" class="nav-link">
                      <i class="fa fa-home"></i>
                      <p>Pantalla Principal</p>
                    </a>
                  </li>
                </menu>
              </li> -->
              <li class="nav-item" data-page="cartas">
               <a href="{{ route('admin.ligas') }}" class="nav-link">
                  <i class="fas fa-shield-alt ml-2 mr-2"></i>
                  <p>Ligas</p>
                </a>
              </li>
              <li class="nav-item" data-page="jugadores">
                <a href="{{ route('admin.colores') }}" class="nav-link">
                  <i class="fas fa-palette nav-icon"></i>
                  <p>Colores</p>
                </a>
              </li>
              <li class="nav-item" data-page="backgrounds">
                <a href="" class="nav-link">
                  <i class="fas fa-image nav-icon"></i>
                  <p>Otro</p>
                </a>
              </li>
             
            </ul>
          </li>
          
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
@endif
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper @if(!Auth::user()) ml-0 @endif">
    <!-- Content Header (Page header) -->
     @if(Auth::user())
    <div class="content-header">
      <div class="row mb-2 pl-3 pr-3">
        <div class="col-sm-9 flex-row-start-center">
          
          @yield('title')
        </div>
        <div class="col-sm-3 flex-row-end-center">
          <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}"></a></li>
            
            
          </ol> -->
          @yield('right_menu')
        </div>
      </div>
    </div>
    @endif
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content @if(!Auth::user()) p-0 @endif"">
      <div class="container-fluid">
         @yield('content')
      </div><!-- /.container-fluid -->
    </div> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@if(Auth::user())
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>{{ __('profile.language') }}</h5>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="idioma" id="es" value="es" @if(Auth::user()->lenguaje == 'es') checked @endif
          <label class="form-check-label" for="es">{{ __('home.global.es') }}</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="idioma" id="en" value="en" @if(Auth::user()->lenguaje == 'en') checked @endif
          <label class="form-check-label" for="en">{{ __('home.global.en') }}</label>
        </div>
      </div>  
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
   </footer>
@endif

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="{{ asset('/plugins/bootstrap-table/bootstrap-table.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap-table/bootstrap-table-filter-control-min.js') }}"></script>
{{--@if(Auth::user())
  @if(Auth::user()->lenguaje == 'es')
    <script src="{{ asset('/plugins/bootstrap-table/locale/bootstrap-table-es-AR.js') }}"></script>
  @endif
@else --}}
<script src="{{ asset('/plugins/bootstrap-table/locale/bootstrap-table-es-AR.js') }}"></script>
{{--@endif--}}
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

<script src="{{ asset('plugins/Form/form.js').refreshCache() }}"></script>

@include('partials.scripts')
@yield('js')
<script>

  var DEFAULT_SRC = "{{ asset('resources/default') }}/",
      ASSET = "{{ asset('resources')}}/"
  
  $(function(){
    {{--$('#logout').click(function(evt){
        evt.preventDefault()
        sendRequest("{{ route('user.logout') }}", { _token: '{{ csrf_token() }}'}, function(data){
           if(data.result == 'OK'){
             redirect("{{ route('home') }}")
           }else{
             Swal.fire('{{ __('auth.logout') }}', data.message, 'error')
           }
        })
    })--}}

    $('.nav .nav-item').each(function(){
      $(this).find('.nav-link').removeClass('active')
      var page = $(this).data('page')
      var urlName = '{{ Route::current()->getName() }}'
      
      if(urlName == page){
        $(this).find('.nav-link').addClass('active')
      }
    })

    

    $('.nav-menu').click(function(evt){
      var state = $(this).data('state')
      if(state == 'close'){
        $(this).data('state', 'open')
        $(this).find('.sub-menu').slideDown(150)
      }else{
        $(this).data('state', 'close')
        $(this).find('.sub-menu').slideUp(150)
      }
    })

    

  })
</script> 

</body>
</html>
