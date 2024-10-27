@extends('layouts.map')

@section('css')
<style>
  header, nav, footer{
    display: none !important;
  }

  #mapContainer{
    width: 100vw;
    height: 100vh;
    overflow: hidden; /* Oculta el desbordamiento */
    border: 1px solid #ccc; /* Borde para visualización */
    position: relative; /* Posición relativa para contenidos absolutos */
  }

  

  #mapContent {
    width: 10000px; /* Ancho del contenido (mayor que el contenedor) 10000*/
    height: 10000px; /* Alto del contenido (mayor que el contenedor) */
    position: absolute; /* Posición absoluta para permitir el desplazamiento */
    border:solid medium red;
    transform-origin: center center; /* Define el origen del zoom en el centro */
    transition: transform 0.3s ease; /* Añade una transición suave al hacer zoom */
  }

  #box-map{
    position: relative;
    width: 100%;
    height: 100%;
  }

  #map{
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 0;
  }

  #canvas{
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 100;
  }

  #btn-next{
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1000;
  }

  #box-zoom{
    position: absolute;
    bottom: 20px;
    right:20px;
    z-index: 1000;
  }

  #left, #right{
    width: 1px;
    height: 100%;
    background: blue;
    position: absolute;
    z-index: 100000;
    top:0;
  }

  #top, #bottom{
    width: 100%;
    height: 1px;
    background: blue;
    position: absolute;
    z-index: 100000;
    left: 0;
  }

  #left{
    left: 0;
  }

  #right{
    right: 0;
  }

  #top{
    top:0;
  }

  #bottom{
    bottom: 0;
  }

  #center-horizontal{
    position: absolute;
    top:50%;
    left: 0;
    transform: translateY(-50%);
    width: 100%;
    height: 1px;
    background: green;
    z-index: 200;
  }

  #center-vertical{
    position: absolute;
    top:0;
    left:50%;
    transform: translateX(-50%);
    width: 1px;
    height: 100%;
    background: green;
    z-index: 200;
  }

  


</style>
@stop

@section('content')

<div id="mapContainer">
  <div id="left"></div>
  <div id="right"></div>
  <div id="top"></div>
  <div id="bottom"></div>
  <div id="mapContent" class="flex-row-start-start flex-wrap">
    <div id="box-map">
      <div id="map"></div>
      <div id="center-horizontal"></div>
      <div id="center-vertical"></div>
      <div id="canvas"></div>
    </div>
    
  </div>
  <button id="btn-next" class="btn btn-primary">
    NEXT
  </button>
  <div id="box-zoom">
    <div class="btn-group">
      <button id="btn-zoom-out" class="btn btn-warning">
        <i class="fa fa-minus"></i>
     </button>
     <button id="btn-zoom-in" class="btn btn-warning">
        <i class="fa fa-plus"></i>
     </button>
    </div>
  </div>
  
</div>
@stop

@section('js')
@include('partials.leaflet')
<script>

  var isDragging = false; // Variable para rastrear si se está arrastrando el mapa
  var lastX, lastY; // Variables para almacenar la última posición del mouse
  var mapContentStartX, mapContentStartY;
  var threshold = 10; // Umbral de movimiento en píxeles

  var mapContainer = document.getElementById('mapContainer');
  var mapContent = document.getElementById('mapContent');

  var currentScale = 1; // Nivel inicial de zoom
  var lastMouseX, lastMouseY;

  
  var CENTER = L.latLng(-34.63873240422852, -58.51641411769094)
  var map = $('#map')

  var zoomInterval

