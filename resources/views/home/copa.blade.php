<style>
    .equipo .name{
      font-size: 25px;
    }

    .escudo, .jugador, .h-estado{
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
    @if($copa == 'afa')
      <div class="menu-item col-6 p-3" data-option="general">
        <div class="inner col-12 flex-col-center-center p-2">
          <i class="icon fa-solid fa-list-ul"></i>
          <b class="lbl mt-2">tabla general</b>
        </div>
      </div>
      <div class="menu-item col-6 p-3" data-option="anual">
        <div class="inner col-12 flex-col-center-center p-2">
          <i class="icon fa-solid fa-list-ul"></i>
          <b class="lbl mt-2">tabla anual</b>
        </div>
      </div>
    @endif
    @if($copa == 'sudamericana' || $copa == 'libertadores')
    <div class="menu-item col-6 p-3" data-option="general">
      <div class="inner col-12 flex-col-center-center p-2">
        <i class="icon fa-solid fa-list-ul"></i>
        <b class="lbl mt-2">tabla general</b>
      </div>
    </div>
    @endif
    <div class="menu-item @if($copa == 'sudamericana' || $copa == 'libertadores') col-6 p-3 @else col-8 pt-3 pb-3 pl-5 pr-5 @endif" data-option="historial">
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
      src_copa = 'default/' + copa + (zona != null && zona != '' ? '_' + zona : '') + '.png',
      collapse = true,
      routeName = "{{ Route::currentRouteName() }}",
      title = [copa, getNameFase(copa, fase, zona)].join(' - '),
      group_order = 1
  log('grupos', [src_copa, grupos])

   log('route', ["{{  Route::currentRouteName() }}"])
  
  
  function getLiGrupo(g){
    var li = $('<li class="grupo col-12 flex-col-start-center mb-2">\
                  <div class="bar col-12 flex-row-center-center"></div>\
                  <ul class="equipos col-12 flex-col-start-center p-1 m-0"></ul>\
              </li>'),
        bar = getEl(li, 'bar'),
        ul = getEl(li, 'equipos'),
        prefix = isNaN(g.grupo) ? '' : (g.equipos_position.length == 2 ? 'llave ' : 'grupo ')
    $.each(g.equipos_position, function(i, e){
       li.find('.equipos').append(getLiEquipo(e, i))
    })
    
    bar.html(prefix + g.grupo)

    textColor(bar, 'blanco', g.b.name, 1)

    bg(bar, g.a.rgb)
    
    setCristalRGB(ul, g.a, g.b)

    li.data('grupo', g.grupo)

    return li
  }


  function getLiEquipo(eg, index){
    var li = $('<li class="equipo col-12 flex-col-start-center pl-1 pr-1 pt-3 pb-3 mb-1">\
                <div class="col-12 flex-row-between-center">\
                  <div class="flex-row-start-center">\
                    <img class="escudo">\
                    <b class="name ml-1"></b>\
                  </div>\
                  <img class="jugador">\
                  <img class="h-estado">\
                </div>\
              </li>'),
         escudo = getEl(li, 'escudo'),
          name = getEl(li, 'name'),
         jugador = getEl(li, 'jugador'),
         pos = index + 1

    setImageEquipo(escudo, eg.equipo, 'escudo')
    setImageEquipo(jugador, eg.equipo, 'local')
    name.html(eg.equipo.name)

    setEquipoUI(li, eg.equipo)
    eg.estado = getEstado(eg.estado, copa, fase, zona)
    li.find('.h-estado').prop('src', ASSET + 'default/' + eg.estado + '.png').hide()
    //log('estado', eg.estado)
    li.append(getTable(eg))

    var est = getEl(li, 'estado'),
          icon = est.find('img'),
          src = null
    if(routeName.includes('general')){
      
      
      switch(copa){
        case 'libertadores':
          if(pos <= 32){
            src = 'default/libertadores.png'
          }else if(pos > 32 && pos <= 48){
            src = 'default/sudamericana.png'
          }else{
            src = 'default/eli.png'
          }
        break
        case 'sudamericana':
          if(pos <= 16){
            src = 'default/sudamericana.png'
          }else{
            src = 'default/eli.png'
          }
        break
        case 'afa':
          switch(fase){
            case -2:
              if(pos <= 32){
                src = 'default/afa_a.png'
              }else{
                src = 'default/afa_b.png'
              }
            break
            case -1:
              if(zona == 'A'){
                if(pos <= 16){
                  src = 'default/afa_a.png'
                }else if(pos > 16 && pos <= 24){
                  src = 'default/afa_b.png'
                }else{
                  src = 'default/afa_c.png'
                }
              }else{
                if(pos <= 8){
                  src = 'default/afa_b.png'
                }else{
                  src = 'default/afa_c.png'
                }
              }
            break
           case 0:
              if(zona == 'A'){
                if(pos <= 8){
                  src = 'default/afa_a.png'
                }else{
                  src = 'default/afa_b.png'
                }
              }else if(zona == 'B'){
                if(pos <= 8){
                  src = 'default/afa_b.png'
                }else{
                  src = 'default/afa_c.png'
                }
              }else{
                if(pos <= 8){
                  src = 'default/afa_c.png'
                }else{
                  src = 'default/eli.png'
                }
              }
            break
           case 1:
              if(zona == 'A'){
                if(pos <= 4){
                  src = 'default/afa_a.png'
                }else{
                  src = 'default/afa_b.png'
                }
              }else if(zona == 'B'){
                if(pos <= 8){
                  src = 'default/afa_b.png'
                }else{
                  src = 'default/afa_c.png'
                }
              }else{
                if(pos <= 8){
                  src = 'default/afa_c.png'
                }else{
                  src = 'default/eli.png'
                }
              }
            break
          }
        break
      }
      if(src != null){
        icon.prop('src', ASSET + src)
      }
      
    }

    if(routeName.includes('candidatos')){
      setImageCopa(icon, copa)
      setImageCopa(li.find('.h-estado'), copa)
    }

    li.find('.jugador').data({equipo_id: eg.equipo_id, grupo_id: eg.grupo_id}).click(function(){
      var equipo_id = $(this).data('equipo_id'),
          grupo_id = $(this).data('grupo_id'),
          params = ['home', 'partidos-equipo-grupo', equipo_id, grupo_id],
          url = "{{ route('home') }}"
      nextPage(url, params, true)
    })
    
    return li
  }

  function setMenu(){
    $('#menu-copa').find('.menu-item').each(function(){
      var el = $(this),
          option = el.data('option'),
          a = '',
          b = '',
          extra = null
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
        case 'general':
          a = 'negro'
          b = 'gris'
          extra = 'general'
        break
        case 'anual':
          a = 'azuloscuro'
          b = 'celeste'
          
        break
      case 'candidatos':
          a = 'violeta'
          b = 'rosa'
          
        break

      }
    

      if(a == '' || b == ''){
        return
      }

      //setCristal(getEl($(this), 'inner'), color)

      radialGradient(getEl(el, 'inner'), a, b)

      textColor(getEl(el, 'lbl'), 'blanco', a, .2)

      var btn = getEl(el, 'inner')
      if(extra != null){
        btn.data('extra', extra)
      }
      btn.click(function(){
        var extra = $(this).data('extra')
        var params = []
        if(option == 'goleadores'){
         
          
          nextPage("{{ route('home') }}", ['home', option, copa, zona], true)
          return
        }

        if(option == 'candidatos'){
         
          
          nextPage("{{ route('home') }}", ['home', option, copa, zona], true)
          return
        }

        if(option == 'general'){
          if(copa == 'libertadores' || copa == 'sudamericana'){
            fase = 0
          }
          
        }
        var z = copa == 'afa' ? '-' + zona : ''
        params = ['home', option, copa + z, fase]
        if(option == 'anual'){
          params = ['home', 'anual']
        }
        log('extra', [extra])
        if(extra !== undefined){
          params.push(extra)
        }
        log('params', params)
        nextPage("{{ route('home') }}", params, true)
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
     
      name.html(eq.equipo.name)
      setEquipoUI(campeon, eq.equipo, 1)
    }
    

  }

  function toGroup(dir){
    group_order+= dir
    if(group_order < 1){
      group_order = 1
    }

    if(group_order > grupos.length){
      group_order = grupos.length
    }

    log('order', [group_order])

    ul.find('.grupo').each(function(){
      var li = $(this),
          gp = li.data('grupo')
      if(gp == group_order){
        ul.animate({scrollTop: li.position().top + ul.scrollTop()}, 150)
      }
    })
  }


   $(function(){
    if(routeName.includes('general')){
      title = [copa, 'tabla general'].join(' - ')
    }

    if(routeName.includes('anual')){
      title = [copa, 'tabla anual'].join(' - ')
      src_copa = 'default/escudo_afa.png'
    }
    setBar($('#bar'), src_copa, title, getColorCopa(copa), 'grupos', zona)
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

    if(routeName != 'home.copa'){

      footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
      }))

    }
    if(routeName == 'home.copa'){
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
    }

    footer.append(getBtnFooter('rojo', null, 'fa-solid fa-arrows-up-down', function(){
        if(collapse){
          $('.equipo-table').fadeOut(150)
          $('.h-estado').show()
          $('.jugador').hide()
          $(this).css('color', getRgb(parseColor('verde').rgb))
        }else{
          $('.equipo-table').fadeIn(150)
          $('.h-estado').hide()
          $('.jugador').show()
          $(this).css('color', getRgb(parseColor('rojo').rgb))
        }
        collapse = !collapse
      }))

    if(routeName == 'home.copa'){

      footer.append(getBtnFooter('negro', null, 'fas fa-circle-down', function(){
         toGroup(1)
      }))

      footer.append(getBtnFooter('negro', null, 'fas fa-circle-up', function(){
          toGroup(-1)
        }))
    }

    

    listar()
     preload()
   })
</script>
