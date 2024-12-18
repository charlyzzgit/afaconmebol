<style>
    .mes .bar{
      font-size: 25px;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">calendario</b>
    </div>
    <b class="subtitle">fases</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
</div>


<script>
   var meses = {!! $meses !!},
       colors = [
          {mes: 'marzo', a: 'violeta', b: 'rosa'},
          {mes: 'abril', a: 'marron', b: 'marronclaro'},
          {mes: 'mayo', a: 'amarillo', b: 'crema'},
          {mes: 'junio', a: 'verdeclaro', b: 'amarillo'},
          {mes: 'julio', a: 'celeste', b: 'cielo'},
          {mes: 'agosto', a: 'naranja', b: 'amarillo'},
          {mes: 'septiembre', a: 'marronclaro', b: 'amarillo'},
          {mes: 'octubre', a: 'verde', b: 'verdeclaro'},
          {mes: 'noviembre', a: 'azul', b: 'celeste'},
          {mes: 'diciembre', a: 'rojo', b: 'naranja'}
       ]

   log('meses', [meses])

   function getLiDia(d){
     var li = $('<li class="dia col-12 flex-row-between-start p-1">\
                  <div class="col-10 flex-row-start-start flex-wrap p-1">\
                      <div class="col-12 copa">copa</div>\
                      <div class="col-3 flex-row-start-center">\
                        <img src="{{ asset('resources/default/libertadores.png') }}" height="70">\
                      </div>\
                      <div class="box-fecha col-9 flex-col-start-start">\
                        <b class="fase">fase</b>\
                        <b class="fecha">fecha</b>\
                      </div>\
                  </div>\
                  <div class="box-sorteo col-10 flex-col-start-start p-1">\
                    <b>sorteo</b>\
                    <div class="copas col-12 flex-row-around-center"></div>\
                  </div>\
                <div class="box-inicio col-10 flex-row-start-center p-1">\
                <div class="col-2 flex-col-center-center p-1">\
                  <i class="fa fa-check"></i>\
                  <i class="fa fa-check"></i>\
                </div>\
              </li>')

     return li
   }

   function getLiSemana(sem){
     var li = $('<li class="semana col-12 flex-col-start-center p-1">\
                  <div class="bar flex-row-center-center p-1"></div>\
                  <ul class="dias col-12 flex-col-start-center p-1 m-0"></ul>\
                </li>')

      return li
   }

   function getLiMes(mes){
      var li = $('<li class="mes col-12 flex-col-start-center cristal">\
                  <div class="bar col-12 flex-row-center-center p-1"></div>\
                  <ul class="semanas col-12 flex-col-start-center p-1 m-0"></ul>\
                </li>'),
          col = mes.name != null ? colors.find(item => item.mes === mes.name) : {a:'verdeoscuro', b: 'verde'}
      
      li.find('.bar').html(mes.name != null ? mes.name : 'inicio')
      setGradientUI(li.find('.bar'), col.a, col.b, .1)

      return li
   }

   function listar(){
      $.each(meses, function(i, m){
        $('#list').append(getLiMes(m))
      })
      preload()
   }
   
   $(function(){
    setBar($('#bar'), 'default/conmebol.png', 'calendario', 'amarillo', '', '')
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    listar()
     
   })
</script>
