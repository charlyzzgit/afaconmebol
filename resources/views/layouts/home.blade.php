<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="keywords jijij">
    <meta name="description" content="Descripcion"/>
    <meta name="viewport" content="width=device-width, initial-scale-1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE-edge, chrome=1"/>
    <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css').refreshCache() }}">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">

  
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-table/bootstrap-table.css')}} ">

  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') }}">
  
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/estilos.css').refreshCache() }}">

  <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css').refreshCache() }}">

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

        @php
          $fondo = getRandomFondo();
         
        @endphp
        
        header{
            height: 56px;
            background: black
        }

        nav{
            background: darkblue
        }

        .uppercase{
            text-transform: uppercase;
        }

       

        #content{
            height: 100vh;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url("{{ asset('resources/fondos/'.$fondo) }}");
            overflow: hidden;
        }

        .box-content{
          height: 100%;
        }

        .title-bar{
          height: 30px;
          border-bottom: solid thin white;
          background: rgba(255,255,255,.5);
          font-size: 18px;
          border-radius: 3px;
        }

        .list{
          list-style: none;
          height: calc(100% - 40px);
          overflow-y: auto;
          overflow-x: hidden;
          border-radius: 10px;
        }
        
        footer{
            height: 56px;
            background: hsla(0, 0%, 95%, 1);

            background: linear-gradient(180deg, hsla(0, 0%, 95%, 1) 0%, hsla(0, 0%, 100%, 1) 7%);

            background: -moz-linear-gradient(180deg, hsla(0, 0%, 95%, 1) 0%, hsla(0, 0%, 100%, 1) 7%);

            background: -webkit-linear-gradient(180deg, hsla(0, 0%, 95%, 1) 0%, hsla(0, 0%, 100%, 1) 7%);

            filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#F2F2F2", endColorstr="#FFFFFF", GradientType=1 );
        }

        #reload{
          position: fixed;
          top:0;
          right:0;
          z-index: 1000000;
          width:50px;
          height: 50px;
          cursor: pointer;
          background: transparent;
        }
    </style>
    @yield('css')
</head>

<body>
    <div id="preload">

    <div class="custom-inner-loading flex-row-center-center">
        <img src="{{ asset('resources/default/logo.png') }}" class="preloader-ball">
      <!-- <div class="custom-preloader d-flex flex-row justify-content-center align-items-center">
        <div class="custom-preloader-inner"></div> 
         <img src="{{ asset('images/dragon.png') }}" class="custom-preoader"> 
      </div> -->
    </div>
  </div>
  
  <div id="reload"></div>
    

    <div id="contenedor" class="container-fluid flex-col-start-center p-0">
        <!-- <header class="col-12 flex-row-start-center pl-5 pr-5 pt-2 pb-2 master-font">
           
                <img src="{{ asset('images/logo.png') }}" alt="logo" height="80%">
                <div class="col-10">
                  <h1 class="text-white">colectivos</h1>
                </div>
                @yield('header')
        </header>
         -->
        
       
        

        <section id="content"  class="col-12 flex-col-start-center bg-white">
            
           
            @yield('content')
        </section>
        
        <footer class="col-12 flex-row-center-center p-1"></footer>
        
      
    </div>
    <!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<!-- <script src="{{ asset('dist/js/adminlte.min.js') }}"></script> -->

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
<script src="{{ asset('plugins/Libraries/jquery-storage/jquery-storage.min.js') }}"></script>



<script src="{{ asset('plugins/Form/form.js').refreshCache() }}"></script>

@include('partials.scripts', ['colors' => getColors()])
@yield('js')
    
    
    <script>
    
    var ASSET = "{{ asset('resources') }}/",
        MAIN = {!! getData() !!},
        footer = $('footer')


    


    log('main', [MAIN])
    $(function(){
        $('footer').hide()
        $('.logo').click(function(){
            
            
        })
        $('.menu-item').click(function(){
            var page = $(this).data('page'),
                url = ''
            
            
            
        })

        $('#reload').click(function(){
          
          $('#content').empty()
          $('#content').load(LAST_URL)
        })

        setGradient($('footer'), 180, ['gris', 'blanco', 'blanco', 'gris'], [0, 20, 80, 100])


       nextPage("{{ route('home') }}", ['home','inicio'])
    })
    
    </script>
    
</body> 
</html>