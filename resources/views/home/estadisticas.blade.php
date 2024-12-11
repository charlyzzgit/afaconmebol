<style>
    #fondo{
      background-position: center bottom;
      background-repeat: no-repeat;
      background-size: cover;

    }

     #cesped{
      position: absolute;
      left: 0;
      bottom: 0;
      z-index: 100;
      height: 320px;
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
    }

    #grada{
      position: absolute;
      bottom: 200px;
      left: 0;
      z-index: 1000;
    }

    .plataforma{
      

      height: 100px;
    }

    .escalon{
      

      height: 20px;
    }

    #botonera{
      position: absolute;
      left:0;
      bottom: 0;
      z-index: 1000;
    }

    .btn-est{
      height: 60px;
      font-size: 25px;
    }

    .btn-est .inner{
      border-radius: 10px;
    }

    #jugadores-top{
      position: absolute;
      left: 0;
      bottom: 300px;
      z-index: 1000000;
    }

    #jugadores-bottom{
      position: absolute;
      left: 22px;
      bottom: 210px;
      z-index: 2000000;
    }

    #escudos{
      position: absolute;
      left:0;
      bottom: 230px;
      z-index: 1000000;
    }

    .jugador{
      width: 45px;
      height: 150px;
      object-fit: cover;
    }

    #copa{
      position: absolute;
      bottom: 250px;
      left: 50%;
      transform: translateX(-50%);
      height: 100px;
      z-index: 3000000000;
    }

    #champion-bar{
      position: absolute;
      top:50px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 100;
      border-radius: 20px;
    }

    #cup-bar{
      position: absolute;
      top:150px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 100;
      border-radius: 15px;
    }
</style>
<div id="fondo" class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">estadisticas</b>
    </div>
    <b class="subtitle"></b>
  </div>
  <div id="champion-bar" class="col-11 flex-row-between-center p-2 cristal">
    <img src="{{ asset('resources/default/escudo.png') }}" class="mr-3" height="50">
    <h4 class="m-0">
      <b>independiente medellin</b>
    </h4>
    <img src="{{ asset('resources/default/escudo.png') }}" class="ml-3" height="50">
  </div>

  <div id="cup-bar" class="col-9 flex-row-between-center p-2 cristal">
    <img src="{{ asset('resources/default/libertadores.png') }}" class="mr-3" height="50">
    <h5 class="m-0 text-center">
      <b>campeon</b>
      <br>
      <b>libertadores</b>
    </h5>
    <img src="{{ asset('resources/default/libertadores.png') }}" class="mr-3" height="50">
  </div>

  <div id="cesped" class="col-12"></div>
  <div id="grada" class="col-12 flex-col-start-center">
    <div class="col-12 plataforma"></div>
    <div class="col-12 escalon"></div>
  </div>
  <div id="jugadores-top" class="col-12 flex-row-center-center">
    @for($i = 0; $i < 11; $i++)
      <img src="{{ asset('resources/default/jugador.png') }}" class="jugador">
    @endfor
  </div>
  <div id="escudos" class="col-12 flex-row-center-center">
    @for($i = 0; $i < 11; $i++)
      <img src="{{ asset('resources/default/escudo.png') }}" class="m-2" height="50">
    @endfor
  </div>
  <div id="jugadores-bottom" class="col-12 flex-row-center-center">
    @for($i = 0; $i < 11; $i++)
      <img src="{{ asset('resources/default/jugador.png') }}" class="jugador">
    @endfor
  </div>
  <div id="botonera" class="col-12 flex-row-around-center flex-wrap p-2">
    <div class="btn-est col-12 p-2">
      <div class="inner col-12 flex-row-center-center h-100 p-2 cristal">
        <img src="{{ asset('resources/default/escudo.png') }}" height="80%">
      <b class="ml-3">campaña</b>
    </div>
    </div>
    <div class="btn-est col-6 p-2">
      <div class="inner col-12 flex-row-center-center h-100 p-2 cristal">
        <img src="{{ asset('resources/default/escudo.png') }}" height="80%">
      <b class="ml-3">posiciones</b>
    </div>
    </div>
    <div class="btn-est col-6 p-2">
      <div class="inner col-12 flex-row-center-center h-100 p-2 cristal">
        <img src="{{ asset('resources/default/escudo.png') }}" height="80%">
      <b class="ml-3">equipos</b>
    </div>
    </div>
    <div class="btn-est col-6 p-2">
      <div class="inner col-12 flex-row-center-center h-100 p-2 cristal">
        <img src="{{ asset('resources/default/logo.png') }}" height="80%">
      <b class="ml-3">partidos</b>
    </div>
    </div>
    <div class="btn-est col-6 p-2">
      <div class="inner col-12 flex-row-start-center h-100 p-2 cristal">
        <img src="{{ asset('resources/default/jugador.png') }}" height="80%">
      <b class="ml-3">goleadores</b>
    </div>
    </div>
  </div>
  <img id="copa" src="{{ asset('resources/default/libertadores.png') }}">
</div>


<script>
   var campeon = {!! $campeon !!},
       copa = '{{ $copa }}',
       zona = '{{ $zona }}',
       src_copa = 'default/' + copa + (zona != null && zona != '' ? '_' + zona : '') + '.png'
   log('campeon', [campeon])

   function setPlantel(){
     var a1 = rdm(0, 11),
         a2 = rdm(0, 11),
         sides = a1 == a2 ? 0 : rdm(0, 2)
    if(sides != 1){
      $('#jugadores-top img').each(function(index){
        setImageEquipo($(this), campeon.equipo, index != a1 ? 'local' : 'visitante')
      })
      $('#jugadores-bottom img').each(function(index){
        setImageEquipo($(this), campeon.equipo, index != a2 ? 'local' : 'visitante')
      })
    }else{
      if(sides == 0){
        $('#jugadores-top img').each(function(index){
          setImageEquipo($(this), campeon.equipo, index != a1 && index != a2 ? 'local' : 'visitante')
        })
        $('#jugadores-bottom img').each(function(index){
          setImageEquipo($(this), campeon.equipo, 'local')
        })
      }else{
        $('#jugadores-top img').each(function(index){
          setImageEquipo($(this), campeon.equipo, 'local')
        })
        $('#jugadores-bottom img').each(function(index){
          setImageEquipo($(this), campeon.equipo, index != a1 && index != a2 ? 'local' : 'visitante')
        })
      }
    }
   }

   $(function(){

    setBar($('#bar'), src_copa, 'estadisitcas', 'naranja', '', zona)
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
        nextPage("{{ route('home') }}", ['home', 'inicio'])
      }))

    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
      }))
    $('#fondo').css({backgroundImage: 'url(' + ASSET + 'estadios/' + getEstadio(campeon.equipo, 21, false) + ')'})
    $('#cesped').css({backgroundImage: 'url(' + ASSET + 'cesped/' + getCesped(campeon.equipo) + ')'})
    setGradient($('.plataforma'), 180, [campeon.equipo.color_b.rgb, campeon.equipo.color_a.rgb, campeon.equipo.color_a.rgb, campeon.equipo.color_a.rgb], [0, 20, 80, 100])
    setGradient($('.escalon'), 180, [campeon.equipo.color_c.rgb, campeon.equipo.color_a.rgb, campeon.equipo.color_a.rgb, campeon.equipo.color_a.rgb], [0, 20, 80, 100])
    setPlantel()

    setImageEquipo($('#escudos img'), campeon.equipo, 'escudo')

    preload()
   })
</script>
