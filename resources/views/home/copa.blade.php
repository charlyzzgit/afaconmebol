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

    #keys{
      position: absolute;
      top: 0;
      left:100%;
      height: 100%;
      z-index: 1000;
      background: linear-gradient(90deg, rgb(255,0,0), rgb(0,0,255), rgb(255,0,0));
    }

    .key{
      position: absolute;
      border:solid 3px white;
      border-left: none;
      width: 67px;
      z-index: -1;
    }

    .key-16{
      height: 25px;
      left: 30px;
    }

    .key-8{
      height: 50px;
      left: 95px;
      width: 66px;
    }

    .key-4{
      height: 93px;
      left: 160px;
      width: 65px;
    }

    .key-2{
      height: 182px;
      left: 225px;
      width: 65px;
    }

    .key-1{
      top:50%;
      transform: translateY(-50%);
      height: 350px;
      left: 290px;
      width: 65px;
    }

    #copa{
      position: absolute;
      top:50%;
      right: 70px;
      height: 130px;
      transform: translateY(-50%);
      z-index: 0;
    }

    #campeon{
      position: absolute;
      top:50%;
      left: 50%;
      height: 60px;
      transform: translate(-50%, -50%);
      z-index: 2;
    }

    #fases{
      position: absolute;
      bottom: -100%;
      left: 0;
      z-index: 1000000;
    }
    .fase{
      font-size: 40px;
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
  <div id="keys" class="col-12 flex-row-between-center" data-state="closed">
    <div class="k-16 col-2 flex-col-center-center p-1">
      @for($i = 0; $i < 32; $i++)
        <img src="{{ asset('resources/default/escudo.png') }}" height="18"  style="margin: 2px 0;">
      @endfor
    </div>
    <div class="k-8 col-2 flex-col-center-center p-1">
      @for($i = 0; $i < 16; $i++)
        <img src="{{ asset('resources/default/escudo.png') }}" height="18"  style="margin: 13px 0; transform:scale(1.25);">
      @endfor
    </div>
    <div class="k-4 col-2 flex-col-center-center p-1">
      @for($i = 0; $i < 8; $i++)
        <img src="{{ asset('resources/default/escudo.png') }}" height="18"  style="margin: 35px 0; transform:scale(1.5);">
      @endfor
    </div>
    <div class="k-2 col-2 flex-col-center-center p-1">
      @for($i = 0; $i < 4; $i++)
        <img src="{{ asset('resources/default/escudo.png') }}" height="18"  style="margin: 80px 0;transform:scale(1.75);">
      @endfor
    </div>
    <div class="k-1 col-2 flex-col-center-center p-1">
      @for($i = 0; $i < 2; $i++)
        <img src="{{ asset('resources/default/escudo.png') }}" height="18"  style="margin: 165px 0; transform:scale(2);">
      @endfor
    </div>
    <div class="k-0 col-2 flex-col-center-center p-1">
      <img id="campeon" src="{{ asset('resources/default/escudo.png') }}" >
      <img id="copa" src="{{ asset('resources/default/libertadores.png') }}">
    </div>
    @php 
      $top = 20;
    @endphp
    @for($i = 0; $i < 16; $i++)
      <div class="key key-16" style="top: {{ $top }}px;"></div>
      @php 
        $top += 44;
      @endphp
    @endfor

    @php 
      $top = 30;
    @endphp
    @for($i = 0; $i < 8; $i++)
      <div class="key key-8" style="top: {{ $top }}px;"></div>
      @php 
        $top += 88;
      @endphp
    @endfor

    @php 
      $top = 52;
    @endphp
    @for($i = 0; $i < 4; $i++)
      <div class="key key-4" style="top: {{ $top }}px;"></div>
      @php 
        $top += 176;
      @endphp
    @endfor

    @php 
      $top = 90;
    @endphp
    @for($i = 0; $i < 2; $i++)
      <div class="key key-2" style="top: {{ $top }}px;"></div>
      @php 
        $top += 355;
      @endphp
    @endfor

    <div class="key key-1"></div>
    
  </div>
  <div id="fases" class="col-12 flex-col-start-center cristal" data-state="closed">
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
      group_order = 1,
      WE = null,
      KEYS = null,
      CAMPEON = getCampeon(),
      colorCopa = getColorCopa(copa, true)
  @isset($we)
      WE = {!! $we !!}
  @endisset
  @isset($keys)
      KEYS = {!! $keys !!}
  @endisset
  log('we', [WE])
  log('keys', [KEYS])
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

  function getLiFase(f){
    var fs = $('<div class="fase col-12 flex-row-center-center"></div>'),
        name = getNameFase(copa, f, zona),
        col = getColorFase(f)
    fs.html(name)
    textColor(fs, 'blanco', col.a.name, 1)
    setGradientDuo(fs, col.a, col.b)
    fs.data('fase', f).click(function(){
      var f = $(this).data('fase'),
          url = "{{ route('home') }}",
          copazona = copa == 'afa' ? [copa, zona].join('-') : copa,
          params = ['home', 'copa', copazona, f]
       
       nextPage(url, params, true)
    })

    return fs

  }

  function fasesList(){
    var desde = 0
    switch(copa){
      case 'afa':
        desde = zona == 'a' ? -2: (zona == 'b' ? -1 : 0)
      break
      case 'argentina':
        desde = 1
      break
      case 'sudamericana': case 'libertadores':
        desde = 0
      break
      default:
        desde = 5
      break
    }
    for(var f = 5; f >= desde; f--){
      if(!(copa == 'afa' && (f == 2 || f == 3) && zona == 'a')){
        $('#fases').append(getLiFase(f))
      }
      
    }
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
         pos = index !== undefined ? index + 1 : 0

    setImageEquipo(escudo, eg.equipo, 'escudo')
    setImageEquipo(jugador, eg.equipo, 'local')
    name.html(eg.equipo.name)

    setEquipoUI(li, eg.equipo)
    eg.estado = getEstado(eg.estado, copa, fase, zona)
    li.find('.h-estado').prop('src', ASSET + 'default/' + eg.estado + '.png').hide()
    //log('estado', eg.estado)
    if(pos != 0){
      li.append(getTable(eg))
    }

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
      if(index !== undefined){
        if(src != null){
          icon.prop('src', ASSET + src)
        }
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

  function getKeysFase(f){
    var ks = null
    $.each(KEYS, function(i, k){
      if(k.fase == f){
        //if(k.keys.length != 0){
          ks = k.keys
        //}
        
      }
    })
    if(copa == 'afa' && f == 2 && zona == 'b'){
      var aux = []
      $.each(ks, function(j, r){
        aux.push([
        {
          name: WE[j].equipo.name,
          directory: WE[j].equipo.directory + 'escudo.png'
         },
        {
          name: null,
          directory: null
         }
        ])
        aux.push(r)
      })
       ks = aux
       log('llave', [ks])
    }
   
    return ks
  }

  

  function setLlavero(){
    if(KEYS == null){
      return
    }
    radialGradient($('#keys'),colorCopa.a, colorCopa.b)
    //setBackDuo($('#keys'), parseColor(colorCopa.b), parseColor(colorCopa.a), true)
     for(var f = 1; f <= 5; f++){
      var keyName = null,
          keys = getKeysFase(f)
          
        switch(f){
          case 1:
            keyName = '.k-16'
          break
          case 2:
            keyName = '.k-8'
          break
          case 3:
            keyName = '.k-4'
          break
          case 4:
            keyName = '.k-2'
          break
          default:
            keyName = '.k-1'
          break
        }
        if(keys != null){
          var n = 1
          $.each(keys, function(i, key){
            let e = $(keyName + ' img:nth-of-type(' + n + ')')
            if(key[0].directory != null){
              e.prop('src', ASSET + key[0].directory)
            }else{
              e.css('visibility', 'hidden')
            }
            
            n++
            e = $(keyName + ' img:nth-of-type(' + n + ')')
            if(key[1].directory != null){
              e.prop('src', ASSET + key[1].directory)
            }else{
              e.css('visibility', 'hidden')
            }
            n++
          })
        }else{
          $(keyName).find('img').css('visibility', 'hidden')
          switch(f){
            case 1: 
              $('.key-16').hide()
            break
            case 2: 
              $('.key-8').hide()
            break
            case 3: 
              $('.key-4').hide()
            break
          }
        }

     }

     if(copa == 'afa' && zona == 'a'){
      $('.k-16, .k-8, .k-4').find('img').css('visibility', 'hidden')
      $('.key-16, .key-8, .key-4').hide()
     }

     if(copa == 'recopa'){
      $('.k-16, .k-8, .k-4, .k-2').find('img').css('visibility', 'hidden')
      $('.key-16, .key-8, .key-4, .key-2').hide()
     }

     if(CAMPEON != null){
       setImageEquipo($('#campeon'), CAMPEON.equipo, 'escudo')
     }

  }

  function listar(){
    ul.empty()
    $.each(grupos, function(i, g){
      if(WE != null && fase == 2){
        ul.append(getLiEquipo(WE[i]))
      }
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

      p.click(function(){
        nextPage("{{ route('home') }}", ['home', 'estadisticas', copa, zona], true)
      })
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

  function getCampeon(){
    var cmp = null
    if(fase == 5){
      if(grupos.length != 0){
        if(grupos[0].equipos_position[0].j != 0){
          cmp = grupos[0].equipos_position[0]
        }
      }
    }
    return cmp
  }


   $(function(){
    if(routeName.includes('general')){
      title = [copa, 'tabla general'].join(' - ')
    }

    //$('#keys').css({ background: 'linear-gradient(90deg, ' + ['rgb(' + parseColor(colorCopa.a).rgb + ')', 'rgb(' + parseColor(colorCopa.b).rgb + ')', 'rgb(' + parseColor(colorCopa.a).rgb + ')'].join(',')})
    

    setLlavero()
    if(routeName.includes('anual')){
      title = [copa, 'tabla anual'].join(' - ')
      src_copa = 'default/escudo_afa.png'
    }
    setBar($('#bar'), src_copa, title, getColorCopa(copa), 'grupos', zona)
    setMenu()
    if(CAMPEON != null){
      setPodio(CAMPEON)
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

      footer.append(getBtnFooter('negro', null, 'fas fa-circle-right', function(){
          var k = $('#fases'),
              position = 0
          if(k.data('state') == 'closed'){
            k.data('state', 'open')
            position = 0
          }else{
            k.data('state', 'closed')
            position = -100
          }
          k.animate({bottom: position + '%'}, 150)
        }))


      footer.append(getBtnFooter('negro', null, 'fas fa-sitemap', function(){
          var k = $('#keys'),
              position = 0
          if(k.data('state') == 'closed'){
            k.data('state', 'open')
            position = 0
          }else{
            k.data('state', 'closed')
            position = 100
          }
          k.animate({left: position + '%'}, 150)
        }))
    }

    setImageCopa($('#copa'), copa == 'afa' ? [copa, zona].join('_') : copa)

    

    listar()
    fasesList()
     preload()
   })
</script>
