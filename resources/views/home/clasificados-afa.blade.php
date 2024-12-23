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
  <div id="libertadores" class="col-12 flex-col-start-center cristal mt-1">
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
  
  
</div>


<script>
   $(function(){

    setBar($('#bar'), 'default/escudo_afa.png', 'clasificacion copas', getColorCopa('argentina'), '', '')
     preload()
   })
</script>
