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
</div>


<script>
  //copa, fase, zona, grupos
  var grupos = {!! $grupos !!},
      ul = $('#list')
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
    listar()
     preload()
   })
</script>
