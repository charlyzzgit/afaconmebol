<style>
    #menu{
      position: absolute;
      bottom: -1000px;
      left: 0;
      z-index: 1000;
    }

    .flag{
      width: 100%;
      border-radius: 10px;
    }

    .escudo{
      height: 30px;
    }

    .equipo{
      font-size: 25px;
      border-radius: 10px;
    }

    .fase{
      border-radius: 5px;
      overflow: hidden;
      font-size: 30px;
    }

    #liga{
      position: absolute;
      top:50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 10;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/bandera.png') }}" class="icon" height="90%">
      <b class="title ml-2">libertadores</b>
    </div>
    <b class="subtitle">en copmetencia</b>
    <div id="liga" class="flex-row-start-center">
      <img src="{{ asset('resources/default/flag.png') }}" class="mr-2" height="20">
      <b class="name">argentina</b>
    </div>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
  <div id="menu" class="col-12 flex-row-between-start flex-wrap cristal" data-state="off"></div>
</div>


<script>
  var copa = '{{ $copa }}',
      zona = '{{ $zona }}',
      ligas = {!! $ligas !!},
      src_copa = 'default/' + copa + (zona != null && zona != '' ? '_' + zona : '') + '.png'

   log('ligas', [ligas])

   function setFlags(){
     $.each(ligas, function(i, l){
       var el = $('<div class="liga col-6 p-3">\
                    <img class="flag">\
                  </div>')
        setImageFlag(el.find('img'), l.data.bandera)
        el.data('liga_id', l.data.id).click(function(){
          setFases($(this).data('liga_id'))
          $('#menu').data('state', 'off')
          $('#menu').animate({bottom: '-1000px'}, 150)
        })
        $('#menu').append(el)
     })
   }

   function getLiEquipo(e){
     var li = $('<li class="equipo col-12 flex-row-start-center p-1 mb-1">\
                  <img class="escudo" src="{{ asset('resources/default/escudo.png') }}">\
                  <b class="name ml-2">independiente medellin</b>\
                </li>')

     li.find('.name').html(e.name)
     setEquipoUI(li, e, .1)

     return li
   }

   function getLiFase(f){
     var li = $('<li class="fase col-12 flex-col-start-center mb-1 cristal">\
                  <div class="bar col-12 flex-row-center-center p-1 cristal"></div>\
                  <ul class="equipos col-12 flex-col-start-center p-1 m-0"></ul>\
                </li>'),
          bar = getEl(li, 'bar'),
          ul = getEl(li, 'equipos')
         c = getColorFase(f.fase)

     textColor(bar, 'blanco', c.b.name, .1)

     bg(bar, c.a.rgb)
    
     setCristalRGB(ul, c.a, c.b)
     li.find('.bar').html(getNameFase(copa, f.fase, zona))
     $.each(f.equipos, function(i, e){
      li.find('.equipos').append(getLiEquipo(e))
     })

     return li
   }

   function getLiga(liga_id){
     var l = null
     $.each(ligas, function(i, liga){
       if(liga.data.id == liga_id){
         l = liga
       }
     })
     return l
   }

   function setFases(liga_id){
     var liga = getLiga(liga_id),
         ul = $('#list')
     ul.empty()
     $.each(liga.fases, function(i, f){
        ul.append(getLiFase(f))
     })
     setImageFlag($('#liga img'), liga.data.bandera)
     $('#liga .name').html(liga.data.name)
     setText($('#liga .name'), parseColor('blanco'), parseColor('marron'), .1)
   }

   $(function(){
    setBar($('#bar'), src_copa, copa != 'afa' ? copa : [copa, zona].join(' - '), 'marron', 'en competencia', zona)
    setCristalRGB($('#menu'), parseColor('marron'))

    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
        nextPage("{{ route('home') }}", ['home', 'inicio'])
      }))

    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
      }))
    if(isInternacional(copa)){
      footer.append(getBtnFooter('marron', null, 'fa fa-th', function(){
            var state = $('#menu').data('state')
            if(state == 'off'){
              $('#menu').data('state', 'on')
              $('#menu').animate({bottom: 0}, 150)
            }else{
              $('#menu').data('state', 'off')
              $('#menu').animate({bottom: '-1000px'}, 150)
            }
          }))

       setFlags()
     }
     setFases(2)
     preload()
   })
</script>
