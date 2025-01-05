<style>
    #equipo{
      border-radius: 10px;
      background: white;
      font-size: 30px;
    }

    #equipo img{
      height: 40px;
    }

    #list{
      height: calc(100% - 100px);
    }

    .balance{
      height: 50px;
      background: white;
    }

    .li-anio{
      border-radius: 10px;
    }

    .li-anio .data, .copa .data{
      font-size: 25px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 100;

    }

    .percent{
      font-size: 20px;
    }

    .li-anio .balance{
      border-radius: 5px;
    }

    #balance-anual{
      position: absolute;
      bottom:-1000px;
      left: 0;
      z-index: 10000000000;
    }

    #balance-anual .cup{
      font-size: 25px;
    }

    .copa{
      border-radius: 10px;
    }

    .balances img{
      height: 90px;
    }

    .menu-bar{
      font-size: 25px;
    }

    .border-balance{
      border-radius: 20px;
      border:solid thin white;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">balance</b>
    </div>
    <b class="subtitle">fases</b>
  </div>
  <div id="equipo" class="col-12 flex-row-between-center p-1 mt-2">
    <img class="escudo" src="{{ asset('resources/default/escudo.png') }}">
    <b class="name">{{ $equipo->name }}</b>
    <img class="jugador" src="{{ asset('resources/default/jugador.png') }}">
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 mt-2 cristal">
    
    <li class="anio col-12 flex-row-center-center">
      <div class="balance" style="width: 50%"></div>
      <div class="name">2000</div>
    </li>
    
  </ul>
  <div id="balance-anual" class="col-12 flex-col-start-center">
    <div class="menu-bar col-12 flex-row-between-center pt-1 pb-1 pl-2 pr-2 bg-warning">
      <b class="lbl">balance 2000</b>
      <i class="fas fa-times"></i>
    </div>
    <ul class="col-12 flex-col-start-center m-0 p-2">
      <li class="copa col-12 flex-row-center-center">
        <div class="data col-12 flex-row-between-center pl-3 pr-3">
          <img src="{{ asset('resources/default/libertadores.png') }}" height="40px">
          <b class="cup">libertadores</b>
          <b class="result">eliminado en diecieseisavos de final</b>
        </div>
        <div class="balance"></div>
      </li>
    </ul>
    <div class="balances col-12 flex-row-between-start flex-wrap p-1">
      <div class="b-nacional col-6 p-1">
        <div class="col-12 flex-col-start-center border-balance p-2">
          <img src="{{ asset('resources/default/escudo_afa.png') }}">
          <b>nacional</b>
          <b class="status">10%</b>
        </div>
      </div>
      <div class="b-internacional col-6 p-1">
        <div class="col-12 flex-col-start-center border-balance p-2">
          <img src="{{ asset('resources/default/conmebol.png') }}">
          <b>internacional</b>
          <b class="status">10%</b>
        </div>
      </div>
      <div class="b-general col-12 p-1">
        <div class="col-12 flex-col-start-center border-balance p-2">
          <img src="{{ asset('resources/default/logo.png') }}">
          <b>general</b>
          <b class="status">10%</b>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
    var anios = {!! $anios !!},
        equipo = {!! $equipo !!}

    log('años', [anios])


  function getLiAnio(a){
    var li = $('<li class="li-anio col-12 flex-row-start-center mb-1 p-1 cristal">\
                 <div class="data col-12 flex-row-between-center pl-3 pr-3">\
                  <b class="anio"></b>\
                  <b class="percent"></b>\
                  <b class="result"></b>\
                </div>\
                <div class="balance"></div>\
              </li>')
    li.find('.balance').css({width: a.balance + '%'})
    if(a.balance < 100){
      li.find('.balance').css({borderRadius: '5px 0 0 5px'})
    }else{
      li.find('.balance').css({borderRadius: '5px'})
    }
    li.find('.anio').html(a.anio)
    li.find('.percent').html(a.balance.toFixed(2) + ' %')
    li.find('.result').html(a.balance_general)

     setCristalBorder(li, equipo.color_a, equipo.color_b, 1)

     setText(li.find('.data'), equipo.color_b, bcColor(equipo), .1)

     setBgGradient(li.find('.balance'), equipo.color_a.rgb, equipo.color_b.rgb, equipo.color_c.rgb)

     li.data('anio', a.anio).click(function(){
      var anio = $(this).data('anio')
      showAnio(anio)
     })
    return li
  }


  function listar(){
    $('#list').empty()
    $.each(anios, function(i, a){
      $('#list').append(getLiAnio(a))
    })
    preload()
  }

  function getLiCopa(c){
    var li = $('<li class="copa col-12 flex-row-start-center p-1 mb-1">\
                  <div class="data col-12 flex-row-between-center pl-3 pr-3">\
                    <div class="col-1 flex-row-center-center">\
                      <img height="40px">\
                    </div>\
                    <div class="col-4 flex-row-start-center pl-2">\
                      <b class="cup"></b>\
                    </div>\
                    <div class="col-7 flex-row-end-center">\
                      <b class="fase"></b>\
                    </div>\
                  </div>\
                  <div class="balance"></div>\
                </li>'),
        col = getColorCopa(c.copa, true),
          a = parseColor(col.a),
          b = parseColor(col.b)

    setCristalBorder(li, a, b, 1)

    setText(li.find('.data'), parseColor('blanco'), b, .1)

    

    li.find('.balance').css({width: parseFloat(c.total) + '%'})
    //log('w', [parseFloat(c.total), li.find('.balance').css('width')])
    if(c.total < 100){
      li.find('.balance').css({borderRadius: '5px 0 0 5px'})
    }else{
      li.find('.balance').css({borderRadius: '5px'})
    }

    setBgGradient(li.find('.balance'), a.rgb, b.rgb, b.rgb)

    li.find('.cup').html(c.copa)
    li.find('.fase').css({fontSize: '14px'}).html(c.instancia)
    setImageCopa(li.find('img'), c.copa == 'afa' ? 'escudo_afa' : c.copa)

    return li
  }

  function getAnio(anio){
    var c = null 
    $.each(anios, function(i, a){
      if(a.anio == anio){
        c = a
      }
    })

    return c
  }

  function showAnio(anio){
    var a = getAnio(anio),
        list = $('#balance-anual ul')

    list.empty()
    $.each(a.copas, function(i, c){
      list.append(getLiCopa(c))
    })

    $('#balance-anual').animate({bottom:0}, 150)

    $('.menu-bar .lbl').html('balance ' + anio)

    $('.b-nacional .status').html(a.nacional + '% - ' + a.balance_nacional)
    $('.b-internacional .status').html(a.internacional + '% - ' + a.balance_internacional)
    $('.b-general .status').html(a.balance + '% - ' + a.balance_general)

  }


   $(function(){
    setBar($('#bar'), equipo.directory + 'escudo.png', equipo.name, equipo.color_a.name, 'balance general', '')
    setText($('#bar .title, #bar .subtitle'), equipo.color_b, bcColor(equipo), .1)

    setEquipoUI($('#equipo'), equipo, 1)

    setCristalBorder($('#list'), equipo.color_a, equipo.color_b, 1)

    setBgGradient($('#balance-anual'), equipo.color_a.rgb, equipo.color_b.rgb, equipo.color_c.rgb, true)

    setBgGradient($('.menu-bar'), equipo.color_a.rgb, equipo.color_b.rgb, equipo.color_c.rgb)
     setText($('.menu-bar'), equipo.color_b, bcColor(equipo), .1)

    $('.menu-bar i').click(function(){
      $('#balance-anual').animate({bottom:'-1000px'}, 150)
    })

    

    radialGradient($('.b-nacional div'), 'azul', 'celeste')
    setText($('.b-nacional'), parseColor('blanco'), parseColor('celeste'), .1)

    radialGradient($('.b-internacional div'), 'verde', 'verdeclaro')
    setText($('.b-internacional'), parseColor('blanco'), parseColor('verdeclaro'), .1)

    radialGradient($('.b-general div'), 'rojo', 'naranja')
    setText($('.b-general'), parseColor('blanco'), parseColor('naranja'), .1)



    listar()

    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
    }))

    

      
   })
</script>
