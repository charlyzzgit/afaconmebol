<style>

  @keyframes fall {
    0% { top: -10px; opacity: 1; }
    100% { top: 100vh; opacity: 0; }
  }

    #fondo{
      background-repeat: no-repeat;
      background-position: center bottom;
      background-size: cover;
/*      background-image: url("{{ asset('resources/estadios/grande_fine_night.png') }}");*/
    }

    #cesped{
      position: absolute;
      left: 0;
      bottom: 0;
      z-index: 100;
      height: 340px;
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
/*      background-image: url("{{ asset('resources/cesped/rayada.png') }}");*/
    }

    .jugador{
      width: 100px;
      height: 300px;
      position: absolute;
      bottom: 200px;
      z-index: 100000;
      object-fit: cover;
    }

    #local{
      left: 50px;
    }

    #visitante{
      right: 50px;
    }

    #capitan{
      width: 100px;
      height: 300px;
      position: absolute;
      bottom: 200px;
      z-index: 100000;
      object-fit: cover;
      left: 50%;
      transform: translateX(-50%);
    }

    #balon{
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 210px;
      z-index: 100000;
      width: 50px;
    }

    #box-header{
      position: fixed;
      top:0;
      left: 0;
      z-index: 1000;
    }

    .header{
      height: 280px;
      border-radius: 10px;
      line-height: 1;
    }

    #names{
      font-size: 30px;
      line-height: 1;
      height: 60px;

    }

    .name-copa, .anio{
      font-size: 25px;
    }

    .gl, .gv{
      font-size: 50px;
    }

    .pa, .pb{
      font-size: 35px;
    }

    .reloj{
      border-radius: 5px;
      overflow: hidden;
    }

    .box-time{
      background: gray;
    }

    .estadio{
      height: 50px;
    }

    .copa{
      height: 100px;
    }

    .clima{
      height: 30px;
    }

    .flag{
      height: 40px;
    }

    .escudo{
      height: 80px;
    }

    .line{
      height: 1px;
      background: white;
    }

    .e-flag{
      height: 40px;
      position: absolute;
      z-index: 10;
      opacity: .5;
    }

    #f-center{
      top:220px;
      left: 50%;
      transform: translateX(-50%);
    }

    #f-left{
      left:20px;
      top:350px;
    }

    #f-right{
      right:20px;
      top:350px;
    }

    .mini-jugador{
      height: 100px;
      position: absolute;
      bottom: 300px;
      z-index: 200;
    }

    #j-left{
      left: -10px
    }

    #j-center{
      left: 50%;
      transform: translateX(-50%);
    }

    #j-right{
      right: -10px
    }

    .cronometro{
      font-size: 20px;
    }

    .gota{
      width: 2px;
      height: 5px;
      background: rgba(255,255,255,.5);
      position: absolute;
      z-index: 20000000000;
      animation: fall linear;
    }

    #footer-partido{
      position: absolute;
      bottom: 0;
      left: 0;
      z-index: 100;
    }

    .footer-inner{
      height: 170px;
      border-radius: 5px;
    }

    .juego{
      height: 50px;
      background: #669900;
    }

    .micro-jugador{
      width: 20px;
      height: 50px;
      object-fit: cover;
    }

    .micro-balon{
      height: 15px;
    }

    .micro-arquero{
      width: 20px;
      height: 50px;
      position: relative;
    }

    .micro-arquero .arquero{
      position: absolute;
      top:0;
      left: 0;
      z-index: 100;
    }

    .palo{
      width: 4px;
      height: 50px;
      object-fit: cover;
    }

    .goles{
      height: 70px;
      overflow-x:hidden;
      overflow-y: auto;
    }

    #duelo{
      position: absolute;
      top:0;
      left: 50%;
      width: 55px;
      transform: translateX(-50%);
    }

    #gol{
      position: absolute;
      left: 0;
      bottom:300px;
      z-index: 100000;
      opacity: 0;
      font-size: 22px;
    }

    #half-time{
      position: absolute;
      left: 50%;
      bottom:350px;
      transform: translateX(-50%);
      z-index: 100000;
      opacity: 0;
      border-radius: 100px;
      font-size: 20px;
    }

    #winner{
      position: absolute;
      left: 50%;
      bottom:300px;
      transform: translateX(-50%);
      z-index: 100000;
      opacity: 0;
      border-radius: 100px;
      font-size: 20px;
    }

    #gol .inner{
      border-radius: 100px;
    }

    .add{
      width: 20px;
      height: 20px;
      border-radius: 100%;
      font-size: 12px;
    }

    #clasifica{
      position: absolute;
      top:42%;
      left: 50%;
      transform: translate(-50%, -42%);
      z-index: 100;
      border-radius: 10px;
    }

    #clasifica img{
      height: 50px;

    }

    .li-gol{
      font-size: 12px;
      border-radius: 5px;
    }


