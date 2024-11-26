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
      left: 50px; */
    }

    #visitante{
      right: 50px; */
    }

    #flag-festejo-left{
      width: 120px;
      position: absolute;
      bottom: 320px;
      left: 1px;
      z-index: 200000;
      opacity: .75;
    }

    #flag-festejo-right{
      width: 120px;
      position: absolute;
      bottom: 320px;
      right: 1px;
      z-index: 200000;
      opacity: .75;
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

    #buzo-left{
      width: 100px;
      height: 300px;
      position: absolute;
      bottom: 200px;
      z-index: 200000;
      object-fit: cover;
      left: 10px;
      display: none;
    }

    #buzo-center{
      width: 100px;
      height: 300px;
      position: absolute;
      bottom: 200px;
      z-index: 200000;
      object-fit: cover;
      left: 50%;
      transform: translateX(-50%);
      display: none;
    }

    #buzo-right{
      width: 100px;
      height: 300px;
      position: absolute;
      bottom: 200px;
      z-index: 200000;
      object-fit: cover;
      right: 10px;
      display: none;
    }

    #box-trofeo{
      position: absolute;
      bottom: 210px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 200000;
    }

    #trofeo{
      height: 150px;
    }

    #atril{
      width: 100px;
      height: 80px;
      border-radius: 10px 10px 5px 5px;
      background: linear-gradient(90deg, #800000, #904000, #800000);
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
      line-height: 1;
    }

    .gbl-loc, .gbl-vis{
      font-size: 30px;
      line-height: 1;
      opacity: 0;
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
      height: 150px;
      overflow-x:hidden;
      overflow-y: auto;
    }

    .goles-s{
      height: 70px;
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
      z-index: 10000000;
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
      width: 80px;
      height: 80px;
      border-radius: 100%;
      overflow: hidden;
    }

    #clasifica img{
      height: 50px;

    }

    .li-gol{
      font-size: 12px;
      border-radius: 5px;
    }

    #exit{
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 210px;
      z-index: 300000;
      border-radius: 100%;
    }

    #ida{
      position: absolute;
      bottom: 180px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 10000;
      border-radius: 100px;
    }

    .ida-name{
      font-size: 12px;
      line-height: 1;
    }

    .juez{
      border-radius: 10px;
      display: none;
    }

    #penales{
      position: absolute;
      top:800px;
      left: 0;
      z-index: 10000000;
    }

    #penales .inner{
      border-radius: 5px;
      background: rgba(102,153,0,.95);
      height: 400px;
      border:solid thin white;
    }

    #arco{
      background: rgba(255,255,255,.3);
    }

    #travesanio{
      height: 5px;
      background: linear-gradient(180deg, #FFFFFF, #F2F2F2, #FFFFFF);
    }

    #penales .palo{
      width: 5px;
      height: 70px;
      background: linear-gradient(90deg, #FFFFFF, #F2F2F2, #FFFFFF);
    }

    .linea{
      height: 5px;
      background: white;
    }

    #arquero{
      position: absolute;
      bottom: -10px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 100;

    }

    #arquero img{
      object-fit: cover;
      width: 100%;
      height: 100%;
      position: absolute;

    }

    #arquero div{
      position: relative;
      width: 25px;
      height: 70px;
      
    }

    #arquero .buzo{
      z-index: 100;
    }

    #arquero .jug{
      z-index: 80;
    }

    #shooter{
      position: absolute;
      bottom: 120px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 120;
      width: 50px;
      height: 100px;
      object-fit: cover;
    }

    #pelota{
      position: absolute;
      top: 250px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 100;
      width: 20px;
      height: auto;
    }

    #penal-result{
      position: absolute;
      top:130px;
      left:-100%;
      z-index: 500;
    }

    #penal-result .content{
      border-radius: 100px;
    }

    #penales-scorer{
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      z-index: 100;
      border:solid thin white;
      background: rgba(255,255,255,.2);
    }

    .penal{
      width: 12.5%;
      height: 40px;
      color: white;
    }

    .penal img{
      height: 30px;
    }

    .b-top{
      border-top: solid thin white;
    }

    .b-left{
      border-left: solid thin white;
    }

    .row-header .penal{
      height: 20px;
    }

    #jugada-local{
      position: absolute;
      bottom: 5px;
      right: 5px;
      z-index: 100;
      border-radius: 100px;
      font-size: 12px;
      line-height: 1;
    }

    #jugada-visitante{
      position: absolute;
      bottom: 5px;
      left: 5px;
      z-index: 100;
      border-radius: 100px;
      font-size: 12px;
      line-height: 1;
    }

    #modal-goles{
      position: absolute;
      top:280px;
      left: 0;
      z-index: 5000000;
    }


    #modal-goles .inner{
      border-radius: 10px;
    }

    

    #status{
      line-height: 1;
    }

    #status b{
      font-size: 12px;
    }

    .percent-bar{
      border-radius: 5px;
      border:solid thin white;
    }

    .status-bar{
      width: 0;
      height: 10px;
    }

    .box-status{
      border-radius: 5px;
    }



