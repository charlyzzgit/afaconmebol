<style>
    .jugador{
      width: 100px;
       height: 250px;
       object-fit: cover;

    }

    .rounded{
      border-radius: 10px !important;
    }

    .escudo{
      height: 100px;
    }

    .estadio{
      height: 100px;
    }

    .name{
      font-size: 40px;
      font-weight: bold;
     
    }

    .copa{
      height: 150px;
    }

    #copas{
      height: 330px;
      
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
  <div class="col-12 flex-row-between-center mt-2 p-2 rounded cristal">
    <img id="local" class="jugador" src="{{ asset('resources/default/jugador.png') }}">
    <div class="flex-col-center-center">
      <img id="escudo" class="escudo" src="{{ asset('resources/default/escudo.png') }}">
      <img id="estadio" class="estadio mt-2" src="{{ asset('resources/default/estadio.png') }}">
    </div>
    <img id="visitante" class="jugador" src="{{ asset('resources/default/jugador.png') }}">
  </div>
  <div id="equipo" class="col-12 flex-row-center-center mt-2 rounded cristal">
    <b class="name"></b>
  </div>
  <div id="copas" class="col-12 flex-row-around-center flex-wrap p-2 mt-2 rounded cristal">
    @if($equipo->liga_id == 2)
    <div class="col-12 flex-row-center-center">
     <img id="afa" class="copa mr-2" src="{{ asset('resources/default/escudo_afa.png') }}" data-copa="afa">
     <img id="argentina" class="copa ml-2" src="{{ asset('resources/default/argentina.png') }}" data-copa="argentina">
    </div>
    @endif
     <img id="sudamericana" class="copa" src="{{ asset('resources/default/sudamericana.png') }}" data-copa="sudamericana">
     <img id="recopa" class="copa" src="{{ asset('resources/default/recopa.png') }}" data-copa="recopa">
     <img id="libertadores" class="copa" src="{{ asset('resources/default/libertadores.png') }}" data-copa="libertadores">

  </div>
</div>


<script>
  var equipo = {!! $equipo !!}

  log('equipo', [equipo])
   $(function(){

    setCristalBorder($('.rounded'), equipo.color_a, equipo.color_b, 1)

    setImageEquipo($('#local'), equipo, 'local')
    setImageEquipo($('#visitante'), equipo, 'visitante')
    setImageEquipo($('#escudo'), equipo, 'escudo')
    setImageEquipo($('#estadio'), equipo, 'estadio')

    $('.name').html(equipo.name)

    setEquipoUI($('#equipo'), equipo, 1)

    setBar($('#bar'), equipo.directory + 'escudo.png', equipo.name, equipo.color_a.name, 'historial', '')
    setText($('#bar .title, #bar .subtitle'), equipo.color_b, bcColor(equipo), .1)

    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
    }))

    $('.copa').click(function(){
      var copa = $(this).data('copa')
      nextPage("{{ route('home') }}", ['home', 'historial-equipo', equipo.id, copa], true)
    })

      preload()
   })
</script>
