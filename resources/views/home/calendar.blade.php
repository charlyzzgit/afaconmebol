<style>
    
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">calendario</b>
    </div>
    <b class="subtitle">fases</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0">
    <li class="mes col-12 flex-col-start-center cristal">
      <div class="bar flex-row-center-center p-1">
        mes
      </div>
      <ul class="semanas col-12 flex-col-start-center p-1 m-0">
        <li class="semana col-12 flex-col-start-center p-1">
          <div class="bar flex-row-center-center p-1">
            semana 1
          </div>
          <ul class="dias col-12 flex-col-start-center p-1 m-0">
            <li class="dia col-12 flex-col-start-center p-1">
              <div class="action flex-row-center-center">fecha</div>
              <div class="copas flex-row-center-center">
                @for($i = 0; $i < 5; $i++)
                  <img src="{{ asset('default/libertadores.png') }}" height="70">
                @endfor
              </div>
              <div class="fase-fecha flex-row-center-center">fase: 5 - 1ª fecha</div>
              <div class="state col-12 flex-row-end-center">
                <i class="fa fa-check"></i>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </li>
  </ul>
</div>


<script>
   var meses = {!! $meses !!}

   log('meses', [meses])
   $(function(){
    setBar($('#bar'), 'default/conmebol.png', 'calendario', 'amarillo', '', '')
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
     preload()
   })
</script>
