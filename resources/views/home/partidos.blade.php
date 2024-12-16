<style>

    .partido{
      border-radius: 10px;
      overflow: hidden;
    }

    .partido .header{
      height: 50px;
      background: gray;
      font-size: 20px;
      line-height: 1;
    }

    .names{
      font-size: 35px;
      line-height: 1;
      color:white;
    }

    

    .vs{
      font-size: 30px;
    }

    .gl, .gv{
      font-size: 50px;
      line-height: 1;
    }

    .pa, .pb{
      font-size: 30px;
      width: 40px;
      line-height: 1.3;
    }

    .partido .flag, .partido .copa{
      height: 40px;
    }

    .partido .jugador{
      width: 65px;
      height: 200px;
      object-fit: cover;
    }

    .partido .escudo{
      height: 50px;
    }

    .partido .estadio{
      height: 70px;
    }

    .partido .body{
       border-radius: 0 0 10px 10px;
    }

    #box-equipo{
      font-size: 30px;
      border-radius: 10px;
    }

    #estadisticas-partidos{
      position: absolute;
      bottom: -100%;
      left: 0;
      z-index: 1000000;
    }
    .e-item{
      font-size: 40px;
    }

    #modal-detalle{
      width: 100%;
      height: 100%;
      position: absolute;
      top:0;
      left: 0;
      z-index: 100000;
      background: rgba(0,0,0,.7);
      visibility: hidden;
    }

    #modal-detalle .inner{
      border-radius: 5px;
      background: white;
      overflow: hidden;
    }

    #modal-detalle ul{
      border-radius: 5px;
     
    }

    @isset($equipo)
      #list{
        height:calc(100% - 90px)
      }
    @endisset
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">ligas</b>
    </div>
    <b class="subtitle">partidos</b>
  </div>
  @isset($equipo)
    <div id="box-equipo" class="col-12 flex-row-between-center mt-1 mb-1 p-1">
      <img class="escudo" src="{{ asset('resources/default/escudo.png') }}" height="30">
      <b class="name ml-3">independiente medellin</b>
      <img class="jugador" src="{{ asset('resources/default/jugador.png') }}" height="30">
    </div>
  @endisset
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
  <div id="estadisticas-partidos" class="col-12 flex-col-start-center cristal" data-state="closed"></div>
</div>


<div id="modal-detalle" class="flex-row-center-center">
  <div class="inner col-11 flex-col-start-center">
    <div class="detalle-bar col-12 flex-row-between-center p-1">
      <img class="d-loc" src="{{ asset('resources/default/escudo.png') }}" height="30">
      <b>resumen</b>
      <img class="d-vis" src="{{ asset('resources/default/escudo.png') }}" height="30">
    </div>
    <div class="col-12 p-1">
      <ul id="detalle-list" class="col-12 flex-col-start-center p-1 m-0"></ul>
    </div>
    <div class="col-12 flex-row-center-center p-1">
      <button class="btn-close btn">cerrar</button>
    </div>
  </div>
</div>


