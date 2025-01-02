<style>
    #menu-ligas{
      position: absolute;
      bottom:-1000px;
      left: 0;
      z-index: 1000;
    }

    .liga{
      border-radius: 10px;
      border:solid thin white;
      font-size: 20px;
    }

    .flag{
      height: 30px;
    }

    .bar-ligas{
      font-size: 25px;
      font-weight: bold;
    }

    .equipo{
      border-radius: 10px;
      border:solid thin white;
      font-size: 20px;
    }

    .escudo, .jugador, .copa{
      height: 30px;
    }

    .equipo .pts{
      width: 30px;
      height: 30px;
      font-size: 20px;
      font-weight: bold;
      border-radius: 100%;
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
  <div id="menu-ligas" class="col-12 flex-col-start-center" data-state="closed">
    <div class="bar-ligas col-12 flex-row-center-center">
      ligas
    </div>
    <ul id="ligas" class="col-12 flex-col-start-center p-1 m-0"></ul>
  </div>
</div>


<script>
  var copa = '{{ $copa }}',
      equipos = {!! $eqs !!},
      ligas = {!! $ligas !!},
      src = copa == 'afa' ? 'escudo_afa' : copa,
      col = getColorCopa(copa, true)
  log('ligas', [ligas])
  log('equipos', [equipos])

  function getLiLiga(liga){
    var li = $('<li class="liga col-12 flex-row-between-center p-2 mb-1">\
                <div class="col-6 flex-row-start-center">\
                  <img class="flag">\
                  <b class="name ml-1"></b>\
                </div>\
                <div class="col-3 flex-row-end-center">\
                  <b class="pts">0</b>\
                </div>\
                <div class="col-3 flex-row-end-center">\
                  <b class="copas ml-5">0</b>\
                </div>\
              </li>')
    li.find('.name').html(liga.name)
    li.find('.flag').prop('src', ASSET + liga.bandera)
    if(liga.id != 0){
      setEquipoUI(li, liga)
      setText(li.find('.copas, .pts'), liga.color_b, bcColor(liga), .1)
      li.find('.copas').html(liga.copas != 0 ? liga.copas : '')
      li.find('.pts').html(liga.pts)
    }else{
      
      setBgGradient(li, parseColor('azul').rgb, parseColor('celeste').rgb, parseColor('celeste').rgb)
      setText(li, parseColor('blanco'), parseColor('celeste'), .1)
      li.find('.copas').html('copas')
      li.find('.pts').html('pts')
    }

    
    li.data('id', liga.id).click(function(){
      var id = $(this).data('id')
      listarEquipos(id)
      $('#menu-ligas').data('state', 'closed')
      $('#menu-ligas').animate({bottom: '-1000px'}, 150)
    })
    return li
  }

  function setLigas(){
    setCristal($('#menu-ligas'), col.a)
    $('#ligas').append(getLiLiga({
      id:0,
      bandera: 'default/conmebol.png',
      name: 'general'
    }))
    $.each(ligas, function(i, l){
      $('#ligas').append(getLiLiga(l))
    })
  }

  function getLiEquipo(data){
    var li = $('<li class="equipo col-12 flex-row-between-center p-2 mb-1">\
                  <div class="col-10 flex-row-start-center">\
                    <img class="escudo">\
                    <img class="jugador ml-1">\
                    <b class="name ml-1"></b>\
                  </div>\
                  <div class="col-2 flex-row-between-center">\
                    <div class="pts flex-row-center-center"></div>\
                    <b class="copas ml-2"></b>\
                  </div>\
              </li>'),
        equipo = data.data
    //log('equipo', [equipo])
    li.find('.name').html(equipo.name)
    li.find('.pts').html(data.pts)

    li.find('.copas').html(data.cmp != 0 ? data.cmp : '')
    setImageEquipo(li.find('.escudo'), equipo, 'escudo')
    setImageEquipo(li.find('.jugador'), equipo, 'local')
    setEquipoUI(li, equipo)
    setText(li.find('.copas'), equipo.color_b, bcColor(equipo), .1)

    bg(li.find('.pts'), equipo.color_b.rgb)
    setText(li.find('.pts'), equipo.color_a, equipo.color_a, .1)
    
    li.find('.copas').html(data.copas)
    
    

    
    return li
  }

  function listarEquipos(liga_id){
    $('#list').empty()
    $.each(equipos, function(i, e){
      var add = true
      if(liga_id !== undefined){
        if(e.liga_id != liga_id){
          add = false
        }
      }
      if(add){
        $('#list').append(getLiEquipo(e))
      }
      
    })
  }

   $(function(){

    
    setBgGradient($('.bar-ligas'), parseColor(col.a).rgb, parseColor(col.b).rgb, parseColor(col.b).rgb)
    setText($('.bar-ligas'), parseColor('blanco'), parseColor(col.b), .1)
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
    }))

    footer.append(getBtnFooter('verde', null, 'fas fa-bars', function(){
          var m = $('#menu-ligas'),
              position = 0
          if(m.data('state') == 'closed'){
            m.data('state', 'open')
            position = 0
          }else{
            m.data('state', 'closed')
            position = -1000
          }
          m.animate({bottom: position + 'px'}, 150)
    }))
    
    setBar($('#bar'),'default/' + src + '.png', copa, 'azul', 'ranking', '')

    setLigas()
    listarEquipos()

    preload()
   })
</script>