function smoothMapMovement() {
  // Calcular la diferencia de movimiento basada en la última posición del mouse
  var deltaX = lastX - mapContainer.offsetWidth / 2;
  var deltaY = lastY - mapContainer.offsetHeight / 2;
  var top = mapContent.offsetTop + deltaY
  var left = mapContent.offsetLeft + deltaX
  var maxTop = mapContainer.offsetHeight
  var maxLeft = mapContainer.offsetWidth
  var mapWidth = mapContent.offsetWidth
  var mapHeight = mapContent.offsetHeight
  //if (Math.abs(deltaX) > threshold || Math.abs(deltaY) > threshold) {
    if(top > $('#top').offset().top){
      top = 0
    }
    if(left > $('#left').offset().left){
      left = 0
    }
    if(top + mapHeight < maxTop){
      top =  maxTop - mapHeight
    }

    if(left + mapWidth < maxLeft){
      left =  maxLeft - mapWidth
    }
    // Actualizar la posición del mapa de manera inmediata, sin inercia ni animación
    mapContent.style.left = left + 'px';
    mapContent.style.top = top + 'px';
  //}


}

function __smoothMapMovement() {
  var inertia = 0.9; // Factor de inercia para el movimiento suave
  var velocityX = 0;
  var velocityY = 0;

  function update() {
    if (Math.abs(velocityX) > 0.1 || Math.abs(velocityY) > 0.1) {
      // Actualizar la posición del mapa con la velocidad
      mapContent.style.left = mapContent.offsetLeft + velocityX + 'px';
      mapContent.style.top = mapContent.offsetTop + velocityY + 'px';

      // Aplicar la inercia
      velocityX *= inertia;
      velocityY *= inertia;

      // Solicitar una nueva animación de fotograma
      requestAnimationFrame(update);
    }
  }

  // Calcular la velocidad basada en el último movimiento del mouse
  velocityX = (lastX - mapContainer.offsetWidth / 2) * 0.1;
  velocityY = (lastY - mapContainer.offsetHeight / 2) * 0.1;

  // Iniciar la animación
  update();
}

  function setMap(){
    var w = $('#mapContent').width()/50,
        h = $('#mapContent').height()/50,
        par = true
        
    console.log('DIMEN', $('#mapContent').children().last())
    for(var i = 0; i < 50; i++){
      
      for(var j = 0; j < 50; j++){

        var cd = $('<div class="pixel"></div>'),
            col = par ? (j % 2 == 0 ? 'white' : 'gray') : (j % 2 != 0 ? 'white' : 'gray')
        cd.css({
          background: col,
          width: w + 'px',
          height: h + 'px'
        })
        $('#mapContent').append(cd)
      }
      par = !par
    }
  }

  // function zoomCanvas(delta, mouseX, mouseY) {
  //   // Controlar los límites de zoom
  //   if (delta > 0) {
  //     currentScale += 0.1; // Incrementar el nivel de zoom
  //   } else {
  //     currentScale = Math.max(0.1, currentScale - 0.1); // Reducir el zoom pero no bajar de 0.1
  //   }

  //   // Calcular la nueva posición del mapa basándose en la posición del mouse
  //   var rect = mapContent.getBoundingClientRect();
  //   var offsetX = (mouseX - rect.left) / rect.width; // Posición relativa del mouse
  //   var offsetY = (mouseY - rect.top) / rect.height; // Posición relativa del mouse

  //   // Aplicar la escala al contenido del mapa
  //   mapContent.style.transform = `scale(${currentScale})`;

  //   // Ajustar la posición del contenido para mantener el mapa centrado en el punto del mouse
  //   var newLeft = (mouseX - offsetX * rect.width * currentScale);
  //   var newTop = (mouseY - offsetY * rect.height * currentScale);

  //   mapContent.style.left = `${newLeft}px`;
  //   mapContent.style.top = `${newTop}px`;
  // }

  function zoomCanvas(delta) {
  // Determinar la dirección del zoom
  var zoomIn = delta < 0; // si delta es negativo, es un zoom in (scroll hacia arriba)
  
  // Calcular la nueva escala
  currentScale = zoomIn ? Math.min(2.0, currentScale + 0.1) : Math.max(0.1, currentScale - 0.1);

  // Aplicar la transformación de escala
  mapContent.style.transform = 'scale(' + currentScale + ')';
  
  // Alinear el contenido en la esquina superior izquierda
  mapContent.style.transformOrigin = '0 0'; // Establecer el origen de la transformación en la esquina superior izquierda
}


