<style>
   .anio{
     border-radius: 5px;
   }
    .escudo, .jugador{
      height: 60px;
    }

    .bar-anio{
      border-radius: 10px 10px 0 0;
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



    function getLiAnio(row){
      var li = $('<li class="anio col-12 flex-col-start-center p-1 mb-1 cristal">\
                  <div class="bar-anio col-12 flex-row-center-center p-1 bg-dark">2000</div>\
                  <div class="campeon col-12 flex-row-between-center p-1 mt-1 bg-secondary">\
                    <img class="escudo" src="{{ asset('resources/default/escudo.png') }}">\
                    <div class="flex-col-center-center">\
                      <b class="zona">zona A</b>\
                      <b class="name">independiente medellin</b>\
                    </div>\
                    <img class="jugador"  src="{{ asset('resources/default/jugador.png') }}">\
                  </div>\
                </li>')

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
