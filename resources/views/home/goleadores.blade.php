<style>
    .goleador{
      border-radius: 10px;
      border:solid thin white;
      font-size: 25px;
    }

    .goleador, .jugador, .goleador, .escudo{
      height: 40px;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">{{ $copa }}</b>
    </div>
    <b class="subtitle">goleadores</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 mt-2"></ul>
</div>


<script>
  var goleadores = {!! $goleadores !!},
      copa = '{{ $copa }}',
      zona = '{{ isset($zona) ? $zona : null }}',
      ul = $('#list'),
      src_copa = 'default/' + copa + '.png'

  log('goleadores', [goleadores])
  function getLiGoleador(g){
    var li = $('<li class="goleador col-12 flex-row-between-center p-2 mb-1">\
                  <div class="col-10 flex-row-start-center">\
                    <img class="escudo">\
                    <img class="jugador ml-1">\
                    <b class="name ml-1"></b>\
                  </div>\
                  <b class="goles"></b>\
                  </div>\
              </li>'),
        equipo = g.equipo
    li.find('.name').html(equipo.name)
    li.find('.goles').html(g.goles)
    setImageEquipo(li.find('.escudo'), equipo, 'escudo')
    setImageEquipo(li.find('.jugador'), equipo, 'local')
    setEquipoUI(li, equipo)
    
    
    return li
  }

  function listar(){
    ul.empty()
    $.each(goleadores, function(i, g){
      ul.append(getLiGoleador(g))
    })
    preload()
  }

  $(function(){
      
      footer.empty()
      footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
        nextPage("{{ route('home') }}", ['home', 'inicio'])
      }))
      footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
      }))
    setBar($('#bar'), src_copa, copa, 'celeste', 'goleadores')
  setCristal(ul, 'celeste')
     listar()
   })
</script>