</style>
<audio src="{{ asset('resources/sounds/hinchada.mp3') }}" id="snd-hinchada"></audio>
<audio src="{{ asset('resources/sounds/pelota.mp3') }}" id="snd-pelota"></audio>
<audio src="{{ asset('resources/sounds/gol.mp3') }}" id="snd-gol"></audio>
<audio src="{{ asset('resources/sounds/pito.mp3') }}" id="snd-pito"></audio>
<audio src="{{ asset('resources/sounds/palo.mp3') }}" id="snd-palo"></audio>
<audio src="{{ asset('resources/sounds/uuu.mp3') }}" id="snd-uuu"></audio>
<audio src="{{ asset('resources/sounds/pitofin.mp3') }}" id="snd-pito-final"></audio>
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
          <div class="col-2 flex-col-start-center">
            <b class="gbl-loc">[20]</b>
            <b class="gl mt-3">0</b>
          </div>
          <div class="col-7 flex-col-center-center">
            <div class="juez p-1 cristal">
              <img src="{{ asset('resources/default/juez.png') }}" height="40">
            </div>
            <div class="reloj col-9 flex-col-start-center">
              <div class="box-time col-12 flex-row-center-center p-1">
                <small class="time">1º tiempo</small>
                <div class="add flex-row-center-center ml-2 p-1">0</div>
              </div>
              <div class="col-12 flex-row-center-center p-1"> 
                 <b class="cronometro">0</b>
              </div>
            </div>
            <div class="col-12 flex-row-between-center">
              <b class="pa mt-1">(0)</b>
              <b class="pb mt-1">(0)</b>
            </div>
          </div>
          <div class="col-2 flex-col-end-center">
            <b class="gbl-vis">[20]</b>
            <b class="gv mt-3">0</b>
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
  <div id="clasifica" class="p-0 flex-row-center-center cristal">
    <img class="p-1" src="{{ asset('resources/default/juez.png') }}">
  </div>
  <img id="capitan" src="{{ asset('resources/default/jugador.png') }}">
  <img id="balon" src="{{ asset('resources/default/logo.png') }}">
  <div id="exit" class="p-2 cristal">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="50" height="50">
      <path d="M208 96a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM123.7 200.5c1-.4 1.9-.8 2.9-1.2l-16.9 63.5c-5.6 21.1-.1 43.6 14.7 59.7l70.7 77.1 22 88.1c4.3 17.1 21.7 27.6 38.8 23.3s27.6-21.7 23.3-38.8l-23-92.1c-1.9-7.8-5.8-14.9-11.2-20.8l-49.5-54 19.3-65.5 9.6 23c4.4 10.6 12.5 19.3 22.8 24.5l26.7 13.3c15.8 7.9 35 1.5 42.9-14.3s1.5-35-14.3-42.9L281 232.7l-15.3-36.8C248.5 154.8 208.3 128 163.7 128c-22.8 0-45.3 4.8-66.1 14l-8 3.5c-32.9 14.6-58.1 42.4-69.4 76.5l-2.6 7.8c-5.6 16.8 3.5 34.9 20.2 40.5s34.9-3.5 40.5-20.2l2.6-7.8c5.7-17.1 18.3-30.9 34.7-38.2l8-3.5zm-30 135.1L68.7 398 9.4 457.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L116.3 441c4.6-4.6 8.2-10.1 10.6-16.1l14.5-36.2-40.7-44.4c-2.5-2.7-4.8-5.6-7-8.6zM550.6 153.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L530.7 224 384 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l146.7 0-25.4 25.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l80-80c12.5-12.5 12.5-32.8 0-45.3l-80-80z"/>
    </svg>
  </div>
  <img id="buzo-left" src="{{ asset('resources/arqueros/amarillo.png') }}">
  <img id="buzo-center" src="{{ asset('resources/arqueros/amarillo.png') }}">
  <img id="buzo-right" src="{{ asset('resources/arqueros/amarillo.png') }}">
  <img id="visitante" class="jug-campo jugador" src="{{ asset('resources/default/jugador.png') }}">
  <img id="flag-festejo-left" src="{{ asset('resources/default/flag.png') }}">
  <div id="box-trofeo" class="flex-col-start-center">
    <img id="trofeo" src="{{ asset('resources/default/recopa.png') }}" >
    <div id="atril"></div>
  </div>
  <img id="flag-festejo-right" src="{{ asset('resources/default/flag.png') }}">

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

  <div id="ida" class="col-11 flex-row-between-center cristal pl-1 pr-1">
    <div class="col-1 flex-row-start-center">
      <img src="{{ asset('resources/default/escudo.png') }}" class="eloc-ida" height="20">
    </div>
    <div class="col-4 flex-row-start-center">
      <b class="ida-loc ida-name">independiente medellin</b>
    </div>
    <div class="col-2 flex-row-center-center">
      <b class="ida-gl mr-2">88</b>
      <b class="lbl-ida">ida</b>
      <b class="ida-gv ml-2">88</b>
    </div>
    <div class="col-4 flex-row-end-center">
      <b class="ida-vis ida-name">independiente medellin</b>
    </div>
    <div class="col-1 flex-row-end-center">
      <img src="{{ asset('resources/default/escudo.png') }}" class="evis-ida" height="20">
    </div>
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
        <div id="jugada-local" class="flex-row-start-center pl-1 pr-1 cristal">
          <img class="jugada-esc" src="{{ asset('resources/default/escudo.png') }}" height="15">
          <b class="ml-1 lbl">travesaño</b>
          <img class="jugada-gol ml-2" src="{{ asset('resources/default/logo.png') }}" height="15">
        </div>
        <div id="jugada-visitante" class="flex-row-start-center pl-1 pr-1 cristal">
          <img class="jugada-gol mr-2" src="{{ asset('resources/default/logo.png') }}" height="15">
          <b class="ml-r lbl">travesaño</b>
          <img class="jugada-esc" src="{{ asset('resources/default/escudo.png') }}" height="15">
        </div>
      </div>
      <div id="status" class="col-12 flex-row-between-start flex-wrap mt-2">
        <div class="col-6 p-1">
          <div id="status-loc" class="box-status col-12 flex-row-between-center p-1 cristal">
            <div class="col-3 flex-row-start-center">
              <img src="{{ asset('resources/default/escudo.png') }}" height="40">
            </div>
            <div class="col-9 flex-row-between-start flex-wrap pl-2">
              <b>Posesion</b>
              <b class="percent">0 %</b>
              <div class="col-12 flex-row-start-center percent-bar mt-1 mb-1">
                <div class="status-bar"></div>
              </div>
              <b>Remates</b>
              <b class="remates">0</b>
            </div>
          </div>
        </div>
        <div class="col-6 p-1">
          <div id="status-vis" class="box-status col-12 flex-row-between-center p-1 cristal">
            <div class="col-9 flex-row-between-start flex-wrap pr-2">
              <b>Posesion</b>
              <b class="percent">0 %</b>
              <div class="col-12 flex-row-start-center percent-bar mt-1 mb-1">
                <div class="status-bar"></div>
              </div>
              <b>Remates</b>
              <b class="remates">0</b>
            </div>
            <div class="col-3 flex-row-end-center">
              <img src="{{ asset('resources/default/escudo.png') }}" height="40">
            </div>
          </div>
        </div>
        <div class="col-12 flex-row-center-center">
          <button id="btn-list-goles" class="btn btn-sm btn-dark pt-1 pb-1 pl-2 pr-2">ver GOLES</button>
        </div>
        
      </div>
    </div>
  </div>
  <div id="penales" class="col-12 p-1">
    <div class="inner col-12 flex-col-start-center p-2">
      <div id="arco" class="col-10 flex-row-between-start flex-wrap mt-3">
        <div id="travesanio" class="col-12"></div>
        <div id="palo-left" class="palo col-12"></div>
        <div id="palo-right" class="palo col-12"></div>
        <div id="arquero">
          <div>
            <img class="jug" src="{{ asset('resources/default/jugador.png') }}">
            <img class="buzo" src="{{ asset('resources/default/jugador.png') }}">
          </div>
        </div>
      </div>
      <div class="linea col-12"></div>
      <img id="shooter" src="{{ asset('resources/default/jugador.png') }}">
      <img id="pelota" src="{{ asset('resources/default/logo.png') }}">
      <div id="penal-result" class="col-12 flex-row-center-center">
        <div class="content flex-row-start-center pl-2 pr-2 pt-1 pb-1 cristal">
          <img class="pen-escudo" src="{{ asset('resources/default/escudo.png') }}" height="20">
          <b class="result ml-2">travesaño</b>
        </div>
      </div>
      <div id="penales-scorer" class="col-11 flex-col-start-start">
        <div class="row-header col-12 flex-row-start-center">
          <div class="penal flex-row-center-center p-2">E</div>
          <div class="penal flex-row-center-center p-2 b-left">1</div>
          <div class="penal flex-row-center-center p-2 b-left">2</div>
          <div class="penal flex-row-center-center p-2 b-left">3</div>
          <div class="penal flex-row-center-center p-2 b-left">4</div>
          <div class="penal flex-row-center-center p-2 b-left">5</div>
          <div class="penal flex-row-center-center p-2 b-left">x</div>
          <div class="penal flex-row-center-center p-2 b-left">W</div>
        </div>
        <div class="row-loc col-12 flex-row-start-center b-top">
          <div class="penal flex-row-center-center p-2">
            <img class="escudo" src="{{ asset('resources/default/escudo.png') }}">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-1">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-2">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-3">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-4">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-5">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-x">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="p-winner">
          </div>
        </div>
        <div class="row-vis col-12 flex-row-start-center b-top">
          <div class="penal flex-row-center-center p-2">
            <img class="escudo" src="{{ asset('resources/default/escudo.png') }}">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-1">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-2">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-3">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-4">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-5">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="pen-x">
          </div>
          <div class="penal flex-row-center-center p-2 b-left">
            <img class="p-winner">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="modal-goles" class="col-12 flex-row-center-center p-2">
    <div class="inner col-12 flex-col-start-center p-2 cristal">
      <div class="col-12 flex-row-between-start">
        <div class="col-6 flex-col-start-center pr-1">
          <b class="lbl-time-list">1º tiempo</b>
          <ul class="goles goles-pt col-12 p-1 mt-1 cristal"></ul>
        </div>
        <div class="col-6 flex-col-start-center pl-1">
          <b class="lbl-time-list">2º tiempo</b>
          <ul class="goles goles-st col-12 p-1 mt-1 cristal"></ul>
        </div>
      </div>

      <div id="alargue-list" class="col-12 flex-row-between-start">
        <div class="col-6 flex-col-start-center pr-1">
          <b class="lbl-time-list">1º tiempo s</b>
          <ul class="goles goles-s goles-pt-s col-12 p-1 mt-1 cristal"></ul>
        </div>
        <div class="col-6 flex-col-start-center pl-1">
          <b class="lbl-time-list">2º tiempo s</b>
          <ul class="goles goles-s goles-st-s col-12 p-1 mt-1 cristal"></ul>
        </div>
      </div>
      <div class="col-12 flex-row-center-center p-1">
        <button id="btn-close-modal-goles" class="btn btn-sm btn-dark">cerrar</button>
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
       global_loc = getEl(fondo, 'gbl-loc'),
       global_vis = getEl(fondo, 'gbl-vis'),
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
       rain = rdm(0, 10) > 7 ? true : false,
       salir = getEl(fondo, 'exit', true),
       ida = getEl(fondo, 'ida', true),
       penales = getEl(fondo, 'penales', true),
       jugadaloc = getEl(fondo, 'jugada-local', true),
       jugadavis = getEl(fondo, 'jugada-visitante', true),
       alarguelist = getEl(fondo, 'alargue-list', true),
       statusloc = getEl(fondo, 'status-loc', true),
       statusvis = getEl(fondo, 'status-vis', true),
       footerpartido = getEl(fondo, 'footer-inner')

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

  function setStatus(st, eq){
    var escudo = st.find('img'),
        marco = getEl(st, 'percent-bar'),
        bar = getEl(st, 'status-bar')

    setCristalBorder(st, eq.color_a, eq.color_b, 1)
    setImageEquipo(escudo, eq, 'escudo')    
    colBordeUI(marco, eq.color_c.rgb)
    setBgGradientEq(bar, eq)
    setText(st, eq.color_b, bcColor(eq), .1)

  }
       
   function set(){
    var cup = partido.copa == 'afa' ? partido.copa + '_' + partido.zona.toLowerCase() : partido.copa
      setText(header, colb, bcColor(loc), .1)
      setCristalRGB(header, cola)
      namecopa.html(partido.copa)
      anio.html(partido.anio)

      setImageEquipo(estadio, loc, 'estadio')
      nameestadio.html(loc.name)
      setImageCopa(copa, cup)
      copa.css({filter: 'drop-shadow(0 0 10px rgba(' + colb.rgb + ', 0.9))'})
      dia.html(getDia(partido.dia))
      hora.html(partido.hora + ' hs.')
      setImage(clima, ASSET + 'clima/', getClima(hora))
      setImageFlag(flag, loc.liga.bandera)
      setImageEquipo(eflag, loc, 'bandera')

      fase.html(getNameFase(partido.copa, partido.fase, partido.zona))

      nameloc.html(loc.name)
      namevis.html(vis.name)

      setImageEquipo(eloc, loc, 'escudo')
      setImageEquipo(evis, vis, 'escudo')

      multiText([namevis, gv, global_vis, pb], vis.color_a, vis.color_b, .1)

      bg(boxtime, colb.rgb)
      setText(time, cola, colb, .1)
      setText(cronometro, cola, colb, .05)
      setCristalRGB(reloj, colb)

      pa.hide()
      pb.hide()

      setImageEquipo(local, loc, 'local')
      setImageEquipo(loc1, loc, 'local')
      setImageEquipo(loc2, loc, 'local')

      setBuzo(aloc, getBuzo(loc.camiseta, change ? vis.alternativa : vis.camiseta))

      setBuzo(avis, getBuzo(loc.camiseta, change ? vis.alternativa : vis.camiseta))

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

      

      if(partido.is_vuelta == 1 && partido.is_define == 1){
        if(MAIN.ida.gl > MAIN.ida.gv){
          setCristalBorder(clasifica, vis.color_a, vis.color_b, 1)
          setImageEquipo(clasifica.find('img'), vis, 'escudo')
        }else if(MAIN.ida.gl < MAIN.ida.gv){
          setCristalBorder(clasifica, loc.color_a, loc.color_b, 1)
          setImageEquipo(clasifica.find('img'), loc, 'escudo')
        }else{
          setCristalBorder(clasifica, parseColor('gris'), parseColor('gris'), 1)
        }
        global_loc.html('[' + MAIN.ida.gv + ']')
        global_vis.html('[' + MAIN.ida.gl + ']')
        global_loc.fadeTo(0, 1)
        global_vis.fadeTo(0, 1)
        
      }else{
        clasifica.hide()
      }

      setCristalBorder(salir, cola, colb, 2)
      salir.find('svg').attr({
        fill:getRgb(colb.rgb)
      })
      salir.hide()

      if(partido.is_vuelta){
        setCristalBorder(ida, vis.color_a, vis.color_b, 1)
        setText(getEl(ida, 'ida-loc'), vis.color_b, bcColor(vis), .1)
        setText(getEl(ida, 'ida-gl'), vis.color_b, bcColor(vis), .1)
        setText(getEl(ida, 'lbl-ida'), vis.color_b, bcColor(vis), .1)

        getEl(ida, 'ida-gl').html(MAIN.ida.gl)
        getEl(ida, 'ida-gv').html(MAIN.ida.gv)

        getEl(ida, 'ida-loc').html(vis.name)
        getEl(ida, 'ida-vis').html(loc.name)

        setText(getEl(ida, 'ida-vis'), loc.color_a, loc.color_b, .1)
        setText(getEl(ida, 'ida-gv'), loc.color_a, loc.color_b, .1)

        setImageEquipo(getEl(ida, 'eloc-ida'), vis, 'escudo')
        setImageEquipo(getEl(ida, 'evis-ida'), loc, 'escudo')
      }else{
        ida.hide()
      }

      setText(getEl(fondo, 'lbl-time-list'), loc.color_b, bcColor(loc), .1)

      getEl(fondo, 'box-trofeo', true).hide()
      capitan.hide()
      getEl(fondo, 'flag-festejo-left', true).hide()
      getEl(fondo, 'flag-festejo-right', true).hide()

      setImageEquipo($('.row-loc .escudo'), loc, 'escudo')
      setImageEquipo($('.row-vis .escudo'), vis, 'escudo')


      setCristalBorder(jugadaloc, loc.color_a, loc.color_b, 1)
      setText(getEl(jugadaloc, 'lbl'), loc.color_b, bcColor(loc), .1)
      setImageEquipo(getEl(jugadaloc, 'jugada-esc'), loc, 'escudo')

      setCristalBorder(jugadavis, vis.color_a, vis.color_b, 1)
      setText(getEl(jugadavis, 'lbl'), vis.color_b, bcColor(vis), .1)
      setImageEquipo(getEl(jugadavis, 'jugada-esc'), vis, 'escudo')
      jugadaloc.hide()
      jugadavis.hide()

      if(partido.local.estructura == 'chica'){
        $('#f-center').hide()
      }

      $('#btn-list-goles').click(function(){
        $('#modal-goles').fadeIn(150)
      })


      $('#btn-close-modal-goles').click(function(){
        $('#modal-goles').fadeOut(150)
      })

      alarguelist.hide()

      setCristalRGB(footerpartido, loc.color_a)

      setStatus(statusloc, loc)
      setStatus(statusvis, vis)

      
      
      setEquipoUI($('#btn-list-goles, #btn-close-modal-goles'), loc, 1)
      setText($('#btn-list-goles, #btn-close-modal-goles'), loc.color_b, bcColor(loc), .1)
   }    
   


   $(function(){
    
    set()
    stopTimer(RAIN)
    if(rain){
      RAIN = setInterval(function(){
        llover(20)}, 1);
    }

    JUEGO = new Juego(fondo, partido, camvis, aloc, avis)
    JUEGO.mutear()

    JUEGO.sonar('snd-hinchada', 5, true)

    $('#balon').click(function(){
      
      JUEGO.jugar()
      $(this).fadeOut(150)
    })

    salir.click(function(){
      var result = JUEGO.getResult()
      preload(true)
      sendPostRequest("{{ route('main.save-partido') }}", result, function(data){
        
        if(data.result == 'OK'){
          var url = "{{ route('home', $partido->grupo_id) }}"
          //location.reload()
          window.location.href = url
          // var url = "{{ route('home') }}",
          // params = ['home', 'copa', partido.copa, partido.fase]
       
          // nextPage(url, params, true)
        }else{
          preload()
          Swal.fire('GUARDAR PARTIDO', data.message, 'error')
        }

      })
    })

    $('#modal-goles').hide()
    
    preload()
   })
</script>