<script>
   var partidos = {!! $partidos !!},
       copa = '{{ $copa }}',
       fase = parseInt('{{ $fase }}'),
       zona = '{{ $zona }}',
       src_copa = 'default/' + copa + (zona != null && zona != '' ? '_' + zona : '') + '.png',
       ul = $('#list'),
       E = null,
       FILTER = null,
       estadisticas = [
        {filter:'mejor-partido', name: 'mejor partido', a:'rojo', b: 'naranja'},
        {filter:'maxima-goleada', name: 'maxima goleada', a:'azul', b: 'celeste'},
        {filter:'mas-goles', name: 'partido con mas goles', a:'verde', b: 'verdeclaro'},
        {filter:'peor-partido', name: 'peor partido', a:'marronclaro', b: 'amarillo'},
        {filter:'all', name: 'todos los partidos', a:'negro', b: 'gris'}
        ]

    @isset($equipo)
      E = {!! $equipo !!}
    @endisset

    @isset($filter)
      FILTER = '{{ $filter }}'
    @endisset

   
   log('partidos', [src_copa, partidos])

   function getPartidoFromList(id){
     var p = null 
     $.each(partidos, function(i, partido){
       if(partido.id == id){
        p = partido
       }
     })
     return p
   }

  function getLiPartido(p){
    var li = $('<li class="partido col-12 flex-col-start-center mb-2">\
                  <div class="header col-12 flex-row-between-center p-1">\
                    <div class="col-2 flex-row-start-center">\
                      <img class="copa">\
                    </div>\
                    <div class="col-8 flex-col-start-center">\
                      <b class="copa-fase">copa - fase</b>\
                      <b class="grupo-fecha">grupo 10 - partido de vuelta</b>\
                    </div>\
                    <div class="col-2 flex-row-end-center">\
                      <img class="flag">\
                    </div>\
                  </div>\
                  <div class="body col-12 flex-col-start-center p-1">\
                    <div class="names col-12 flex-row-between-start">\
                      <b class="nameloc col-6">independiente medellin</b>\
                      <b class="namevis col-6 text-right">independiente medellin</b>\
                    </div>\
                    <div class="flex-row-between-center">\
                      <img class="jugador local">\
                      <div class="flex-col-start-center p-2">\
                         <b class="name-estadio">estadio independiente medellin</b>\
                         <div class="col-12 flex-row-between-center mt-2 mb-2">\
                           <img class="escudo e-loc">\
                           <img class="estadio ml-2 mr-2">\
                           <img class="escudo e-vis">\
                         </div>\
                         <b class="dia-hora">miercoles - 21 hs.</b>\
                         <div class="score flex-row-center-end">\
                           <b class="gl">3</b>\
                           <b class="pa ml-1">(5)</b>\
                           <b class="vs">vs</b>\
                           <b class="pb flex-row-end-center mr-1">(4)</b>\
                           <b class="gv">0</b>\
                         </div>\
                      </div>\
                      <img class="jugador visitante">\
                    </div>\
                  </div>\
                </li>'),
        header = getEl(li, 'header'),
        copa = getEl(li, 'copa'),
        copafase = getEl(li, 'copa-fase'),
        grupofecha = getEl(li, 'grupo-fecha'),
        flag = getEl(li, 'flag'),
        body = getEl(li, 'body'),
        nameloc = getEl(li, 'nameloc'),
        namevis = getEl(li, 'namevis'),
        local = getEl(li, 'local'),
        visitante = getEl(li, 'visitante'),
        eloc = getEl(li, 'e-loc'),
        evis = getEl(li, 'e-vis'),
        nameestadio = getEl(li, 'name-estadio'),
        estadio = getEl(li, 'estadio'),
        diahora = getEl(li, 'dia-hora'),
        gl = getEl(li, 'gl'),
        gv = getEl(li, 'gv'),
        pa = getEl(li, 'pa'),
        pb = getEl(li, 'pb'),
        vs = getEl(li, 'vs'),
        cola = p.a,
        colb = p.b,
        change = p.is_jugado ? cambiar(p.local, p.visitante) : p.visitante.visitante

    setBgGradient(header, cola.rgb, colb.rgb, cola.rgb)
    setImageCopa(copa, p.copa + (p.zona != null ? '_' + p.zona : ''))
    setImageFlag(flag, p.local.liga.bandera)
    copafase.html([p.copa, getNameFase(p.copa, p.fase, p.zona)].join(' - '))
    grupofecha.html([grupoKey(p.is_define) + ' ' + p.grupo.grupo, getNameFecha(p.fase, p.fecha)].join(' - '))
    textColor(copafase, 'blanco', colb.name, .1)
    textColor(grupofecha, 'blanco', colb.name, .1)

    setCristalRGB(body, p.local.color_a)

    nameloc.html(textFormat(p.local.name, 14))
    namevis.html(textFormat(p.visitante.name, 14))

    nameestadio.html('estadio ' + p.local.name)
    diahora.html([getDia(p.dia), p.hora + 'hs.'].join(' - '))

    textColorUI(nameloc, p.local.color_b.rgb, parseALT(p.local, 'c', 'b', 'a').rgb, .5)
    textColorUI(namevis, p.visitante.color_a.rgb, p.visitante.color_b.rgb, .5)

    multiText([nameestadio, diahora], p.local.color_b, parseALT(p.local, 'c', 'b', 'a'), .05)

    setImageEquipo(local, p.local, 'local')
    setImageEquipo(eloc, p.local, 'escudo')

    setImageEquipo(visitante, p.visitante, change ? 'visitante' : 'local')
    setImageEquipo(evis, p.visitante, 'escudo')

    textColorUI(gl, p.local.color_b.rgb, parseALT(p.local, 'c', 'b', 'a').rgb, .5)
    textColorUI(pa, p.local.color_b.rgb, parseALT(p.local, 'c', 'b', 'a').rgb, .25)
    textColorUI(vs, p.local.color_b.rgb, parseALT(p.local, 'c', 'b', 'a').rgb, .4)

    textColorUI(pb, p.visitante.color_a.rgb, p.visitante.color_b.rgb, .25)
    textColorUI(gv, p.visitante.color_a.rgb, p.visitante.color_b.rgb, .5)

    setImageEquipo(estadio, p.local, 'estadio')

    borderColor(body, p.local.color_b.rgb, 1)

    if(p.is_jugado){
      vs.css({visibility: 'hidden'})
      if(p.pa == 0 && p.pb == 0){
        pa.css({visibility: 'hidden'})
        pb.css({visibility: 'hidden'})
      }
      gl.html(p.gl)
      gv.html(p.gv)
      pa.html('(' + p.pa + ')')
      pb.html('(' + p.pb + ')')
    }else{
      gl.css({visibility: 'hidden'})
      gv.css({visibility: 'hidden'})
      pa.css({visibility: 'hidden'})
      pb.css({visibility: 'hidden'})
    }

    estadio.data('id', p.id).click(function(){
      var id = $(this).data('id'),
          partido = getPartidoFromList(id)
      detalle(partido)
    })

    return li
  }

  function listar(){
    ul.empty()
    $.each(partidos, function(i, p){
      ul.append(getLiPartido(p))
    })
    preload()
  }

  function getLiEstadistica(e){
    var es = $('<div class="e-item col-12 flex-row-center-center"></div>')
    es.html(e.name)
    textColor(es, 'blanco', e.a, 1)
    setGradientDuo(es, parseColor(e.a), parseColor(e.b))
    es.data('filter', e.filter).click(function(){
      var filter = $(this).data('filter'),
          url = "{{ route('home') }}",
          params = ['home', 'estadisticas-partidos', copa, filter, zona]
       
       nextPage(url, params, true)
    })

    return es

  }

  function setEstadisticas(){
    $.each(estadisticas, function(i, e){
      $('#estadisticas-partidos').append(getLiEstadistica(e))
    })
  }

  function detalle(p){
    
    var m = $('#modal-detalle'),
        bar = getEl(m, 'detalle-bar'),
        inner = getEl(m, 'inner'),
        l = getEl(m, 'd-loc'),
        v = getEl(m, 'd-vis'),
        ul = getEl(m, 'detalle-list', true),
        btn = getEl(m, 'btn-close'),
        detalle = p.detalle != null ? JSON.parse(p.detalle) : []

    setEquipoUI(bar, p.local, 1)
    bg(inner, p.local.color_a.rgb)
    bg(btn, p.local.color_b.rgb)
    bg(ul, p.local.color_b.rgb)

    setText(btn, p.local.color_a, p.local.color_b, .05)

    setText(bar, p.local.color_b, bcColor(p.local), .05)

    btn.unbind('click').click(function(){
      m.fadeOut(150)
    })

    setImageEquipo(l, p.local, 'escudo')
    setImageEquipo(v, p.visitante, 'escudo')

    ul.empty()
    $.each(detalle, function(i, d){
      var eq = d.equipo_id == p.loc_id ? p.local : p.visitante
      ul.append(getLiDetalle(d, eq))
    })


    m.fadeIn(150)

  }

  function getLiDetalle(d, eq){
    
    var li = $('<li class="detalle col-12 flex-row-start-center p-1 mb-1">\
                <b class="minuto"></b>\
                <b class="tiempo ml-1"></b>\
                <img class="escudo ml-1" height="20">\
                <b class="jugador ml-1"></b>\
                <b class="gol ml-1"></b>\
              </li>')
       
    li.find('.minuto').html(d.minuto + "'")
    li.find('.tiempo').html(d.tiempo + ' t')
    li.find('.jugador').html('Nº ' + d.jugador)
    li.find('.gol').html(d.gol)
    setImageEquipo(li.find('.escudo'), eq, 'escudo')
    setEquipoUI(li, eq, .5)
    setText(li, eq.color_b, bcColor(eq), .05)
    return li
  }

  function openMenuEstadisticas(){
    var m = $('#estadisticas-partidos'),
        position = 0
    if(m.data('state') == 'closed'){
            m.data('state', 'open')
            position = 0
    }else{
            m.data('state', 'closed')
            position = -100
    }
    m.animate({bottom: position + '%'}, 150)
  }


   $(function(){
    $('#modal-detalle').css('visibility', 'visible').hide()
    setBar($('#bar'), src_copa, [copa, getNameFase(copa, fase, zona)].join(' - '), getColorCopa(copa), 'partidos', zona)

    if(E != null){
      setEquipoUI($('#box-equipo'), E, 1)
      setImageEquipo($('#box-equipo .escudo'), E, 'escudo')
      setImageEquipo($('#box-equipo .jugador'), E, 'local')
      $('#box-equipo .name').html(E.name)
    }
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
      goBack(true)
    }))

    if(FILTER != null){

        setEstadisticas()
        footer.append(getBtnFooter('naranja', null, 'fas fa-bars', function(){
          openMenuEstadisticas()
        }))

        if(FILTER == '-'){
          openMenuEstadisticas()
        }

    }
     listar()
   })
</script>
