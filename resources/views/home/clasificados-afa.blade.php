<style>
    #libertadores, #sudamericana{
      border-radius: 10px;
      overflow: hidden;
    }

    .bar-copa{
      font-size: 20px;
    }

    .name{
      font-size: 25px;
    }

    .medio{
      font-size: 20px;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/escudo_afa.png') }}" class="icon" height="90%">
      <b class="title ml-2">clasificacion copas</b>
    </div>
    <b class="subtitle"></b>
  </div>
  <div id="libertadores" class="col-12 flex-col-start-center mt-1">
    <div class="bar-copa col-12 flex-row-start-center pl-2 pr-2">
      <img src="{{ asset('resources/default/libertadores.png') }}" height="30">
      <b class="ml-2 mt-1">libertadores</b>
    </div>
    <ul  class="col-12 flex-col-start-center p-1 m-0">
      <li class="equipo col-12 flex-row-between-center p-1 mb-1">
        <div class="flex-row-start-center">
          <img src="{{ asset('resources/default/escudo.png') }}" height="30">
          <b class="name ml-1">san martin san juan</b>
        </div>
        <div class="medio">
          semifinalista A
        </div>
      </li>
    </ul>
  </div>
  <div id="sudamericana" class="col-12 flex-col-start-center mt-1">
      <div class="bar-copa col-12 flex-row-start-center pl-2 pr-2">
        <img src="{{ asset('resources/default/libertadores.png') }}" height="30">
        <b class="ml-2 mt-1">sudamericana</b>
      </div>
      <ul  class="col-12 flex-col-start-center p-1 m-0">
        <li class="equipo col-12 flex-row-between-center p-1 mb-1">
          <div class="flex-row-start-center">
            <img src="{{ asset('resources/default/escudo.png') }}" height="30">
            <b class="name ml-1">san martin san juan</b>
          </div>
          <div class="medio">
            semifinalista A
          </div>
        </li>
      </ul>
    </div>
  
</div>


<script>
   var equipos = {!! $equipos !!}
   log('equipos', [equipos])

   function setCopa(copa){
    var col = getColorCopa(copa, true),
        a = parseColor(col.a),
        b = parseColor(col.b),
        box = $('#' + copa),
        eqs = filter(copa)
     setCristalRGB(box, a)
     
     setGradientDuo(box.find('.bar-copa'), a, b)
     setText(box.find('.bar-copa'), parseColor('blanco'), b, .1)
     box.find('ul').empty()
     $.each(eqs, function(i, e){
      box.find('ul').append(getLiEquipo(e))
     })
   }

   function filter(copa){
      var desde = copa == 'libertadores' ? 0 : 8,
          hasta = copa == 'libertadores' ? 8 : equipos.length,
          eqs = []
      for(var i = desde; i < hasta; i++){
        eqs.push(equipos[i])
      }

      return eqs

   }

   function getLiEquipo(data){
    var li = $('<li class="equipo col-12 flex-row-between-center p-1 mb-1">\
                <div class="flex-row-start-center">\
                  <img class="escudo" height="30">\
                  <b class="name ml-1"></b>\
                </div>\
                <div class="medio"></div>\
              </li>')
        e = data.data
    li.find('.name').html(e.name)
    li.find('.medio').html(data.medio)
    setEquipoUI(li, e, .1)
    setText(li.find('.medio'), e.color_b, bcColor(e), .1)
    setImageEquipo(li.find('.escudo'), e, 'escudo')

    return li
   }
   $(function(){

    setBar($('#bar'), 'default/escudo_afa.png', 'clasificacion copas', getColorCopa('argentina'), '', '')

    setCopa('libertadores')
    setCopa('sudamericana')
     preload()
   })
</script>
