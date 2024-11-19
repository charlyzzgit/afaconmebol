<style>
    .equipo .name{
      font-size: 25px;
    }

    .escudo, .jugador{
      height: 30px
    }

    .equipo{
      border-radius: 5px;
    }

    .bar{
      font-size: 22px;
    }

    .grupo{
      border-radius: 5px;
      overflow: hidden;
    }

    #menu-copa{
      position: absolute;
      left: 0;
      bottom: -1000px;
      z-index: 1000;
      background: rgba(0,0,0,.8);
    }

    .menu-item .inner{
       height: 100px;
       border:solid 2px white;
       border-radius: 10px;
       background: rgba(255,255,255,.5);
       font-size: 20px;
    }

    .icon{
      font-size: 50px;
      color:white;
    }

    #podio .inner{
      border-radius:10px;
      border:solid thin white;
    }

    #podio .jugador-cmp{
      width: 70px;
      height: 180px;
      object-fit: cover;
    }

    #podio .cmp-text{
      font-size: 25px;
    }

    #podio .campeon{
      border-radius: 100px;
      border:solid thin white;
      background: linear-gradient(180deg, black, gray, black);
    }

    @if($fase == 5)
      #list{
        height:auto
      }
    @endif
</style>

<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">ligas</b>
    </div>
    <b class="subtitle">fases</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
  @if($fase == 5)
    @if(count($grupos))
      @if($grupos[0]->equiposPosition[0]->j)
        <div id="podio" class="col-12 p-1 mt-1">
          <div class="inner col-12 flex-col-start-center p-2 cristal">
             <h1 class="m-0"><b class="title">{{ $copa.' '.(count($grupos) ? $grupos[0]->anio : '') }}</b></h1>
             <div class="col-12 flex-row-between-center">
              <div class="col-2 flex-row-start-center">
                <img class="jugador-cmp" src="{{ asset('resources/default/jugador.png') }}">
              </div>
              <div class="col-6 flex-row-center-center">
                <img class="copa-cmp" src="{{ asset('resources/default/libertadores.png') }}" height="150">
              </div>
              <div class="col-2 flex-row-end-center">
                <img class="escudo-cmp" src="{{ asset('resources/default/escudo.png') }}" height="70">
              </div>
             </div>
             <b class="cmp-text">campeon</b>
             <div class="campeon col-12 flex-row-center-center p-1">
               <h1 class="mb-0">
                 <b class="name">?</b>
               </h1>
             </div>
             
          </div>
         
        </div>
      @endif
    @endif
  @endif

  <div id="menu-copa" class="col-12 flex-row-around-end flex-wrap p-2" data-state="off">
    <div class="menu-item col-6 p-3" data-option="partidos">
      <div class="inner col-12 flex-col-center-center p-2">
        <img src="{{ asset('resources/default/logo.png') }}" height="50">
        <b class="lbl mt-2">partidos</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="goleadores">
      <div class="inner col-12 flex-col-center-center p-2">
        <img src="{{ asset('resources/default/jugador.png') }}" height="50">
        <b class="lbl mt-2">goleadores</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="candidatos">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa fa-list-ol"></i>
        <b class="lbl mt-2">candidatos</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="competencia">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa fa-line-chart"></i>
        <b class="lbl mt-2">en competencia</b>
      </div>
    </div>
    <div class="menu-item col-8 pt-3 pb-3 pl-5 pr-5" data-option="historial">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa-solid fa-clock-rotate-left"></i>
        <b class="lbl mt-2">historial</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="ranking">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa fa-list-ul"></i>
        <b class="lbl mt-2">ranking</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="records">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa fa-list-ul"></i>
        <b class="lbl mt-2">records</b>
      </div>
    </div>
  </div>
</div>