</style>
<div id="fondo" class="col-12 box-content p-1">
  <img id="f-center" class="e-flag" src="{{ asset('resources/default/flag.png') }}">
  <img id="f-left" class="e-flag" src="{{ asset('resources/default/flag.png') }}">
  <img id="f-right" class="e-flag" src="{{ asset('resources/default/flag.png') }}">
  <div id="box-header" class="col-12 p-1">
    <div class="header col-12 flex-col-start-center p-2 cristal">
      <div class="col-12 flex-row-between-start">
        <div class="col-5 flex-col-start-start">
          <b class="name-copa">sudamericana</b>
          <div class="flex-row-start-center mt-1">
            <img class="estadio" src="{{ asset('resources/default/estadio.png') }}">
            <div class="flex-col-start-start ml-2">
              <small><b class="lbl-estadio">estadio</b></small>
              <b class="name-estadio">independiente medellin</b>
            </div>
          </div>
          <b class="fase mt-2">dieciseisavos de final</b>
        </div>
        <div class="col-2 flex-col-center-center">
          <img class="copa" src="{{ asset('resources/default/libertadores.png') }}">
        </div>
        <div class="col-5 flex-col-start-end">
          <b class="anio">2000</b>
          <div class="flex-row-start-center mt-1">
            <div class="flex-col-start-start mr-2">
              <b class="dia">miercoles</b>
              <div class="flex-row-start-center">
                <b class="hora">21 hs</b>
                <img class="clima" src="{{ asset('resources/clima/night_fine.png') }}">
              </div>
              
            </div>
            <img class="flag" src="{{ asset('resources/default/flag.png') }}">
          </div>
          <b class="fecha mt-2">partido de vuelta</b>
        </div>
      </div>
      <div class="line col-12 mt-1 mb-1"></div>
      <div id="names" class="col-12 flex-row-between-start">
        <div class="col-6 flex-row-start-center">
          <b class="name-loc">independiente medellin</b>
        </div>
        <div class="col-6 flex-row-end-center">
          <b class="name-vis">independiente medellin</b>
        </div>
        
      </div>
      <div class="col-12 flex-row-between-end">
        <div class="col-3 flex-row-start-center">
          <img class="e-loc escudo mb-2" src="{{ asset('resources/default/escudo.png') }}">
        </div>
        <div class="col-6 flex-row-between-start">
          <div class="col-2 flex-row-start-center">
            <b class="gl mt-5">0</b>
          </div>
          <div class="col-7 flex-col-center-center">
            <div class="reloj col-9 flex-col-start-center">
              <div class="box-time col-12 flex-row-center-center p-1">
                <small class="time">2º tiempo</small>
                <div class="add flex-row-center-center ml-2 p-1">10</div>
              </div>
              <div class="col-12 flex-row-center-center p-1"> 
                 <b class="cronometro">45</b>
              </div>
            </div>
            <div class="col-12 flex-row-between-center">
              <b class="pa mt-1">(0)</b>
              <b class="pb mt-1">(0)</b>
            </div>
          </div>
          <div class="col-2 flex-row-end-center">
            <b class="gv mt-5">0</b>
          </div>
        </div>
        <div class="col-3 flex-row-end-center">
          <img class="mb-2 e-vis escudo" src="{{ asset('resources/default/escudo.png') }}">
        </div>
      </div>
    </div>
  </div>
  <div id="cesped" class="col-12"></div>
  <img id="j-left" class="jug-campo mini-jugador" src="{{ asset('resources/default/jugador.png') }}">
  <img id="j-center" class="jug-campo mini-jugador" src="{{ asset('resources/default/jugador.png') }}">
  <img id="j-right" class="jug-campo mini-jugador" src="{{ asset('resources/default/jugador.png') }}">
  <img id="local" class="jug-campo jugador" src="{{ asset('resources/default/jugador.png') }}">
  <div id="clasifica" class="p-2 cristal">
    <img src="{{ asset('resources/default/escudo.png') }}">
  </div>
  <img id="capitan" src="{{ asset('resources/default/jugador.png') }}">
  <img id="balon" src="{{ asset('resources/default/logo.png') }}">
  <img id="visitante" class="jug-campo jugador" src="{{ asset('resources/default/jugador.png') }}">
  <div id="gol" class="col-12 flex-row-center-center p-2">
    <div class="inner flex-row-center-center cristal p-2">
      <img class="gol-esc" src="{{ asset('resources/default/escudo.png') }}" height="50">
      <b class="gol-lbl ml-2 ml-2">gol de independiente medellin</b>
      <img class="gol-jug" src="{{ asset('resources/default/jugador.png') }}" height="50">
    </div>
  </div>
  <div id="half-time" class="col-9 flex-row-between-center p-1 cristal">
    <img class="half-loc" src="{{ asset('resources/default/escudo.png') }}" height="30">
    <b>entretiempo</b>
    <img class="half-vis" src="{{ asset('resources/default/escudo.png') }}" height="30">
  </div>

  <div id="winner" class="col-9 flex-row-between-center p-1 cristal">
    <img class="w-left" src="{{ asset('resources/default/escudo.png') }}" height="30">
    <b class="w-name"></b>
    <img class="w-right" src="{{ asset('resources/default/escudo.png') }}" height="30">
  </div>

  <div id="footer-partido" class="col-12 p-1">
    <div class="footer-inner flex-col-start-center p-2 cristal">
      <div class="juego col-12 flex-row-between-center">
        <div class="flex-row-start-center">
          <img class="palo ml-3" src="{{ asset('resources/default/palo.png') }}">
          <div class="micro-arquero">
            <img id="a-loc" class="arquero micro-jugador" src="{{ asset('resources/arqueros/amarillo.png') }}">
            <img class="micro-local micro-jugador" src="{{ asset('resources/default/jugador.png') }}">
          </div>
        </div>
        
        <div id="duelo" class="flex-row-start-end">
          <img class="micro-local micro-jugador" src="{{ asset('resources/default/jugador.png') }}">
          <img class="micro-balon" src="{{ asset('resources/default/logo.png') }}">
          <img class="micro-visitante micro-jugador" src="{{ asset('resources/default/jugador.png') }}">
        </div>
        <div class="flex-row-start-center">
          <div class="micro-arquero">
            <img id="a-vis" class="arquero micro-jugador" src="{{ asset('resources/arqueros/amarillo.png') }}">
            <img class="micro-visitante micro-jugador" src="{{ asset('resources/default/jugador.png') }}">
          </div>
          <img class="palo mr-3" src="{{ asset('resources/default/palo.png') }}">
        </div>
      </div>
      <div class="col-12 flex-row-between-start">
        <div class="col-6 flex-col-start-center pr-1">
          <b>1º tiempo</b>
          <ul class="goles goles-pt col-12 p-1 mt-1 cristal"></ul>
        </div>
        <div class="col-6 flex-col-start-center pl-1">
          <b>2º tiempo</b>
          <ul class="goles goles-st col-12 p-1 mt-1 cristal"></ul>
        </div>
      </div>
    </div>
  </div>
