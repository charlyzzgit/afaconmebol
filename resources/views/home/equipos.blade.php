<style>
    .equipo{
      border-radius: 10px;
      border:solid thin white;
      font-size: 25px;
    }

    .escudo, .jugador, .copa{
      height: 40px;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img class="icon" height="90%">
      <b class="title ml-2">ligas</b>
    </div>
    <b class="subtitle">fases</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 mt-2"></ul>
</div>

<script>
  var ul = $('#list'),
      liga = {!! $liga !!},
      equipos = {!! $equipos !!},
      lib = {!! $lib !!},
      sud = {!! $sud !!}
  
  function getLiEquipo(equipo){
    var li = $('<li class="equipo col-12 flex-row-between-center p-2 mb-1">\
                  <div class="col-10 flex-row-start-center">\
                    <img class="escudo">\
                    <img class="jugador ml-1">\
                    <b class="name ml-1"></b>\
                  </div>\
                  <div class="col-2 flex-row-between-center">\
                    <b class="pts"></b>\
                    <img class="copa">\
                  </div>\
              </li>')
    li.find('.name').html(equipo.name)
    li.find('.pts').html(equipo.pts_liga)
    setImageEquipo(li.find('.escudo'), equipo, 'escudo')
    setImageEquipo(li.find('.jugador'), equipo, 'local')
    setEquipoUI(li, equipo)
    if(equipo.copa != null){
      li.find('.copa').prop('src', ASSET + 'default/' + equipo.copa + '.png')
    }else{
      li.find('.copa').css({visibility:'hidden'})
    }
    li.data('id', equipo.id).click(function(){
      var id = $(this).data('id')
      //nextPage("{{ route('home') }}", ['home', 'equipos', id], true)
    })
    return li
  }

  function listar(copa){
    ul.empty()
    if(copa !== undefined){
      var eqs = copa == 'libertadores' ? lib : sud
      $.each(eqs, function(i, e){
        ul.append(getLiEquipo(e))
      })
    }else{
      $.each(equipos, function(i, e){
        ul.append(getLiEquipo(e))
      })
    }
    
    preload()
  }


   $(function(){
    footer.empty()
      footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
        nextPage("{{ route('home') }}", ['home', 'inicio'])
      }))
      footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        nextPage("{{ route('home') }}", ['home', 'ligas'], true)
      }))

      footer.append(getBtnFooter('verde', null, 'fas fa-bars', function(){
        listar()
      }))

      footer.append(getBtnFooter('azul', 'default/sudamericana.png', null, function(){
        listar('sudamericana')
      }))

      footer.append(getBtnFooter('rojo', 'default/libertadores.png', null, function(){
        listar('libertadores')
      }))

    setBar($('#bar'), liga.bandera, liga.name, liga.color_a.name)

    setCristal(ul, liga.color_a.name)
    
    listar()
     
   })
</script>