<script>
  //copa, fase, zona, grupos
  var grupos = {!! $grupos !!},
      copa = '{{ $copa }}',
      fase = parseInt('{{ $fase }}'),
      zona = '{{ $zona }}',
      ul = $('#list'),
      src_copa = 'default/' + copa + '.png'
  log('grupos', [grupos])



  
  function getLiGrupo(g){
    var li = $('<li class="grupo col-12 flex-col-start-center">\
                  <div class="bar col-12 flex-row-center-center"></div>\
                  <ul class="equipos col-12 flex-col-start-center p-1 m-0"></ul>\
              </li>'),
        bar = getEl(li, 'bar'),
        ul = getEl(li, 'equipos'),
        prefix = g.equipos_position.length == 2 ? 'llave ' : 'grupo '
    $.each(g.equipos_position, function(i, e){
       li.find('.equipos').append(getLiEquipo(e))
    })

    bar.html(prefix + g.grupo)

    bg(bar, g.a.rgb)
    
    setCristalRGB(ul, g.a, g.b)

    textColor(bar, 'blanco', g.b.name, .2)

    return li
  }


  function getLiEquipo(eg){
    var li = $('<li class="equipo col-12 flex-col-start-center pl-1 pr-1 pt-3 pb-3 mb-1">\
                <div class="col-12 flex-row-between-center">\
                  <div class="flex-row-start-center">\
                    <img class="escudo">\
                    <b class="name ml-1"></b>\
                  </div>\
                  <img class="jugador">\
                </div>\
              </li>'),
         escudo = getEl(li, 'escudo'),
          name = getEl(li, 'name'),
         jugador = getEl(li, 'jugador')

    setImageEquipo(escudo, eg.equipo, 'escudo')
    setImageEquipo(jugador, eg.equipo, 'local')
    name.html(eg.equipo.name)

    setEquipoUI(li, eg.equipo)
    eg.estado = getEstado(eg.estado, copa, fase, zona)
    log('estado', eg.estado)
    li.append(getTable(eg))
    
    return li
  }

  function setMenu(){
    $('#menu-copa').find('.menu-item').each(function(){
      var el = $(this),
          option = el.data('option'),
          a = '',
          b = ''
      switch(option){
        case 'partidos':
          a = 'verde'
          b = 'verdeclaro'
        break
        case 'goleadores':
          a = 'celeste'
          b = 'cielo'
        break
        case 'candidatos':
          a = 'violeta'
          b = 'rosa'
        break
        case 'competencia':
          a = 'marron'
          b = 'marronclaro'
        break
        case 'historial':
          a = 'verdeoscuro'
          b = 'verde'
        break
        case 'ranking':
          a = 'azul'
          b = 'celeste'
        break
        case 'records':
          a = 'amarillo'
          b = 'crema'
        break
      }

      //setCristal(getEl($(this), 'inner'), color)

      radialGradient(getEl(el, 'inner'), a, b)

      textColor(getEl(el, 'lbl'), 'blanco', a, .2)

      getEl(el, 'inner').click(function(){
        nextPage("{{ route('home') }}", ['home', 'partidos', copa, fase], true)
      })

      
    })
  }

  function listar(){
    ul.empty()
    $.each(grupos, function(i, g){
      ul.append(getLiGrupo(g))
    })
  }


  function setPodio(eq){
    var p = $('#podio'),
        body = getEl(p, 'inner'),
        title = getEl(p, 'title'),
        e = getEl(p, 'escudo-cmp'),
        j = getEl(p, 'jugador-cmp'),
        cmptext = getEl(p, 'cmp-text'),
        campeon = getEl(p, 'campeon'),
        name = getEl(p, 'name'),
        color = parseColor(getColorCopa(copa))

    getColorCopa(copa)
    setCristalRGB(body, color)
    textColor(title, 'blanco', getColorCopa(copa), .2)
    textColor(cmptext, 'blanco', getColorCopa(copa), .1)
    textColor(name, 'blanco', 'gris', .1)
    if(eq.j == 2){
      setImageEquipo(e, eq.equipo, 'escudo')
      setImageEquipo(j, eq.equipo, 'local')
      textColor(name, eq.equipo.color_b, bcColor(eq.equipo), .1)
      setEquipoUI(campeon, eq.equipo, 1)
    }
    

  }


   $(function(){
    setBar($('#bar'), src_copa, [copa, getNameFase(copa, fase, zona)].join(' - '), getColorCopa(copa), 'grupos')
    setMenu()
    if(fase == 5){
      if(grupos.length != 0){
        if(grupos[0].equipos_position[0].j != 0){
          setPodio(grupos[0].equipos_position[0])
        }
      }
    }
    
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
        nextPage("{{ route('home') }}", ['home', 'inicio'])
      }))

    footer.append(getBtnFooter('verde', null, 'fa fa-th', function(){
        var state = $('#menu-copa').data('state')
        if(state == 'off'){
          $('#menu-copa').data('state', 'on')
          $('#menu-copa').animate({bottom: 0}, 150)
        }else{
          $('#menu-copa').data('state', 'off')
          $('#menu-copa').animate({bottom: '-1000px'}, 150)
        }
      }))

    listar()
     preload()
   })
</script>
