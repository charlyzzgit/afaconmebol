<style>

    .mes{
      border-radius: 10px;
      overflow: hidden;
    }
    .mes .bar{
      font-size: 25px;
    }

    .semana{
      border-radius: 10px;
      border:solid thin white;
    }

    .semana .bar{
      font-size: 20px;
    }

    .dia{
      border-radius: 10px;
    }

    .state{
      font-size: 30px;
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

   function getLiDia(d, col){
     var li = $('<li class="dia col-12 flex-row-between-start p-1 mb-1">\
                  <div class="box-fecha col-10 flex-row-start-start flex-wrap p-1">\
                      <div class="col-12 copa-name">copa</div>\
                      <div class="col-3 flex-row-start-center">\
                        <img class="copa" src="{{ asset('resources/default/libertadores.png') }}" height="70">\
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
                <div class="box-inicio col-10 flex-row-start-center p-1"></div>\
                <div class="col-2 flex-col-center-center p-1 h-100">\
                  <i class="state iniciada fa fa-check-circle"></i>\
                  <i class="state procesada fa fa-times-circle mt-3"></i>\
                </div>\
              </li>'),
          copas = d.copas != null ? JSON.parse(d.copas) : []
     li.find('.box-fecha, .box-sorteo, .box-inicio').hide()
     li.find('.iniciada').hide()
     switch(d.action){
       case 'FECHA':
        var copa = copas[0]
        li.find('.copa-name').html(copa)
        setImageCopa(li.find('.copa'), copa == 'afa' ? 'escudo_afa' : copa)
        li.find('.box-fecha').show()
        li.find('.fase').html(getNameFase(copa, d.fase))
        li.find('.fecha').html(getNameFecha(d.fase, d.fecha))
        li.find('.iniciada').show()
        setCristalBorder(li, parseColor(col.a), parseColor(col.b), 1)
       break
       case 'SORTEO':
        $.each(copas, function(i, c){
          let img = $('<img height="70">')
          setImageCopa(img, c == 'afa' ? 'escudo_afa' : c)
          li.find('.copas').append(img)
        })
        li.find('.box-sorteo').show()
        setCristalBorder(li, parseColor(col.b), parseColor(col.a), 1)
       break
      default:
        li.find('.box-inicio').show()
        setCristalBorder(li, parseColor(col.a), parseColor(col.b), 1)
       break
     }

     

     return li
   }

   function getLiSemana(sem, col){
     var li = $('<li class="semana col-12 flex-col-start-center p-1 mb-1">\
                  <div class="bar flex-row-center-center p-1"></div>\
                  <ul class="dias col-12 flex-col-start-center p-1 m-0"></ul>\
                </li>')
      li.find('.bar').html(sem.num + 'ª semana')

      $.each(sem.dias, function(i, d){
        li.find('.dias').append(getLiDia(d, col))
      })

      
      setCristalBorder(li, parseColor(col.a), parseColor(col.b), 1)

      return li
   }

   function getLiMes(mes){
      var li = $('<li class="mes col-12 flex-col-start-center cristal mb-1">\
                  <div class="bar col-12 flex-row-center-center p-1"></div>\
                  <ul class="semanas col-12 flex-col-start-center p-1 m-0"></ul>\
                </li>'),
          col = mes.name != null ? colors.find(item => item.mes === mes.name) : {a:'verdeoscuro', b: 'verde'}
      
      li.find('.bar').html(mes.name != null ? mes.name : 'inicio')
      setGradientUI(li.find('.bar'), col.a, col.b, .1)
      setCristalRGB(li, parseColor(col.a))

      $.each(mes.semanas, function(i, s){
        li.find('.semanas').append(getLiSemana(s, col))
      })

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
