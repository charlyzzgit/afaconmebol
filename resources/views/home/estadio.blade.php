<style>
    #fondo{
      background-repeat: no-repeat;
      background-position: center bottom;
      background-size: cover;
      background-image: url("{{ asset('resources/estadios/grande_fine_night.png') }}");
    }

    #cesped{
      position: absolute;
      left: 0;
      bottom: 0;
      z-index: 100;
      height: 340px;
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      background-image: url("{{ asset('resources/cesped/rayada.png') }}");
    }

    .jugador{
      width: 100px;
      height: 300px;
      position: absolute;
      bottom: 200px;
      z-index: 100000;
      object-fit: cover;
    }

    #local{
      left: 50px;
    }

    #visitante{
      right: 50px;
    }

    #balon{
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 210px;
      z-index: 100000;
      width: 50px;
    }

    .header{
      height: 280px;
      border-radius: 10px;
      line-height: 1;
    }

    #names{
      font-size: 30px;
      line-height: 1;
    }

    .name-copa, .anio{
      font-size: 25px;
    }

    .gl, .gv{
      font-size: 50px;
    }

    .pa, .pb{
      font-size: 35px;
    }

    #reloj{
      border-radius: 5px;
      overflow: hidden;
    }

    .box-time{
      background: gray;
    }
</style>
<div id="fondo" class="col-12 box-content p-1">
  <div class="header col-12 flex-col-start-center p-2 cristal">
    <div class="col-12 flex-row-between-start">
      <div class="col-5 flex-col-start-start">
        <b class="name-copa">sudamericana</b>
        <div class="flex-row-start-center mt-1">
          <img src="{{ asset('resources/default/estadio.png') }}" height="50">
          <div class="flex-col-start-start ml-2">
            <b>estadio</b>
            <b class="name-estadio">independiente medellin</b>
          </div>
        </div>
      </div>
      <div class="col-2 flex-col-center-center">
        <img src="{{ asset('resources/default/libertadores.png') }}" height="100">
      </div>
      <div class="col-5 flex-col-start-end">
        <b class="anio">2000</b>
        <div class="flex-row-start-center mt-1">
          <div class="flex-col-start-start mr-2">
            <b>miercoles</b>
            <div class="flex-row-start-center">
              <b>21 hs</b>
              <img src="{{ asset('resources/default/night_fine.png') }}" height="30">
            </div>
            
          </div>
          <img src="{{ asset('resources/default/flag.png') }}" height="40">
        </div>
      </div>
    </div>
    <div id="names" class="col-12 flex-row-between-start">
      <b class="name-loc">independiente medellin</b>
      <b class="name-vis text-right">independiente medellin</b>
    </div>
    <div class="col-12 flex-row-between-end">
      <div class="col-3 flex-row-start-center">
        <img class="mb-2" src="{{ asset('resources/default/escudo.png') }}" height="80">
      </div>
      <div class="col-6 flex-row-between-start">
        <div class="col-3 flex-row-start-center">
          <b class="gl mt-5">88</b>
        </div>
        <div class="col-6 flex-col-center-center">
          <div id="reloj" class="col-9 flex-col-start-center">
            <div class="box-time col-12 flex-row-center-center p-1">
              <small class="time">2º tiempo</small>
            </div>
            <div class="box-cronometro col-12 flex-row-center-center p-2 cristal"> 
               <b class="cronometro">45</b>
            </div>
          </div>
          <div class="col-12 flex-row-between-center">
            <b class="pa mt-1">(5)</b>
            <b class="pb mt-1">(4)</b>
          </div>
        </div>
        <div class="col-3 flex-row-end-center">
          <b class="gv mt-5">88</b>
        </div>
      </div>
      <div class="col-3 flex-row-end-center">
        <img class="mb-2" src="{{ asset('resources/default/escudo.png') }}" height="80">
      </div>
    </div>
  </div>
  <div id="cesped" class="col-12"></div>
  <img id="local" class="jugador" src="{{ asset('resources/default/jugador.png') }}">
  <img id="balon" src="{{ asset('resources/default/logo.png') }}">
  <img id="visitante" class="jugador" src="{{ asset('resources/default/jugador.png') }}">
</div>


<script>
   $(function(){
    preload()
   })
</script>
