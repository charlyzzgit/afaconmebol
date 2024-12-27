<style>
   .anio{
     border-radius: 5px;
   }
    .escudo, .jugador{
      height: 60px;
    }

    .bar-anio{
      border-radius: 10px 10px 0 0;
      font-size: 20px;
    }

    .campeon{
      border-radius: 0 0 10px 10px;
    }

    .campeon .name{
      font-size: 30px;
    }

    .campeon .zona{
      font-size: 20px;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">copa</b>
    </div>
    <b class="subtitle">historial</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
</div>


<script>
   var copa = '{{ $copa }}',
       src_copa = 'default/' + copa  + '.png',
       title = copa

    if(copa == 'afa'){
      src_copa = 'default/escudo_afa.png'
    }

    function getCampeon(e, anio, zona){
      var cmp = $('<div class="campeon col-12 flex-row-between-center p-1 mt-1">\
                    <img class="escudo">\
                    <div class="flex-col-center-center">\
                      <b class="zona"></b>\
                      <b class="name">independiente medellin</b>\
                    </div>\
                    <img class="jugador">\
                  </div>')
      setEquipoUI(cmp, e, .1)
      cmp.find('.name').html(e.name)
      cmp.data('anio', anio)
      if(copa != 'afa'){
        cmp.find('.zona').hide()
      }else{
        cmp.find('.zona').html('zona ' + zona)
        setText(cmp.find('.zona'), e.color_b, bcColor(e), .1)
        cmp.data('zona', zona)
      }

      cmp.click(function(){
        var anio = parseInt($(this).data('anio')),
            zona = $(this).data('zona')

        nextPage("{{ route('home') }}", ['home', 'estadisticas-historial', anio, copa, zona], true)
      })
      

      return cmp
    }

    function getLiAnio(row){
      var li = $('<li class="anio col-12 flex-col-start-center p-1 mb-1">\
                  <div class="bar-anio col-12 flex-row-center-center p-1"></div>\
                </li>'),
          col = getColorCopa(copa, true)
      setCristal(li, col.a, col.b)
      li.find('.bar-anio').html(row.anio)
      setText(li.find('.bar-anio'), parseColor('blanco'), parseColor(col.b))
      setGradientDuo(li.find('.bar-anio'), parseColor(col.a), parseColor(col.b))
      $.each(row.equipos, function(i, e){
        li.append(getCampeon(e.equipo, row.anio, e.zona))
      })
      

      
      return li
    }

    

    function listar(order){
      $('#list').empty()
        preload(true)
        var params = {copa:copa, order: order}
        
        sendPostRequest("{{ route('home.historialJSON') }}", params, function(data){
          log('anios', [data])
          $.each(data, function(i, row){
            $('#list').append(getLiAnio(row))
           })
           preload()
        })
      
    }
   $(function(){

    setBar($('#bar'), src_copa, title, 'verdeoscuro', 'historial', '')

    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
      }))

    footer.append(getBtnFooter('verde', null, 'fas fa-circle-down', function(){
        
    }))

    footer.append(getBtnFooter('verde', null, 'fas fa-circle-up', function(){
        
    }))
     listar('desc')
   })
</script>
