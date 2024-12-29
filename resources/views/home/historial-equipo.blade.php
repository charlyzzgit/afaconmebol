<style>
    #equipo{
      height: 50px;
      font-size: 30px;
      border-radius: 10px;
      display: none !important;
    }

    .bar-title{
      font-size: 17px;
      font-weight: bold;
    }

    #box-progress{
      
    }

    
    .fase{
      line-height: 1.15;
    }

    #list-copas{
      height: 190px;
    }

    .liga{
      width: 20%
    }

    .anio{
      border-right: solid thin white;
      width: 100px
    }

    .fase-anio{
      width: 20%
    }

    #anios{
       width: 80%;
      overflow-y: hidden;
      overflow-x: auto;
    }

    .section{
      border-radius: 5px;
      overflow: hidden;
    }

    #btn-all .btn-inner{
      border-radius: 5px 0 0 5px;
    }

    #btn-ganadas .btn-inner{
      border-radius: 0 5px 5px 0;
    }

    #box-logro div{
      border-radius: 50px;
    }

    .liga img{
      border-radius: 5px;
    }

    .fase-anio{
      border-radius: 5px 0 0 5px;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">ligas</b>
    </div>
    <b class="subtitle">fases</b>
  </div>
  <!-- <div id="equipo" class="col-12 flex-row-between-center cristal p-1 mt-2">
    <img src="{{ asset('resources/default/escudo.png') }}" height="90%">
    <b class="name">independiente medellin</b>
    <img src="{{ asset('resources/default/jugador.png') }}" height="90%">
  </div> -->
  <div class="section col-12 flex-col-start-center mt-1 cristal">
    <div class="bar-title col-12 flex-row-center-center p-1">todas las copas</div>
    <ul id="list-copas" class="col-12 flex-col-start-center m-0 p-1">
      @for($i = 0; $i < 5; $i++)
      <li class="copa col-12 flex-row-start-center p-1 mb-1 cristal">
        <b class="anio-copa">2000</b>
        <b class="ml-2">eliminado en dieciseisavos de final</b>
      </li>
      @endfor
    </ul>
    <div class="col-12 flex-row-between-center mt-0">
      <div id="btn-all" class="btn-copa col-4 p-1">
        <div class="btn-inner bar-title col-12 flex-row-center-center p-1 cristal">
          <img src="{{ asset('resources/default/logo.png') }}" height="20">
          <b class="ml-1">todas</b>
        </div>
      </div>
      <div id="btn-jugadas" class="btn-copa col-4 p-1">
        <div class="btn-inner bar-title col-12 flex-row-center-center p-1 cristal">
          <img src="{{ asset('resources/default/jugador.png') }}" height="20">
          <b class="ml-1">jugadas</b>
        </div>
      </div>
      <div id="btn-ganadas" class="btn-copa col-4 p-1">
        <div class="btn-inner bar-title col-12 flex-row-center-center p-1 cristal">
          <img src="{{ asset('resources/default/libertadores.png') }}" height="20">
          <b class="ml-1">ganadas</b>
        </div>
      </div>
    </div>
  </div>
  <div id="box-logro" class="section col-12 flex-row-center-center mt-1 p-1 cristal">
    <div class="flex-row-start-center bar-title pl-3 pr-3 pt-1 pb-1">
      <b>maximo logro:</b>
      <b id="logro" class="ml-1">eliminado en dieciseisavos de final</b>
    </div>
  </div>
  <div id="vs" class="section col-12 flex-col-start-center mt-1 cristal">
    <div class="col-12 flex-row-center-center bar-title">enfrentamientos</div>
    <ul id="ligas" class="col-12 flex-row-between-start flex-wrap m-0 p-1">
      @foreach($ligas as $liga)
      <li class="liga flex-row-center-center p-1">
        <img src="{{ asset('resources').'/'.$liga->bandera }}" width="100%">
      </li>
      @endforeach
    </ul>
  </div>
  <div id="box-progress" class="section col-12 flex-col-start-center mt-1 cristal">
    <div class="col-12 flex-row-center-center bar-title">progreso</div>
    <div class="col-12 flex-row-between-center p-1">
      <div class="fase-anio flex-col-end-center cristal h-100 p-1">
        <div class="col-12 fase flex-row-center-center">c</div>
        <div class="col-12 fase flex-row-center-center">final</div>
        <div class="col-12 fase flex-row-center-center">semis</div>
        <div class="col-12 fase flex-row-center-center">cuartos</div>
        <div class="col-12 fase flex-row-center-center">dieciseisavos</div>
        <div class="col-12 fase flex-row-center-center">3ª fase</div>
        <div class="col-12 fase flex-row-center-center">2ª fase</div>
        <div class="col-12 fase flex-row-center-center">1ª fase</div>
        <div class="col-12 fase flex-row-center-center">preliminar</div>
        <div class="col-12 fase flex-row-center-center">fase / año</div>
      </div>
      <div id="anios" class="flex-row-start-center">
        @for($i = 0; $i < 10; $i++)
          <div class="flex-col-end-center h-100 anio">
            <div class="col-12 fase flex-row-center-center">c</div>
            <div class="col-12 fase flex-row-center-center">final</div>
            <div class="col-12 fase flex-row-center-center">semis</div>
            <div class="col-12 fase flex-row-center-center">cuartos</div>
            <div class="col-12 fase flex-row-center-center">octavos</div>
            <div class="col-12 fase flex-row-center-center">3ª fase</div>
            <div class="col-12 fase flex-row-center-center">2ª fase</div>
            <div class="col-12 fase flex-row-center-center">1ª fase</div>
            <div class="col-12 fase flex-row-center-center">preliminar</div>
            <div class="col-12 fase flex-row-center-center">2000</div>
          </div>
        @endfor
      </div>
    </div>
  </div>
</div>


<script>
  var equipo = {!! $equipo !!},
      copa = '{{ $copa }}'
   $(function(){
    setBar($('#bar'), equipo.directory + 'escudo.png', equipo.name, equipo.color_a.name, 'historial - ' + copa, '')
    setText($('#bar .title, #bar .subtitle'), equipo.color_b, bcColor(equipo), .1)

    
    setEquipoUI($('.bar-title'), equipo, .1)
    setText($('.section'), equipo.color_b, bcColor(equipo), .1)

    setCristalBorder($('.section'), equipo.color_a, equipo.color_b, 1)
    setBgGradient($('.fase-anio'), equipo.color_a.rgb, equipo.color_b.rgb, equipo.color_c.rgb, true)

    setText($('.fase-anio'), equipo.color_b, bcColor(equipo), .5)
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
    }))
      preload()
   })
</script>
