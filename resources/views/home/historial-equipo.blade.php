<style>
    #equipo{
      height: 50px;
      font-size: 30px;
      border-radius: 10px;
      display: none !important;
    }

    .equipo{
      border-radius: 10px;
      border:solid thin white;
      font-size: 25px;
    }

    .equipo .jugador, .equipo .escudo{
      height: 40px;
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

    .copa{
      border-radius: 5px;
    }

    .copa .icon{
      height: 20px;
    }

    #menu-equipos{
      position: absolute;
      top:100%;
      left: 0;
      height: 100%;
      z-index: 1000000001;
    }

    #menu-equipos #equipos{
      height: calc(100% - 50px);
      overflow-y: auto;
    }

    .bar-liga{
      font-size: 25px;
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
    <ul id="list-copas" class="col-12 flex-col-start-center m-0 p-1"></ul>
    <div class="col-12 flex-row-between-center mt-0">
      <div id="btn-all" class="btn-copa col-4 p-1" data-filter="all">
        <div class="btn-inner bar-title col-12 flex-row-center-center p-1 cristal">
          <img src="{{ asset('resources/default/logo.png') }}" height="20">
          <b class="ml-1">todas</b>
        </div>
      </div>
      <div id="btn-jugadas" class="btn-copa col-4 p-1" data-filter="jugadas">
        <div class="btn-inner bar-title col-12 flex-row-center-center p-1 cristal">
          <img src="{{ asset('resources/default/jugador.png') }}" height="20">
          <b class="ml-1">jugadas</b>
        </div>
      </div>
      <div id="btn-ganadas" class="btn-copa col-4 p-1" data-filter="ganadas">
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
      <b id="logro" class="ml-1">{{ $logro }}</b>
    </div>
  </div>
  <div id="vs" class="section col-12 flex-col-start-center mt-1 cristal">
    <div class="col-12 flex-row-center-center bar-title">enfrentamientos</div>
    <ul id="ligas" class="col-12 flex-row-between-start flex-wrap m-0 p-1">
      @foreach($ligas as $liga)
      <li class="liga flex-row-center-center p-1" data-id="{{ $liga->id }}">
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
  <div id="menu-equipos" class="col-12 flex-col-start-center">
    <div class="bar-liga col-12 flex-row-between-center p-2">
      <div class="flex-row-start-center">
        <img src="{{ asset('resources/default/flag.png') }}" height="30">
        <b class="liga-name ml-1"></b>
      </div>
      <i id="close-menu" class="fas fa-times-circle"></i>
    </div>
    <ul id="equipos" class="col-12 flex-col-start-center m-0 p-4"></ul>
  </div>
  
</div>


<script>
  var equipo = {!! $equipo !!},
      copa = '{{ $copa }}',
      copas = {!! $copas !!},
      ligas = {!! $ligas !!}

  log('copas', [copas])

  function getLiEquipo(eq){
    var li = $('<li class="equipo col-12 flex-row-between-center p-2 mb-1">\
                  <div class="col-12 flex-row-start-center">\
                    <img class="escudo">\
                    <img class="jugador ml-1">\
                    <b class="name ml-1"></b>\
                  </div>\
              </li>')
    li.find('.name').html(eq.name)
    setImageEquipo(li.find('.escudo'), eq, 'escudo')
    setImageEquipo(li.find('.jugador'), eq, 'local')
    setEquipoUI(li, eq)
    
    li.data('id', eq.id).click(function(){
      var id = $(this).data('id')
      $('#close-menu').click()
      nextPage("{{ route('home') }}", ['home', 'vs', equipo.id, id, copa], true)
    })

   
    return li
  }

  function getLiCopa(c){
    var li = $('<li class="copa col-12 flex-row-start-center p-1 mb-1 cristal">\
                  <img class="icon">\
                  <b class="anio-copa ml-2"></b>\
                  <b class="ml-1 mr-1">-</b>\
                  <b class="fase-copa"></b>\
                </li>'),
        text = ''
    if(c.isGanada){
      text = 'campeon'
      setImageCopa(li.find('.icon'), copa)
    }else{
      if(c.isJugada){
        text = c.fase == 'final' ? 'subcampeon' : 'eliminado en ' + c.fase
        li.find('.icon').prop('src', ASSET + 'default/jugador.png')
      }else{
        text = 'no clasifico'
        li.find('.icon').prop('src', ASSET + 'default/logo.png')
      }
    }

    setBgGradient(li, equipo.color_a.rgb, equipo.color_b.rgb, equipo.color_c.rgb)

    li.find('.anio-copa').html(c.anio)
    li.find('.fase-copa').html(text)

    return li
  }

  function listarCopas(filter){
    var ul = $('#list-copas')
    ul.empty()
    $.each(copas, function(i, c){
      switch(filter){
        case 'jugadas':
          if(c.isJugada){
            ul.append(getLiCopa(c))
          }
        break
        case 'ganadas':
          if(c.isGanada){
            ul.append(getLiCopa(c))
          }
        break
        default:
          ul.append(getLiCopa(c))
        break
      }
    })
  }

  function getLiga(id){
    var liga = null
    $.each(ligas, function(i, l){
      if(l.id == id){
        liga = l
      }
    })
    return liga
  }

  function listarEquipos(eqs){
    $('#equipos').empty()
    $.each(eqs, function(i, e){
      $('#equipos').append(getLiEquipo(e))
    })
  }


   $(function(){
    setBar($('#bar'), equipo.directory + 'escudo.png', equipo.name, equipo.color_a.name, 'historial - ' + copa, '')
    setText($('#bar .title, #bar .subtitle'), equipo.color_b, bcColor(equipo), .1)

    
    setEquipoUI($('.bar-title'), equipo, .1)
    setText($('.section'), equipo.color_b, bcColor(equipo), .1)

    setCristalBorder($('.section'), equipo.color_a, equipo.color_b, 1)
    setBgGradient($('.fase-anio'), equipo.color_a.rgb, equipo.color_b.rgb, equipo.color_c.rgb, true)

    setText($('.fase-anio'), equipo.color_b, bcColor(equipo), .5)

    $('.btn-copa').click(function(){
      listarCopas($(this).data('filter'))
    })


    $('#ligas .liga').each(function(){
       $(this).click(function(){
         var id = $(this).data('id'),
           liga = getLiga(id)
          setBgGradient($('.bar-liga'), liga.color_a.rgb, liga.color_b.rgb, liga.color_c.rgb)
          setText($('.bar-liga'), liga.color_b, liga.color_c, .1)
          listarEquipos(liga.equipos)
          $('.liga-name').html(liga.name)
          setCristalRGB($('#menu-equipos'), liga.color_a, liga.color_b)
          setImageFlag($('.bar-liga img'), liga.bandera)
          $('#menu-equipos').animate({top:0}, 150)
       })
    })

    $('#close-menu').click(function(){
      $('#menu-equipos').animate({top:'100%'}, 150)
    })

    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
    }))

    listarCopas('all')
      preload()
   })
</script>
