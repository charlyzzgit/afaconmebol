<style>
    #fondo{
      background-repeat: no-repeat;
      background-position: center bottom;
      background-size: cover;
      background-image: url("{{ asset('resources/estadios/grande_fine_night.png') }}");
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
      background-image: url("{{ asset('resources/cesped/rayada.png') }}");
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
      top:350px;
      left: 50%;
      transform: translateX(-50%);
    }

    #f-left{
      left:20px;
      top:220px;
    }

    #f-right{
      right:20px;
      top:220px;
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
          <div class="col-3 flex-row-start-center">
            <b class="gl mt-5">0</b>
          </div>
          <div class="col-6 flex-col-center-center">
            <div class="reloj col-9 flex-col-start-center">
              <div class="box-time col-12 flex-row-center-center p-1">
                <small class="time">2º tiempo</small>
              </div>
              <div class="col-12 flex-row-center-center p-2"> 
                 <b class="cronometro">45</b>
              </div>
            </div>
            <div class="col-12 flex-row-between-center">
              <b class="pa mt-1">(0)</b>
              <b class="pb mt-1">(0)</b>
            </div>
          </div>
          <div class="col-3 flex-row-end-center">
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
  <img id="local" class="jugador" src="{{ asset('resources/default/jugador.png') }}">
  <img id="balon" src="{{ asset('resources/default/logo.png') }}">
  <img id="visitante" class="jugador" src="{{ asset('resources/default/jugador.png') }}">
</div>


<script>
   var partido = {!! $partido !!},
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
       gl = getEl(fondo, 'gl'),
       gv = getEl(fondo, 'gv'),
       pa = getEl(fondo, 'pa'),
       pb = getEl(fondo, 'pb'),
       local = getEl(fondo, 'local', true),
       visitante = getEl(fondo, 'visitante', true),
       cesped = getEl(fondo, 'cesped', true),
       loc = partido.local,
       vis = partido.visitante,
       cola = loc.color_a,
       colb = loc.color_b,
       colc = loc.color_c

  log('partido', [partido])

  function getClima(hora){
    var rain = rdm(0, 10) > 7 ? true : false
    if(hora < 20){
      return rain ? 'day_rain.png' : 'day_fine.png'
    }else{
      return rain ? 'night_rain.png' : 'night_fine.png'
    }
  }
       
   function set(){
      setText(header, colb, cola, .01)
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

      nameloc.html(loc.name)
      namevis.html(vis.name)

      setImageEquipo(eloc, loc, 'escudo')
      setImageEquipo(evis, vis, 'escudo')

      multiText([namevis, gv, pb], vis.color_a, vis.color_b, .01)

      pa.hide()
      pb.hide()
   }    
   


   $(function(){
    set()
    preload()
   })
</script>