</div>

@include('partials.juego')
<script>
  
   var partido = {!! $partido !!},
       JUEGO = null,
      fondo = $('#fondo'),
       header = getEl(fondo, 'header'),
       namecopa = getEl(fondo, 'name-copa'),
       anio = getEl(fondo, 'anio'),
       estadio = getEl(fondo, 'estadio'),
       lblestadio = getEl(fondo, 'lbl-estadio'),
       nameestadio = getEl(fondo, 'name-estadio'),
       copa = getEl(fondo, 'copa'),
       dia = getEl(fondo, 'dia'), 
       hora = getEl(fondo, 'hora'), 
       clima = getEl(fondo, 'clima'),
       flag = getEl(fondo, 'flag'), 
       fase = getEl(fondo, 'fase'),
       fecha = getEl(fondo, 'fecha'),
       line = getEl(fondo, 'line'),
       nameloc = getEl(fondo, 'name-loc'),
       namevis = getEl(fondo, 'name-vis'),
       eloc = getEl(fondo, 'e-loc'),
       evis = getEl(fondo, 'e-vis'),
       reloj = getEl(fondo, 'reloj'),
       boxtime = getEl(fondo, 'box-time'),
       time = getEl(fondo, 'time'),
       cronometro = getEl(fondo, 'cronometro'),
       add = getEl(fondo, 'add'),
       gl = getEl(fondo, 'gl'),
       gv = getEl(fondo, 'gv'),
       pa = getEl(fondo, 'pa'),
       pb = getEl(fondo, 'pb'),
       eflag = getEl(fondo, 'e-flag'),
       local = getEl(fondo, 'local', true),
       visitante = getEl(fondo, 'visitante', true),
       capitan = getEl(fondo, 'capitan', true),
       cesped = getEl(fondo, 'cesped', true),
       loc = partido.local,
       vis = partido.visitante,
       cola = loc.color_a,
       colb = loc.color_b,
       colc = loc.color_c,
       loc1 = getEl(fondo, 'j-left', true),
       loc2 = getEl(fondo, 'j-center', true),
       vis1 = getEl(fondo, 'j-right', true),
       aloc = getEl(fondo, 'a-loc', true),
       avis = getEl(fondo, 'a-vis', true),
       microloc = getEl(fondo, 'micro-local'),
       microvis = getEl(fondo, 'micro-visitante'),
       clasifica = getEl(fondo, 'clasifica', true),
       halftime = getEl(fondo, 'half-time', true),
       halfloc = getEl(fondo, 'half-loc'),
       halfvis = getEl(fondo, 'half-vis'),
       change = cambiar(loc, vis),
       camvis = change ? 'visitante' : 'local',
       timer,
       par = true,
       rain = rdm(0, 10) > 7 ? true : false

  log('partido', [partido])

  function getClima(hora){
    
    if(hora < 20){
      return rain ? 'day_rain.png' : 'day_fine.png'
    }else{
      return rain ? 'night_rain.png' : 'night_fine.png'
    }
  }

  function getGota(){
    const $raindrop = $('<div class="gota"></div>');
  
    // Posición horizontal aleatoria
    $raindrop.css('left', `${Math.random() * 100}vw`);
    
    // Duración y velocidad aleatoria para la caída
    const duration = Math.random() * 3 + 2;
    $raindrop.css('animation-duration', `${duration}s`);

    return $raindrop
  }

  function llover(I){
    for(var i = 0; i < I; i++){
      var gota = getGota()
      
      // Añadir el div al body
      fondo.append(gota);
      
      // Remover el div cuando termine la animación
      gota.on('animationend', function() {
        $(this).remove();
      });
    }
  }
       
   function set(){
      setText(header, colb, cola, .1)
      setCristalRGB(header, cola)
      namecopa.html(partido.copa)
      anio.html(partido.anio)

      setImageEquipo(estadio, loc, 'estadio')
      nameestadio.html(loc.name)
      setImageCopa(copa, partido.copa)
      dia.html(getDia(partido.dia))
      hora.html(partido.hora + ' hs.')
      setImage(clima, ASSET + 'clima/', getClima(hora))
      setImageFlag(flag, loc.liga.bandera)
      setImageEquipo(eflag, loc, 'bandera')

      nameloc.html(loc.name)
      namevis.html(vis.name)

      setImageEquipo(eloc, loc, 'escudo')
      setImageEquipo(evis, vis, 'escudo')

      multiText([namevis, gv, pb], vis.color_a, vis.color_b, .1)

      bg(boxtime, colb.rgb)
      setText(time, cola, colb, .1)
      setText(cronometro, cola, colb, .05)
      setCristalRGB(reloj, colb)

      pa.hide()
      pb.hide()

      setImageEquipo(local, loc, 'local')
      setImageEquipo(loc1, loc, 'local')
      setImageEquipo(loc2, loc, 'local')

      setBuzo(aloc, getBuzo(loc.camiseta, camvis))

      setImageEquipo(microloc, loc, 'local')

      setImageEquipo(microvis, vis, camvis)

      setImageEquipo(visitante, vis, camvis)
      setImageEquipo(vis1, vis, camvis)

      setText(add, colb, cola, .1)
      bg(add, cola.rgb)

      add.hide()

      //setCristalRGB(halftime, cola)
      setCristalBorder(halftime, cola, colb, 2)
      setText(halftime, colb, cola, .1)

      setImageEquipo(halfloc, loc, 'escudo')
      setImageEquipo(halfvis, vis, 'escudo')

      fondo.css({backgroundImage: 'url(' + ASSET + 'estadios/' + getEstadio(loc, partido.hora, rain) + ')'})
      cesped.css({backgroundImage: 'url(' + ASSET + 'cesped/' + getCesped(loc) + ')'})

      capitan.hide()

      if(!(partido.is_vuelta == 1 && partido.is_define == 1)){
        clasifica.hide()
      }
   }    
   


   $(function(){
    set()
    stopTimer(RAIN)
    if(rain){
      RAIN = setInterval(function(){
        llover(20)}, 1);
    }

    // $('#duelo').draggable({
    //     drag: function(event, ui) {
    //       log('balon', [$('.micro-balon').offset().left])
    //     }

    //   })


    $('#balon').click(function(){
      JUEGO = new Juego(fondo, partido, camvis)
      JUEGO.jugar()
    })
    
    preload()
   })
</script>
