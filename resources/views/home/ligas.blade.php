<style>
    .liga{
      border-radius: 10px;
      border:solid thin white;
      font-size: 30px;
    }

    .flag{
      height: 40px;
    }
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
</div>

<script>
  var ul = $('#list'),
      ligas = {!! $ligas !!}
  log('ligas', [ligas], true)
  function getLiLiga(liga){
    var li = $('<li class="liga col-12 flex-row-start-center p-2 mb-1">\
                <img class="flag">\
                <b class="name ml-3"></b>\
              </li>')
    li.find('.name').html(liga.name)
    li.find('.flag').prop('src', ASSET + liga.bandera)
    setEquipoUI(li, liga)
    li.data('id', liga.id).click(function(){
      var id = $(this).data('id')
      nextPage("{{ route('home') }}", ['home', 'equipos', id], true)
    })
    return li
  }

  function listar(){
    ul.empty()
    $.each(ligas, function(i, l){
      ul.append(getLiLiga(l))
    })
    preload()
  }


   $(function(){
    footer.empty()
      footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
        nextPage("{{ route('home') }}", ['home', 'inicio'])
      }))
    setBar($('#bar'), 'default/conmebol.png', 'ligas', 'amarillo')

    listar()
     
   })
</script>
