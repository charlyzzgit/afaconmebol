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
      height: 290px;
      border-radius: 10px;
      line-height: 1;
    }

    #names{
      font-size: 35px;
      line-height: 1;
    }
</style>
<div id="fondo" class="col-12 box-content p-1">
  <div class="header col-12 flex-col-start-center p-2 cristal">
    <div class="col-12 flex-row-between-start">
      <div class="col-5 flex-col-start-start">
        <b class="name-copa">sudamericana</b>
        <div class="flex-row-start-center">
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
        <div class="flex-row-start-center">
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
