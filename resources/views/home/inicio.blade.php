
  <style>

    @keyframes estadio {
        from {
            transform: rotate(360deg);
        }
        to {
            transform: rotate(0deg);
        }
    }
    .menu-item{
/*      height: 100px;*/
    }

    #menu{
      height: 63%;
    }

    #footer{
      height: 37%;
      
    }

    .ic{
      font-size: 50px;
    }

    .footer{
      border: solid 2px white;
      background: rgba(255,255,255,.5);
      border-radius: 10px;
      color:white;
      height: 100%;
    }

    .menu-item .inner{
      border: solid 2px white;
      background: rgba(255,255,255,.5);
      border-radius: 10px;
      color:white;
    }

    .icon{
      height: 50px;
    }

    .img-cup{
      display: none;
      height: 80px;
    }

    #fecha .copa{
      font-size: 30px;
    }

    #fecha .fase-fecha{
      font-size: 20px;
    }

    #partido .cup{
      height: 30px;
    }

    #partido .flag{
      height: 30px;
    }

    #partido .header{
      line-height: 1;
    }

    #partido .names{
      font-size: 30px;
      line-height: 1;
      height: 60px;
    }

    #partido .name-vis{
      text-align: right;
    }

    #partido .jugador{
      height: 150px;
      width: 50px;
      object-fit: cover;
    }

    #partido .escudo{
      height: 50px;
    }

    #partido .estadio{
      height: 60px;
      animation: estadio 20s linear infinite;
    }

    #partido .line{
      height: 1px;
      background: white;
    }
  </style>

  <div class="col-12 box-content flex-col-start-center p-2">
    <div id="menu" class="col-12 flex-row-between-start flex-wrap">
      
    </div>
    
    <div id="footer" class="col-12 flex-col-start-center pb-1 pl-1 pr-1 pt-2">
      
          <div id="new-temporada" class="footer col-12 flex-col-center-center">
            <img src="{{ asset('resources/default/conmebol.png') }}" height="60%">
            <h2><b class="title"></b></h2>
          </div>
        
          <div id="sorteo" class="footer col-12 flex-row-around-center flex-wrap">
            <img id="afa-c" class="img-cup m-1" src="{{ asset('resources/default/afa_c.png') }}">
            <img id="afa-b" class="img-cup m-1" src="{{ asset('resources/default/afa_b.png') }}">
            <img id="afa-a" class="img-cup m-1" src="{{ asset('resources/default/afa_a.png') }}">
            <img id="argentina" class="img-cup m-1" src="{{ asset('resources/default/argentina.png') }}">
            <img id="recopa" class="img-cup m-1" src="{{ asset('resources/default/recopa.png') }}">
            <img id="sudamericana" class="img-cup m-1" src="{{ asset('resources/default/sudamericana.png') }}">
            <img id="libertadores" class="img-cup m-1" src="{{ asset('resources/default/libertadores.png') }}">
            <div class="col-12 flex-row-center-center mt-3">
              <h2><b class="title">sorteo</b></h2>
            </div>
          </div>

          <div id="fecha" class="footer col-12 flex-col-center-center">
              <b class="copa"></b>
              <img class="cup mt-2 mb-2" height="150px">
              <b class="fase-fecha"></b>
          </div>

          <div id="partido" class="footer col-12 flex-col-start-center p-2">
            <div class="col-12 flex-row-between-center">
              <img class="cup" src="{{ asset('resources/default/recopa.png') }}">
              <div class="header flex-col-start-center">
                <b class="copa-fase">copa - fase</b>
                <b class="grupo-fecha mt-1"> grupo - fecha</b>
              </div>
              <img class="flag" src="{{ asset('resources/ligas/argentina/bandera.png') }}">
            </div>
            <div class="line col-12 mb-1"></div>
            <div class="names col-12 flex-row-between-start">
              <b class="name-loc">independiente rivadavia</b>
              <b class="name-vis">independiente rivadavia</b>
            </div>
            <div class="col-12 flex-row-between-center">
              <img class="local jugador" src="{{ asset('resources/default/jugador.png') }}" >
              <div class="col-8 flex-col-start-center">
                <div class="col-12 flex-row-between-center">
                  <img class="esc-loc escudo" src="{{ asset('resources/default/escudo.png') }}">
                  <img class="esc-vis escudo" src="{{ asset('resources/default/escudo.png') }}">
                </div>
                  <b class="name-estadio">estadio independiente rivadavia</b>
                  <!-- <div class="col-12 flex-row-between-center"> -->
                    
                    <img class="estadio" src="{{ asset('resources/default/estadio.png') }}">
                    
                  <!-- </div> -->
                  <b class="dia-hora">miercoles - 21 hs.</b>
              </div>
              <img class="visitante jugador" src="{{ asset('resources/default/jugador.png') }}" >
            </div>
          </div>
      
    </div>
  </div>







 <script>
  var INDEX = 0
   function getItem(action){
     var c = $('<div class="col-6 menu-item p-1">\
                <div class="inner col-12 flex-col-start-center p-1">\
                  <img class="icon">\
                  <b class="text"></b>\
                </div>\
              </div>'),
     icon = 'escudo',
     label = 'None',
     a = 'gris',
     bg = 'gris',
     isIcon = false,
     page = null,
     params = ['home'],
     getvars = []
     switch(action){
      case 'ligas':
        icon = 'conmebol.png'
        label = 'Ligas'
        bg = 'amarillo'
        page = 'ligas'
        break
      case 'afa a':
        icon = 'afa_a.png'
        label = 'afa a'
        bg = 'rojo'
        page = 'copa'
        getvars = ['afa-a', '::']
        break
      case 'afa b':
        icon = 'afa_b.png'
        label = 'afa b'
        bg = 'azul'
        page = 'copa'
        getvars = ['afa-b', '::']
        break
      case 'afa c':
        icon = 'afa_c.png'
        label = 'afa c'
        bg = 'verde'
        page = 'copa'
        getvars = ['afa-c', '::']
        break
      case 'argentina':
        icon = 'argentina.png'
        label = 'argentina'
        bg = 'celeste'
        page = 'copa'
        getvars = ['argentina', '::']
        break
      case 'recopa':
        icon = 'recopa.png'
        label = 'recopa'
        bg = 'verde'
        page = 'copa'
        getvars = ['recopa', '::']

        break
      case 'sudamericana':
        icon = 'sudamericana.png'
        label = 'sudamericana'
        bg = 'azul'
        page = 'copa'
        getvars = ['sudamericana', '::']
        break
      case 'libertadores':
        icon = 'libertadores.png'
        label = 'libertadores'
        bg = 'rojo'
        page = 'copa'
        getvars = ['libertadores', '::']
        break
      case 'calendar':
        isIcon = true
        icon = $('<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 448 512">\
                  <path fill="gold" d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l80 0 0 56-80 0 0-56zm0 104l80 0 0 64-80 0 0-64zm128 0l96 0 0 64-96 0 0-64zm144 0l80 0 0 64-80 0 0-64zm80-48l-80 0 0-56 80 0 0 56zm0 160l0 40c0 8.8-7.2 16-16 16l-64 0 0-56 80 0zm-128 0l0 56-96 0 0-56 96 0zm-144 0l0 56-64 0c-8.8 0-16-7.2-16-16l0-40 80 0zM272 248l-96 0 0-56 96 0 0 56z"/>\
                </svg>')
        label = 'calendario'
        bg = 'negro'
        break
      case 'system':
        isIcon = true
        icon = $('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="50" height="50">\
                  <path fill="red" d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7L336 192c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160c0 19.1 3.4 37.5 9.5 54.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c17 6.2 35.4 9.5 54.5 9.5zM80 408a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>\
                </svg>')
        label = 'sistema'
        bg = 'blanco'
        page = 'system'
        break
     }
     if(isIcon){
      c.find('.icon').hide()
      c.find('.icon').after(icon)
     }else{
       c.find('.icon').prop('src', ASSET + 'default/' + icon)
       c.find('.ic').hide()
     }
     
     c.find('.text').html(label)
     setCristal(c.find('.inner'), bg)

     if(page != null){
       params.push(page)
     }

     if(getvars.length != 0){
      $.each(getvars, function(i, gv){
        params.push(gv)
      })
     }
     
    c.data('params', params.join('.'))
     
     c.click(function(){
      var url = "{{ route('home') }}",
          params = $(this).data('params').split('.')
       //url += page
       log('url', [url, params])
       nextPage(url, params, true)
     })
     return c
   }

   function sortear(){
    var copa = MAIN.copas[INDEX]
     sendPostRequest("{{ route('main.sorteo') }}", {copa: copa}, function(data){
        if(data.result == 'OK'){
            INDEX++
            if(INDEX == MAIN.copas.length){
              finSorteo()
              //return
            }else{
              sortear()  
            }
            
          
          
        }else{
          preload()
          Swal.fire('sorteo', data.message, 'error')
        }
      })
   }

   function finSorteo(){
      sendPostRequest("{{ route('main.sorteo') }}", {fin: true}, function(data){
        preload()
        Swal.fire('FIN SORTEO', 'Sorteo finalizado', 'success').then(function(){
          location.reload()
        })
        // swalResponse('sorteo', data, function(){
        //   location.reload()
        // })

      })
   }

   function setPartido(p){
      var footer = $('#partido'),
          header = getEl(footer, 'header'),
          copa = getEl(footer, 'cup'),
          copafase = getEl(footer, 'copa-fase'),
          grupofecha = getEl(footer, 'grupo-fecha'),
          flag = getEl(footer, 'flag'),
          line = getEl(footer, 'line'),
          nameloc = getEl(footer, 'name-loc'),
          namevis = getEl(footer, 'name-vis'),
          local = getEl(footer, 'local'),
          visitante = getEl(footer, 'visitante'),
          escloc = getEl(footer, 'esc-loc'),
          escvis = getEl(footer, 'esc-vis'),
          nameestadio = getEl(footer, 'name-estadio'),
          estadio = getEl(footer, 'estadio'),
          diahora = getEl(footer, 'dia-hora'),
          eloc = p.local,
          evis = p.visitante

      setCristalRGB(footer, eloc.color_a)

      nameloc.html(eloc.name)
      namevis.html(evis.name)

      bg(line, eloc.color_b.rgb)

      copafase.html([p.copa, getNameFase(p.copa, p.fase)].join(' - '))
      if(p.is_final){
        grupofecha.html(getNameFecha(p.fase, p.fecha))
      }else{
        grupofecha.html([(p.is_define ? 'llave ' : 'grupo ') + p.grupo.grupo, getNameFecha(p.fase, p.fecha)].join(' - '))
      }
      

      multiText([copafase, grupofecha, nameestadio, diahora], eloc.color_b, parseALT(eloc, 'c', 'b', 'a'), .05)

      setText(nameloc, eloc.color_b, parseALT(eloc, 'c', 'b', 'a'), .5)
      setText(namevis, evis.color_a, evis.color_b, .5)

      setImageCopa(copa, p.copa)

      setImageFlag(flag, eloc.liga.bandera)

      setImageEquipo(local, eloc, 'local')
      setImageEquipo(escloc, eloc, 'escudo')

      setImageEquipo(visitante, evis, 'local')
      setImageEquipo(escvis, evis, 'escudo')

      setImageEquipo(estadio, eloc, 'estadio')

      header.click(function(){
        nextPage("{{ route('home') }}", ['home', 'copa', p.copa, p.fase, p.grupo_id], true)
      })

      estadio.click(function(){
        nextPage("{{ route('home') }}", ['home', 'estadio', p.id])
      })


   }

   

   $(function(){

      $('.footer').hide()

    switch(MAIN.action){
      case 'INICIO':
        setCristal($('#new-temporada'), 'negro')
        $('#new-temporada .title').html('temporada ' + (MAIN.anio + 1))
        $('#new-temporada').show()
      break
      case 'SORTEO':
        $.each(MAIN.copas, function(i, c){
          $('#' + c).show()
        })
        setCristal($('#sorteo'), 'negro')
        $('#sorteo').show()
      break
      case 'FECHA':
        if(MAIN.iniciada){
          setPartido(MAIN.partido)
          $('#partido').show()
        }else{
          setCristal($('#fecha'), MAIN.colorcopa.a)
          colBorde($('#fecha'), MAIN.colorcopa.b)
          $('#fecha .copa').html(MAIN.namecopa)
          $('#fecha .fase-fecha').html([MAIN.namefase, MAIN.namefecha].join(' - '))
          $('#fecha .cup').prop('src', ASSET + MAIN.imagecopa)
          $('#fecha').show()
        }
        
      break
    }
    

     $('#menu').append(getItem('ligas'))
     $('#menu').append(getItem('afa a'))
     $('#menu').append(getItem('afa b'))
     $('#menu').append(getItem('afa c'))
     $('#menu').append(getItem('argentina'))
     $('#menu').append(getItem('recopa'))
     $('#menu').append(getItem('sudamericana'))
     $('#menu').append(getItem('libertadores'))
     $('#menu').append(getItem('calendar'))
     $('#menu').append(getItem('system'))


     
     $('#new-temporada').click(function(){
       swalSiNo('nueva temporada', '¿iniciar temporada ' + (MAIN.anio + 1) + '?', function(){
        preload(true)
          sendPostRequest("{{ route('main.new-temporada') }}", null, function(data){
            swalResponse('nueva temporada', data, function(){
              location.reload()
            })
          })
       })
     })

     $('#sorteo').click(function(){
       swalSiNo('sorteo copas', '¿sortear ' + (MAIN.copas).join(' - ') + '?', function(){
        preload(true)
          sortear()
       })
     })

     $('#fecha').click(function(){
      preload(true)
       sendPostRequest("{{ route('main.init-fecha') }}", null, function(data){
        
        location.reload()

      })
     })

    preload()
   })
   
 </script>