// Función para ajustar la posición del mapa tras hacer zoom
function adjustMapPosition() {
  var mapWidth = mapContent.offsetWidth * currentScale;
  var mapHeight = mapContent.offsetHeight * currentScale;
  var containerWidth = mapContainer.offsetWidth;
  var containerHeight = mapContainer.offsetHeight;

  // Asegurar que el mapa no salga de los límites del contenedor
  var left = Math.min(0, Math.max(containerWidth - mapWidth, mapContent.offsetLeft));
  var top = Math.min(0, Math.max(containerHeight - mapHeight, mapContent.offsetTop));

  mapContent.style.left = left + 'px';
  mapContent.style.top = top + 'px';
}

  function mapInit(map){
    $('#btn-next').show()
  }


  function nextMap(){
    // Obtener el centro y los límites del mapa actual
    var center = map.getCenter();
    var bounds = map.getBounds();

    // Calcular el desplazamiento del ancho del mapa
    var east = bounds.getEast(); // Longitud del borde derecho
    var west = bounds.getWest(); // Longitud del borde izquierdo
    var deltaLong = east - west; // Diferencia en longitud (ancho del mapa)

    // Nueva posición centrada a la derecha de la pantalla actual
    var newCenter = L.latLng(center.lat, center.lng + deltaLong);
    
    map.setView(newCenter, 19)
    // Almacenar esta nueva posición para cargar en la nueva pestaña o reubicar el mapa
    //window.open('your-map-url.html?lat=' + newCenter.lat + '&lng=' + newCenter.lng + '&zoom=' + map.getZoom(), '_blank');

  }


  $(function(){
    $('#btn-next').hide()
    $('#map').bind("contextmenu",function(e){
         return false;
    });

    // mapContainer.addEventListener('wheel', function(event) {
    //   event.preventDefault(); // Prevenir el comportamiento por defecto del scroll
    //   var delta = event.deltaY || event.detail || event.wheelDelta;
    //   // Obtener la posición actual del mouse
    //    lastMouseX = event.clientX;
    //    lastMouseY = event.clientY;

    //   zoomCanvas(delta, lastMouseX, lastMouseY);
    // });

    mapContent.addEventListener('mousedown', function(event) {
    isDragging = true;
    lastX = event.clientX;
    lastY = event.clientY;
    mapContentStartX = mapContent.offsetLeft;
    mapContentStartY = mapContent.offsetTop;
    event.preventDefault(); // Evita la selección de texto
  });

  document.addEventListener('mousemove', function(event) {
    if (isDragging) {
      var deltaX = event.clientX - lastX;
      var deltaY = event.clientY - lastY;

      // Actualizar la posición del mapa
      mapContent.style.left = mapContent.offsetLeft + deltaX + 'px';
      mapContent.style.top = mapContent.offsetTop + deltaY + 'px';

      lastX = event.clientX;
      lastY = event.clientY;
    }
  });

  document.addEventListener('mouseup', function(event) {
    if (isDragging) {
      isDragging = false;
      // Iniciar el movimiento suave del mapa
      smoothMapMovement();
    }

    clearInterval(zoomInterval);
  });
    //setMap()
    initMap(CENTER.lat, CENTER.lng, function(evt){
      
    })

    $('#btn-next').click(function(){
      nextMap()
    })

    $('#btn-zoom-in').click(function(){
      zoomCanvas(-1)
    }).mousedown(function(){
      zoomInterval = setInterval(function() {
          zoomCanvas(-1); // Aumentar el zoom
        }, 100); // Intervalo de tiempo en milisegundos
    })

    $('#btn-zoom-out').click(function(){
      zoomCanvas(1)
    }).mousedown(function(){
      zoomInterval = setInterval(function() {
          zoomCanvas(1); // Aumentar el zoom
        }, 100); // Intervalo de tiempo en milisegundos
    })
  })
</script>

@stop

