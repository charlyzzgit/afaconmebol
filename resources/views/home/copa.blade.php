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
    }

    .icon{
      font-size: 50px;
      color:white;
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
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>

  <div id="menu-copa" class="col-12 flex-row-around-end flex-wrap p-2" data-state="off">
    <div class="menu-item col-6 p-3" data-option="partidos">
      <div class="inner col-12 flex-col-center-center p-2">
        <img src="{{ asset('resources/default/logo.png') }}" height="50">
        <b class="mt-2">partidos</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="goleadores">
      <div class="inner col-12 flex-col-center-center p-2">
        <img src="{{ asset('resources/default/jugador.png') }}" height="50">
        <b class="mt-2">goleadores</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="candidatos">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa fa-list-ol"></i>
        <b class="mt-2">candidatos</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="competencia">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa fa-line-chart"></i>
        <b class="mt-2">en competencia</b>
      </div>
    </div>
    <div class="menu-item col-8 pt-3 pb-3 pl-5 pr-5" data-option="historial">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa-solid fa-clock-rotate-left"></i>
        <b class="mt-2">historial</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="ranking">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa fa-list-ul"></i>
        <b class="mt-2">ranking</b>
      </div>
    </div>
    <div class="menu-item col-6 p-3" data-option="records">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa fa-list-ul"></i>
        <b class="mt-2">records</b>
      </div>
    </div>
  </div>
</div>


<script>
  //copa, fase, zona, grupos
  var grupos = {!! $grupos !!},
      copa = '{{ $copa }}',
      fase = '{{ $fase }}',
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

    li.append(getTable(eg))
    
    return li
  }

  function listar(){
    ul.empty()
    $.each(grupos, function(i, g){
      ul.append(getLiGrupo(g))
    })
  }
   $(function(){
    setBar($('#bar'), src_copa, [copa, getNameFase(copa, fase, zona)].join(' - '), 'verde')

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
