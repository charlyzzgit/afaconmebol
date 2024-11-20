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
    <div id="box-equipo" class="col-12 flex-row-start-center mt-1 mb-1 p-1">
      <img class="escudo" src="{{ asset('resources/default/escudo.png') }}" height="30">
      <b class="name ml-3">independiente medellin</b>
    </div>
  @endisset
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
</div>


<script>
   var partidos = {!! $partidos !!},
       copa = '{{ $copa }}',
       fase = parseInt('{{ $fase }}'),
       zona = '{{ $zona }}',
       src_copa = 'default/' + copa + '.png',
       ul = $('#list'),
       E = null

    @isset($equipo)
      E = {!! $equipo !!}
    @endisset

   
   log('partidos', [partidos])

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
    setImageCopa(copa, p.copa)
    setImageFlag(flag, p.local.liga.bandera)
    copafase.html([p.copa, getNameFase(p.copa, p.fase, p.zona)].join(' - '))
    grupofecha.html([grupoKey(p.is_define) + ' ' + p.grupo.grupo, getNameFecha(p.fase, p.fecha)].join(' - '))
    textColor(copafase, 'blanco', colb.name, .1)
    textColor(grupofecha, 'blanco', colb.name, .1)

    setCristalRGB(body, p.local.color_a)

    nameloc.html(p.local.name)
    namevis.html(p.visitante.name)

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

    if(p.is_judado){
      vs.css({visibility: 'hidden'})
    }else{
      gl.css({visibility: 'hidden'})
      gv.css({visibility: 'hidden'})
      pa.css({visibility: 'hidden'})
      pb.css({visibility: 'hidden'})
    }

    return li
  }

  function listar(){
    ul.empty()
    $.each(partidos, function(i, p){
      ul.append(getLiPartido(p))
    })
    preload()
  }


   $(function(){
    setBar($('#bar'), src_copa, [copa, getNameFase(copa, fase, zona)].join(' - '), getColorCopa(copa), 'partidos')

    if(E != null){
      setEquipoUI($('#box-equipo'), E, 1)
      setImageEquipo($('#box-equipo .escudo'), E, 'escudo')
      $('#box-equipo .name').html(E.name)
    }
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
      goBack(true)
    }))
     listar()
   })
</script>
