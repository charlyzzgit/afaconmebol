<link href="{{asset('leaflet/geocoder/geocoder.css') }}" rel="stylesheet">
<link href="{{asset('leaflet/lib/leaflet-dist/leaflet.css') }}" rel="stylesheet">
<link href="{{asset('leaflet/src/Icon.Label.css') }}" rel="stylesheet">
<!-- <link rel="http://cdn.leafletjs.com/leaflet-0.7/leaflet.css" rel="stylesheet"> -->
<link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}" />
<link rel="stylesheet" href="{{asset('leaflet/routing.css')}}" />
 
<style>
	.marker{
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: row;
        flex-direction: row;
        -ms-flex-pack: center;
        justify-content: center;
        -ms-flex-align: center;
        align-items: center;
        position: relative;
        border-radius: 100%;
        font-size: 16px;
        font-weight: bold;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, .3);
        
   }


   .marker-edit{
      width: 1rem;
      height: 1rem;
      left: -0.5rem;
      top: -0.5rem;
      border: thin solid blue;
      border-radius: 100% !important;
      background: white;
   }

   .marker-head{
      width: 2rem;
      height: 2rem;
      left: -1rem;
      top: -1rem;
      border: thick solid blue;
      border-radius: 100% !important;
      background: white;
      padding: 5px
   }




	
      .hide-marker{
        display: none;
      }


      #modal-marker{
        display: none;
        width: 200px;
        background: white;
        box-shadow: 2px 2px 4px rgba(0,0,0,.3);
        border-radius: 5px;
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000000000000000000000
      }


      .label-marker{
         position: absolute;
         z-index: 100000000;
         border: solid thin lightgray;
         box-shadow: 2px 2px rgba(0,0,0,.2);
         background: white;
         color: black;
         font-weight: normal;
         /*display: none;*/
      }

      

      .leaflet-marker-icon{
            background: transparent;
            border: none;
      }

      .linea{
         width: 50px;
         height: 50px;
         color: white;
         font-size: 30px;
         font-weight: bold;
      }

      .name-station{
         font-size: 30px;
         font-weight: bold;
         white-space: nowrap;
      }

      .comb-desde-hasta{
        font-size: 12px;
      }

      .line{
        height: 1px;
      }
		
</style>
<script src="{{asset('leaflet/leaflet-0.7.3/leaflet.min.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>

<script src="{{asset('leaflet/src/Icon.Label.js') }}"></script>
<script src="{{asset('leaflet/geocoder/esri-leaflet.js') }}"></script>
<script src="{{asset('leaflet/geocoder/esri-leaflet-geocoder.min.js') }}"></script>
<script src="{{asset('leaflet/geocoder/gpx.min.js') }}"></script>
<script src="{{asset('leaflet/turf.min.js') }}"></script>
<script src="{{asset('leaflet/draw.js') }}"></script>
<script src="{{asset('leaflet/routing.js') }}"></script>



<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false&libraries=places&key=AIzaSyDHCwd1Btzh0xFM2ksZKbkrmhDQ9uIHFvE" async defer></script> -->
<!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHCwd1Btzh0xFM2ksZKbkrmhDQ9uIHFvE&libraries=places">
</script> -->
<script>
  var directionsService = null
  function googleInit(){
    console.log('ININCIANDO GOOGLE')
    directionsService = new google.maps.DirectionsService;
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3&libraries=geometry&key=AIzaSyDHCwd1Btzh0xFM2ksZKbkrmhDQ9uIHFvE&libraries=places&callback=googleInit" async defer></script>

@include('partials.polygon')
<script>
	var 
    DEFAULT_LAT = -34.6055323,
    DEFAULT_LNG = -58.3832132,
    MARKERS = [],
		 POLYLINES = [],
		 ROUTE,
     CONFIG = {
        color: '#000000',
        stroke: 1,
        opacity:1
     },
     SWAL_POLYGON = null,
     DRAG = false,
     INTERVAL


  function getCoord(calle, num, cdad, callback){  //traduce una direccion a coordenaadas maps (ingresar direccion, ciudad);
    var num = num;
    var y = ' y ';
    if($.isNumeric(num)){
      y = ' ';
    }
    var address = calle + y + num + ', ' + cdad;
        
    var loc = null;
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'address': address}, function(results, status){
      if (status == 'OK') {
            ////console.log('geocoder:', results)
        callback({lat:results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()});
      }else{
        //console.log("Geocoding no tuvo éxito debido a: " + status);
        callback(null);
      }
    });
    
    
  }

  function getLatLng(marker, route){
    if(route !== undefined){
      return {lat:parseFloat(marker.lat), lng:parseFloat(marker.lng)}
    }
    try{
      return {lat:marker._latlng.lat, lng:marker._latlng.lng}
    }catch(e){
      return null
    }
    
  }

  function searchPlace(partido, barrio, callback){  //traduce una direccion a coordenaadas maps (ingresar direccion, ciudad);
    var address = partido
    if(barrio != null){
       address += ', ' + barrio
    }
    
    
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'address': address}, function(results, status){
      if (status == 'OK') {
            
        callback({lat:results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()});
      }else{
        //console.log("Geocoding no tuvo éxito debido a: " + status);
        callback(null, null);
      }
    });
    
    
  }


  // function getAddress(marker, obj){
  //   var geocoder = new google.maps.Geocoder();
  //   geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
  //      if (status == google.maps.GeocoderStatus.OK) {
  //       var address=results[0]['formatted_address'];
  //       //console.log(address)
  //       obj.html(address)
  //      }
  //   })
  // }

  function getAddress(lat, lng, el){
    $.ajax({
                url: 'https://nominatim.openstreetmap.org/reverse',
                type: 'get',
                data: {
                    lat: lat,
                    lon: lng,
                    format: 'json',
                },
                success: function(response) {
                    console.log(response);
                    if (response.display_name) {
                        console.log('ADDRESS', response.display_name)
                        var r = response.display_name,
                            d = r.split(','),
                            address = d[1] + ' ' + d[0] + ' - ' + d[2] + ', ' + d[3]
                        if(el !== undefined){
                          el.html(address)
                        }    
                    } else {
                        el.html('No se pudo obtener la dirección.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al realizar la solicitud de geocodificación inversa:', error);
                }
            });
        
  }

  function intersect(rutaA, rutaB){
    var features = turf.lineIntersect(rutaA.route.toGeoJSON(), rutaB.route.toGeoJSON()),
        latlngs = []
    features.features.forEach(function(feature) {
                          var latlng = L.GeoJSON.coordsToLatLng(feature.geometry.coordinates);
                          latlngs.push(latlng)
                          //L.marker(latlng).addTo(map);
                          //console.log('INTERSECT', latlng)

    });
    return latlngs
  }

  function resetRoute(route){
    if(route != null){
      route.resetRoute()
    }
    route = null
  }

  function equalPoint(a, b){
    return (a.lat == b.lat && a.lng == b.lng) ? true : false
  }

  


	function initMap(lat, lng, callback){ //inicializa el mapa
		//console.log('init map')
      
      map = L.map('map', {zoomControl: false}).setView([lat, lng], 19);
      var tl = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',maxZoom:19}).addTo(map);
      tl.on('load', function(){
        try{
            mapLoad()
        }catch(e){}
      })

      //addSearch()            
          map.on('zoomend', function (e){
            console.log('ZOOM', e)
          }).on('mousedown', function(e){
              //console.log('MAP', e.originalEvent.which)

              // if(e.originalEvent.which == 3){
              //  $('.label-marker').remove()
              //  return;
              // }
            }).on('moveend', function(e){
              
                //ROUTE.updatePositions()
            })
        if(callback != null){

          
            map.on('click', function(e){
              console.log(e)
                callback(e)
            })
          
        }


       
        try{
            mapInit(map)
        }catch(e){}
          
          

       
    }

function setZoom(markers){
    var zoommarkers = [],
        zoomZona = new L.featureGroup()
    $.each(markers, function(i, m){
        var marker = new L.Marker([m._latlng.lat, m._latlng.lng])
        zoommarkers.push(marker)
        zoomZona.addLayer(marker)
    })

    zoomZona.addTo(map);

    map.fitBounds(zoomZona.getBounds())
           
    for(var m = 0; m < zoommarkers.length; m++){
        map.removeLayer(zoommarkers[m])
    }
    // setTimeout(function(){
    //    map.setZoom(20); //
    //  }, 1000)
   


}

function addSearch(){ //habilita el buscador
  
  var searchControl = new L.esri.Controls.Geosearch({position:'topright'}).addTo(map);
  var geocodeService = new L.esri.Services.Geocoding();
  var results = new L.LayerGroup().addTo(map);
   searchControl.on('results', function (data) {
            results.clearLayers();
            console.log('ADDRESS', data)
            for (var i = data.results.length - 1; i >= 0; i--) {
             //results.addLayer(L.marker(data.results[i].latlng));
            }
          });

   
}

function addSearchControl(tag_id, callback){ //agrega un buscador en un div especifico
  
  var searchControl = new L.esri.Controls.Geosearch({defaultMarkGeocode: false, useMapBounds:10}).addTo(map), //useMapBounds es el limite de hasta donde debe buscar (por defecto es 12)
      geocodeService = new L.esri.Services.Geocoding(),
      results = new L.LayerGroup().addTo(map),
      box = $('#' + tag_id)

   searchControl.on('results', function (data) {
      results.clearLayers();
      try{
        window[callback(data)].call
      }catch(e){
        console.log('RESULT SEARCH', e)
      }
      
    });

   document.getElementById(tag_id).appendChild(searchControl.onAdd(map));
   box.find('.geocoder-control-input').removeClass('leaflet-bar').addClass('form-control').css({border:'solid thin lightgray', height: '31px'})
   setTimeout(function(){
    box.find('.geocoder-control-input').show()
   }, 1000)
   
}

function getIcon(label, markerClass, style, hover){
  var size = hover !== undefined ? hover : 1
  var anchor = markerClass == 'marker-estacion' ? 5*size : 1
 
  
	return L.divIcon({
       iconAnchor: [anchor, anchor],
       labelAnchor: [0, 0],
       popupAnchor: [0, 0],
       //zIndexOffset: markerClass == 'marker-estacion' ? 50000000 : ((style == 'marker-tramo' || style == 'marker-parada') ? 20000000 : 10000),
       zIndexOffset: (markerClass == 'marker-origen' || markerClass == 'marker-destino') ? 1000 : 50000000,
       html: '<div class="marker ' + markerClass + '" ' + style + '>' + label + '</div>'
   })
}

function addMarker(latlng, title, drag, markerClass, parada){ //agrega un marcador en el mapa
 	var lat = latlng.lat,
       lng = latlng.lng
		 marker = new L.Marker(
    [lat, lng],
    {
      icon: getIcon(title, markerClass),
      title: title,
      draggable:drag,
      index: POLYLINES.length,
      parada: parada !== undefined ? parada : false
    })
     // if(markerClass != 'hide-marker'){
     //   marker.on('dragstart', function(){
     //      DRAG = true
     //    })
     //    .on('drag', function(e){

     //        var index = e.target.options.index
     //        ////console.log('index', index)
     //        POLYLINES[index][0] = e.target._latlng.lat
     //        POLYLINES[index][1] = e.target._latlng.lng
     //        setPolyLine()

     //    })
     //  }

      // .on('mousedown', function(e){

      //   if(e.originalEvent.which == 3) {
           
      //     markerAlert(e)
      //   }
      // })
  //POLYLINES.push([lat, lng])
  //MARKERS.push(marker)
  marker.addTo(map)
  //setPolyLine()
  return marker
}

function addMarkerEvent(latlng, title, markerClass, callback){ //agrega un marcador en el mapa
  var lat = latlng.lat,
       lng = latlng.lng
     marker = new L.Marker(
                  [lat, lng],
                  {
                    icon: getIcon(title, markerClass),
                    title: title,
                    draggable:false
                  })
  if(callback !== undefined){
    marker.on('click', function(evt){
      callback(evt.latlng)
    })
  }
     
  marker.addTo(map)
  
  return marker
}


function addSingleMarker(latlng, title, drag, markerClass, style, level){ //agrega un marcador en el mapa
  var lat = latlng.lat,
       lng = latlng.lng,
       options = {
                    icon: getIcon(title, markerClass, style),
                    title: title,
                    draggable:drag
                  }
      if(level !== undefined){
        options = Object.assign(options, {zIndexOffset: 1000 })
       
      }
     marker = new L.Marker(
        [lat, lng],
        options
        )
        .on('dragstart', function(){
          
        })
        .on('drag', function(e){
            
        })
       
    if(markerClass == 'marker-destino'){
          marker.on('click', function(e){
            //console.log(e)
              addMarker({lat:e.latlng.lat, lng:e.latlng.lng}, '', false, 'marker-tramo')
          })
    }
 //console.log('MMM', marker)
  marker.addTo(map)
  return marker
}


// function resetRoute(){
//    removeMarkers()
//    POLYLINES = []
//    if(ROUTE != null){
//      map.removeLayer(ROUTE)
//      ROUTE = null;
//    }
   

// }

function setPolyLine(){
   if(ROUTE != null){
    map.removeLayer(ROUTE)
  }

  ////console.log('polylines', POLYLINES)
  
  ROUTE = L.polyline(POLYLINES, {
    color: CONFIG.color,
    weight: CONFIG.stroke,
    opacity: CONFIG.opacity
  }).addTo(map)

  //ROUTE.addTo(map)
}




function removeMarkers(){ //elimina marcadores del mapa

  for(var m = 0; m < MARKERS.length; m++){
    map.removeLayer(MARKERS[m])
  }

  MARKERS = []
}

function resetMarker(marker){
  if(marker == null){
    return
  }
  map.removeLayer(marker)
  
}


function ctrlZ(route){
  if(route == null){
    return
  }
  route.fin = false
  if(route.reverse){
    var last = 0
    map.removeLayer(route.markers[last])
    route.markers.splice(last, 1)
    route.polylines.splice(0, 1)
  }else{
    var last = route.markers.length - 1
    if(last < 0){
        return;
    }
    map.removeLayer(route.markers[last])
    route.markers.splice(last, 1)
    route.polylines.splice(route.polylines.length - 1, 1)
  }
    
    
    route.setPolyLine()
}

function setParada(){
  MARKERS[MARKERS.length - 1].setIcon(getIcon('', 'marker-parada'))
  MARKERS[MARKERS.length - 1].options.parada = true
}

function markerAlert(m){
  var index = parseInt(m.target.options.index)
  //     modalMarker = $('#modal-marker')
  // setZoom([m.target])
  MARKERS[index].setIcon(getIcon('', 'marker-alert'))
 
  map.removeLayer(MARKERS[index])
  MARKERS.splice(index, 1)
  setPolyLine()

  //modalMarker.fadeIn(150)
}


function ruta(map, ramal, edit){
  this.edit = edit !== undefined ? true : false
  this.linea = ramal != null ? ramal.name : 'FROMTO'
  this.id = ramal != null ? ramal.id : 0
  this.map = map
  this.fin = false
  this.color = ramal != null ? ramal.color : '#000000'
  this.stroke = 5
  this.opacity = ramal != null ? 1 : .5
  this.markers = []
  this.positionMarkers = []
  this.polylines = []
  this.points = []
  this.route = null
  this.estacion = false
  this.estaciones = []
  this.frames = []
  this.animateMarkers = [];
  this.frameIndex = 0;
  this.isAnimate = false
  this.animateMarker
  this.insert = null
  this.update = false
  this.routes = []
  this.position = 0
  this.hidden = false
  this.animateStyle = null
  this.pause = false
  this.endTravel = true
  this.stop = true
  this.resume = false
  this.legFrames = 5
  this.reverse = false
  this.zoomEnabled = true
  this.styleRoute = null
  


  this.setStyleRoute = function(dashArray){
    this.styleRoute = dashArray
  }


  this.setColor = function(color){
    this.color = color
  }

  
  
  this.setPolyLine = function(){
                         if(this.route != null){
                            this.map.removeLayer(this.route)
                          }

                        var options = {
                          color: this.color,
                          weight: this.stroke,
                          opacity: this.hidden ? 0 : this.opacity
                        }

                        if(this.styleRoute != null){
                          options = Object.assign(options, {dashArray: this.styleRoute, lineCap: 'round'})
                        }
                        
                        this.route = L.polyline(this.polylines, options).addTo(this.map)

                        //ROUTE.addTo(map)
                      }
                      
   
  this.getStyle = function(e){
        var parent = this
                    if(e == null){
                      return ''
                    }
                    return 'style="\
                              border: solid thick ' + parent.color + ';\
                              background: white\
                            "'
                  }

  this.setAnimateStyle = function(linea){
      this.animateStyle =  'style="\
                    border: solid thick ' + linea.color_b + ';\
                    background:' + linea.color_a + ';\
                    color:' + linea.color_c + ';\
                  "'
  }

                      
  this.addMarker = function(latlng, title, drag, markerClass, parada){ //agrega un marcador en el mapa
                        console.log('MARKER CLASS', markerClass)

                        var lat = latlng.lat,
                            lng = latlng.lng,
                            parent = this,
                            style = this.getStyle(parada),
                            marker = new L.Marker(
                                [lat, lng],
                                {
                                  icon: getIcon(title, markerClass, style), //
                                  title: title,
                                  draggable:drag,
                                  index: this.polylines.length,
                                  parada:parada
                                }
                              )
                        if(markerClass != 'hide-marker'){
                             marker.on('dragstart', function(e){
                               
                                DRAG = true
                              })
                              .on('drag', function(e){
                                 if(!parent.edit){
                                    return
                                 }
                                  var index = e.target.options.index
                                  ////console.log('index', index)
                                  parent.polylines[index][0] = e.target._latlng.lat
                                  parent.polylines[index][1] = e.target._latlng.lng
                                  parent.setPolyLine()

                              })
                              .on('click', function(e){
                                if(!parent.edit){
                                    return
                                }
                                var marker = e.target

                                parent.setParada(marker.options)
                                
                              }).on('mouseover', function(e){
                                console.log(e.target._latlng.lat, e.target._latlng.lng)
                              })
                              
                        }

                        if(this.insert != null){
                          this.insertTo(marker)
                        }else{
                          this.polylines.push([lat, lng])
                          this.markers.push(marker)
                          marker.addTo(this.map)
                          this.setPolyLine()
                        }
                        
                        return marker
                  }
    this.insertTo = function(marker){
      var pos = this.insert.position,
          parent = this,
          newPolylines = [],
          newMarkers = [],
          index = 0
      $.each(parent.polylines,function(i, p){
        if(i == pos){
          if(parent.insert.inTo == 'before'){
          
            newPolylines.push([marker._latlng.lat, marker._latlng.lng])
            marker.options.index = index++
            newMarkers.push(marker)

            newPolylines.push(p)
            parent.markers[i].options.index = index++
            newMarkers.push(parent.markers[i])
          }else{
            newPolylines.push(p)
            parent.markers[i].options.index = index++
            newMarkers.push(parent.markers[i])

            newPolylines.push([marker._latlng.lat, marker._latlng.lng])
            marker.options.index = index++
            newMarkers.push(marker)

          }
        }else{
          newPolylines.push(p)
            parent.markers[i].options.index = index++
            newMarkers.push(parent.markers[i])
        }
        
      })
      parent.polylines = newPolylines
      parent.markers = newMarkers
      parent.insert = null
      marker.addTo(this.map)
      this.setPolyLine()
    }

    this.insertTozz = function(marker){
      var pos = this.insert.position,
          parent = this,
          points = parent.points
          newPoints = []
      $.each(points, function(i, p){
        if(parent.insert.inTo == 'before'){
          if(i == pos - 1){
            newPoints.push({lat:marker._latlng.lat, lng:marker._latlng.lng, parada:false})
          }else{
            newPoints.push(p)
          }
        }else{
          if(i == pos + 1){
            newPoints.push({lat:marker._latlng.lat, lng:marker._latlng.lng, parada:false})
          }else{
            newPoints.push(p)
          }
        }
      })
      parent.points = newPoints
      this.set(newPoints)
    }

    this.deletePoint = function(pos){
      //console.log(this.points)
      this.points.splice(pos, 1)
      this.update = true
      this.set(this.points)
    }

    this.deletePoints = function(indexes){
      var parent = this,
          points = []
      $.each(parent.points, function(i, p){
        if(!indexes.includes(i)){
          points.push(p)
        }
      })
      console.log('DELETE', points)
      if(points.length == 0){
        parent.resetRoute()
        return
      }
      parent.update = true
      parent.set(points)
    }
    this.singleMarker = function(latlng, title, drag, markerClass, style){ //agrega un marcador en el mapa
      
                            var lat = latlng.lat,
                                lng = latlng.lng,
                                parent = this,
                               marker = new L.Marker(
                              [lat, lng],
                              {
                                icon: getIcon(title, markerClass, style),
                                title: title,
                                draggable:drag,
                                parada:markerClass.includes('parada')
                              })
                                .on('dragstart', function(){
                                  
                                })
                                .on('drag', function(e){
                                    
                                })
                                // .on('contextmenu', function(e){
                                
                                //   //e.originalEvent.stopPropagation()
                                //   var marker = e.target

                                //   ROUTE.setEstacion(marker.options.index)
                                //   return
                                // })

                              if(markerClass == 'marker-destino'){
                                    marker.on('click', function(e){
                                      //console.log(e)
                                        parent.addMarker({lat:e.latlng.lat, lng:e.latlng.lng}, '', false, 'marker-tramo')
                                        parent.fin = true
                                    })
                              }
                              

                            //console.log('MMM', marker)  
                            marker.addTo(parent.map)
                            return marker
                        }
    
    
    this.setParada = function(options){
                        var url = ""
                        url = url.replace('pos', options.index) 
                        url = url.replace('stop', options.parada ? 1 : 0) 
                       
                        modalParada.openModal(url)
                      }
    this.updatePoint = function(isParada, index){
      //console.log('UPDATE', isParada)
      this.markers[index].setIcon(getIcon('', isParada ? 'marker-parada' : 'marker-edit', ''))
      this.markers[index].options.parada = isParada
      
    }
    this.addParada = function(){
      if(this.markers.length == 0){
        return
      }
      var index = this.reverse ? 0 : this.markers.length - 1
      var m = this.markers[index]
      m.setIcon(getIcon('', 'marker-parada'))
      m.options.parada = true
    }
    this.insertPoint = function(isAfter, index){
      this.insert = { inTo:isAfter ? 'after' : 'before', position: index != undefined ? index : 0}

    }
    this.getRoute = function(){
                        var points = []
                        $.each(this.markers, function(i, marker){
                            points.push({
                              lat: marker._latlng.lat,
                              lng: marker._latlng.lng,
                              parada: marker.options.parada
                            })
                        })

                        return points
                    }
    this.removeMarkers = function(){
                            for(var m = 0; m < this.markers.length; m++){
                                this.map.removeLayer(this.markers[m])
                            }

                            this.markers = []
                        }
    this.resetRoute = function(){
                          this.removeMarkers()
                           this.polylines = []
                           if(this.route != null){
                             this.map.removeLayer(this.route)
                             this.route = null;
                           }
                      }
    this.set = function(points){

                  var mks = [],
                      origin = null,
                      destination = null,
                      parent = this
                  this.points = points
                  this.fin = false
                 
                  if(points.length != 0){
                    
                    this.resetRoute()
                    
                    $.each(points, function(i, m){
                      var parada = (i == 0 || i == points.length - 1) ? true : (m.parada !== undefined ? m.parada : false)
                      var mclass = parent.hidden ? 'hide-marker' : (parada ? 'marker-parada' : parent.edit ? 'marker-tramo' : 'hide-marker')
                      
                      //console.log('antes add', mclass)
                      parent.addMarker({lat:m.lat, lng:m.lng}, '', parent.edit, mclass, parada)
                      // if(){
                      //   estacion = Object.assign(estacion, {index:i, num: parent.estaciones.length, linea_id: parent.id})
                      //   parent.estaciones.push(estacion)
                      // }
                    })
                    //console.log('MARKERS', this.markers)
                    
                  }

                  if(this.edit){
                    if(!this.update){
                      //parent.map.setView(parent.markers[parent.markers.length - 1]._latlng, 17)
                      
                    }else{
                      this.update = false
                    }
                    
                  }
                  if(this.zoomEnabled){
                    setTimeout(function(){
                          preload()
                          parent.zoom()
                        }, 1000)
                  
                  }
                }
    this.getMarker = function(index){
                          return this.markers[index]
                      }

    
    this.getDistance = function(){
                          var d = 0

                          for(var i = 1; i < this.markers.length; i++){
                            var a = this.markers[i - 1],
                                b= this.markers[i]

                                d += getDistance([a._latlng.lat, a._latlng.lng],[b._latlng.lat, b._latlng.lng])
                            
                          }
                          d = d/1000
                          return d.toFixed(2)
                        }
    this.zoom = function(){
      if(this.markers.length == 0){
        return
      }

      var zoommarkers = [],
          zoomZona = new L.featureGroup(),
          parent = this
      $.each(parent.markers, function(i, m){
        var marker = new L.Marker([m._latlng.lat, m._latlng.lng])
        zoommarkers.push(marker)
        zoomZona.addLayer(marker)
      })

      zoomZona.addTo(parent.map);
      
      parent.map.fitBounds(zoomZona.getBounds())
           
      for(var m = 0; m < zoommarkers.length; m++){
          parent.map.removeLayer(zoommarkers[m])
      }
    }
    
    
    this.animateTramo = function(){
      var m = $('#point')
      var size = parseInt(m.width()/2)
      var parent = this
      var vel = 1
      var desde = parent.animateMarkers[parent.frameIndex]
      

      parent.frameIndex++
      var hasta = parent.animateMarkers[parent.frameIndex]
      if(parent.frameIndex > parent.animateMarkers.length - 1){
        return
      }
      


      parent.map.setView(hasta._latlng, 17)
      var frame = parent.getLayers(hasta)
      var D = getDistance([desde._latlng.lat, desde._latlng.lng],[hasta._latlng.lat, hasta._latlng.lng])
      
      
      var aceleracion = 5/10000;
      var time = D/vel//Math.round(Math.sqrt((2 * D) / aceleracion));
      //console.log('TIEMPO', parent.frameIndex, time, D)
      m.animate({
        top:frame.top - size,
        left:frame.left - size
      },time , function(){ parent.animateTramo()})
    }

    

    this.getLayers = function(m){
      var layerPoint = this.map.latLngToLayerPoint(m.getLatLng()),
          containerPoint = ROUTE.map.layerPointToContainerPoint(layerPoint)
          return { 
                    left: containerPoint.x, 
                    top: containerPoint.y
                  }
    }

    this.hideAll = function(){
      var parent = this
      $.each(parent.markers, function(i, m){
        m.setIcon(getIcon('', 'hide-marker'))
      })
      parent.route.setStyle({opacity:0})
    }

    this.showAll = function(){
      var parent = this
      $.each(parent.markers, function(i, m){
        var markerClass = (m.options.parada ? 'marker-parada' : parent.edit ? 'marker-tramo' : 'hide-marker')
        m.setIcon(getIcon('', markerClass, parent.getStyle(m.options.parada)))
      })
      parent.route.setStyle({opacity:1})
    }



    

   

      this.setRoutes = function(routes){
        this.resetRoute()
        this.routes = routes
        this.position = 0
        this.hidden = true
        this.set(routes[0]) 
        this.animateRoute(true, true)
      }


      this.animateRoute = function(points, init){
        var parent = this
        if(init != undefined){
          parent.endTravel = false
          //parent.stop = false
          parent.frameIndex = parent.position != 0 ? parent.position : 0
          parent.resetRoute()
          parent.points = points
        }
        if(parent.endTravel){
          parent.map.removeLayer(parent.animateMarker)
          parent.animateMarker = null
          return
        }
        if (parent.frameIndex >= parent.points.length) {
            return
        }

        if(parent.pause){
          return
          //si ya no existen las paradas no pararia nunca
          // if(parent.isParada()){
          //   console.log('PARO')
          //   return
          // }
        }

        


        var before = getLatLng(parent.points[this.frameIndex], true)

        if(init !== undefined){
          if(!parent.resume){
            parent.animateMarker = parent.singleMarker(getLatLng(parent.points[this.frameIndex], true), '<i class="fas fa-bus"></i>', false, 'animate-marker', parent.animateStyle)
          }
        }


          this.frameIndex++
          var after = getLatLng(parent.points[this.frameIndex], true);
          if (after) {
            parent.animationMarker(before, after)
            var bounds = L.latLngBounds([before, after]);
            parent.map.fitBounds(bounds, {
                animate: true,
                duration: 3
            });
          }


      }

      this.isOut = function(marker){
        var l = this.getLayers(marker)
        var w = window.innerWidth
        var h = window.innerHeight
        var out = true
        if(l.top > 100 && l.top < h -100 && l.left > 100 && l.left < w - 100){
          out = false
        }

        return out
      }

      this.animationMarker = function(pointA, pointB) {
            var D = getDistance([pointA.lat, pointA.lng],[pointB.lat, pointB.lng])
            
            var frames = Math.round(D)*this.legFrames//100; // Número de frames para la animación
            //console.log('FRAMES', frames)
            //var vel = .5
            
            var duration =frames///100// D/vel//2000; // Duración total de la animación en milisegundos
            var currentFrame = 0;

            var startLatLng = pointA;
            var endLatLng = pointB;

            if(this.stop){
              return
            }

            this.updateMarker(pointA, pointB, frames, duration, currentFrame);
          }
      this.updateMarker = function (startLatLng, endLatLng, frames, duration, currentFrame) {
        var parent = this
        var fraction = frames != 0 ? currentFrame / frames : 0;
        var D = getDistance([startLatLng.lat, startLatLng.lng],[endLatLng.lat, endLatLng.lng])
        //var vel = .5
        var duration = D //D/vel
        
        var interpolatedLatLng = L.latLng([
                startLatLng.lat + fraction * (endLatLng.lat - startLatLng.lat),
                startLatLng.lng + fraction * (endLatLng.lng - startLatLng.lng)
              ]);

        parent.animateMarker.setLatLng(interpolatedLatLng);

        currentFrame++;
        //console.log('DURATION', Math.round(duration/frames) - 10*fraction)

        

        if (currentFrame <= frames) {
          setTimeout(function(){
              //console.log('time out')
              parent.updateMarker(startLatLng, endLatLng, frames, duration, currentFrame)
          }, (duration / frames)); //(Math.round(duration/frames) - 10*fraction)//duration / frames
        }else{
          
          parent.animateRoute()
        }
      }

      this.acelerar = function(value){
        var f = (11 - value)
        console.log('VEL', f)
        this.legFrames = f
      }

      this.isParada = function(){
        
           return  this.points[this.frameIndex].parada !== undefined ? true : false
        
       
      }

      this.optimize = function(){
                          var points = this.getRoute()
                          if(points.length == 0){
                            return
                          }
                          console.log('OPTIMIZE ANTES', points)
                          var newLatLngs = [];
                          for (var i = 0; i < points.length - 1; i++) {
                              newLatLngs.push({
                                lat: points[i].lat,
                                lng: points[i].lng,
                                isParada: points[i].isParada
                              }); // Añade el punto inicial

                              var distance = getDistance(toCoordArray(points[i].lat,points[i].lng) , toCoordArray(points[i + 1].lat,points[i + 1].lng)); // Calcula la distancia entre dos puntos consecutivos
                              console.log('DISTANCE', distance)
                              if (distance > 100) {
                                  var numPoints = Math.ceil(distance / 100); // Calcula el número de puntos intermedios necesarios
                                  var deltaLat = (points[i + 1].lat - points[i].lat) / numPoints;
                                  var deltaLng = (points[i + 1].lng - points[i].lng) / numPoints;
                                  console.log('POINTS', numPoints)
                                  for (var j = 1; j < numPoints; j++) {
                                      var newLat = points[i].lat + j * deltaLat;
                                      var newLng = points[i].lng + j * deltaLng;
                                      //newLatLngs.push(L.latLng(newLat, newLng)); // Añade los puntos intermedios
                                      newLatLngs.push({
                                        lat: newLat,
                                        lng: newLng,
                                        isParada: false
                                      });
                                  }
                              }
                          }
                          var last = points.length - 1

                         newLatLngs.push({
                                lat: points[last].lat,
                                lng: points[last].lng,
                                isParada: points[last].isParada
                              }); // Añade el último punto
                         //polyline.setLatLngs(newLatLngs);//route.set()
                         console.log('OPTIMIZE DESPUES', points.length)
                         points = newLatLngs
                         this.set(points)
                      }
}








function pointExists(points, p){
  var e = false
  $.each(points, function(i, point){
    if(point.lat == p.lat && point.lng == p.lng){
      e = true
    }
  })
  return e
}

function mergePoints(points, pts){
  $.each(pts, function(i, p){
    if(!pointExists(points, p)){
      points.push(p)
    }
  })
  return points
}

function getIndex(routes, id){
  for(var i = 0; i < routes.length; i++){
    if(routes[i].id == id){
      return i
    }
  }
  return null
}

function drawTraza(linea, map, routes){
  var markers = []
  var points = []
   $.each(linea.tramos, function(i, tramo){
   if(tramo.points != null){
        points = mergePoints(points, JSON.parse(tramo.points))
     }
   })
  
  var route = new ruta(map, linea)
      
  route.set(points)
  markers = route.markers
  if(routes !== undefined){
    var index = getIndex(routes, linea.id)
    if(index != null){
      routes[index] = route
    }else{
      routes.push(route)
    }
    
  }

   $('.marker-tramo').hide()
   if(routes !== undefined){
      return 
   }
   setZoom(markers)
}


function getEstacionesLinea(linea){
  var estaciones = []
   $.each(linea.tramos, function(i, tramo){
      var points = JSON.parse(tramo.points)
      $.each(points, function(p, pt){
        if(pt.estacion != null){
            estaciones.push(pt)
        }
      })
   })

   return estaciones
}


function getCombinaciones(lineas, data){
  var comb = [],
      estacion = data.estacion

   $.each(lineas, function(i, l){
      if(l.id != data.linea_id){
        
         var estaciones = getEstacionesLinea(l)

         $.each(estaciones, function(j, e){
            var d = getDistance([data.lat, data.lng],[e.lat, e.lng])
            ////console.log('DIST', estacion.lat, estacion.lng, e.lat, e.lng, d)
            if(d <= 200){
              comb.push({
                linea:l.linea,
                origin:l.origen,
                destination:l.destino,
                estacion:e.estacion.name,
                color: l.color
              })
            }
         })
      }
   })

   return comb
}

function toCoordArray(lat, lng){
  return [lat, lng]
}


function getDistance(origin, destination) {
    // return distance in meters
    var lon1 = toRadian(origin[1]),
        lat1 = toRadian(origin[0]),
        lon2 = toRadian(destination[1]),
        lat2 = toRadian(destination[0]);

    var deltaLat = lat2 - lat1;
    var deltaLon = lon2 - lon1;

    var a = Math.pow(Math.sin(deltaLat/2), 2) + Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(deltaLon/2), 2);
    var c = 2 * Math.asin(Math.sqrt(a));
    var EARTH_RADIUS = 6371;
    return c * EARTH_RADIUS * 1000;
}
function toRadian(degree) {
    return degree*Math.PI/180;
}

// $(document).contextmenu(function() {
//     return false;
// });

// function setCombinaciones(linea, lineas){

//    var estaciones = getEstacionesLinea(linea),
       
   
//    $.each(estaciones, function(i, e){
//       //console.log('COMBINACION', e.estacion.name, combinaciones(linea, lineas, e))
     
//    })
// }

function Polygon(map, color, edit){
  this.map = map
  this.id = null
  this.stroke = 5
  this.opacity = 1
  this.color = color
  this.polygon = null
  this.polylines = []
  this.markers = []
  this.selections = []
  this.recyclers = []
  this.edit = edit !== undefined ? true : false
  this.enabled = true
  this.insert = null
  this.lastPosition = -1
  this.callback = null
  this.over = null
  this.setId = function(id){
    this.id = id
  }
  this.disabled = function(){
    this.enabled = false
    this.opacity = .2
  }

  this.setOpacity = function(opacity){
    this.opacity = opacity
  }

  this.clickable = function(){
    this.click = true
  }

  this.addMarker = function(latlng){ //agrega un marcador en el mapa
            var lat = latlng.lat,
                lng = latlng.lng,
                parent = this,
                markerClass = this.enabled ? 'marker-polygon': 'hide-marker'
            
           
            var icon = L.divIcon({

                        iconAnchor: [0.75, 0.75],
                        labelAnchor: [0, 0],
                        popupAnchor: [0, 0],
                        zIndexOffset: 10000,
                        html:'<div class="marker ' + markerClass + '"></div>'
                 });


            
            var marker = new L.Marker(
                [lat, lng],
                {
                    icon: icon, //new SweetIcon(),
                    title: 'title',
                    draggable:parent.edit,
                    index: parent.polylines.length // saque -1 porque aca todavia no se agrego la nueva polilinea
                })
            if(parent.enabled){
                marker.on('dragstart', function(){
                    
                })
                .on('drag', function(e){
                    
                    var index = e.target.options.index;
                    ////console.log('drag', POLYLINES)
                    parent.polylines[index][0] = e.target._latlng.lat;
                    parent.polylines[index][1] = e.target._latlng.lng;
                    parent.set('drag');
                    

                })
                .on('click', function(e){
                  var index = e.target.options.index;
                    parent.editPoint(index)
                })
            }
            if(this.insert != null){
              this.insertTo(marker)
            }else{
                parent.polylines.push([lat, lng]);
                parent.markers.push(marker)
                marker.addTo(parent.map)
                //parent.lastPosition = parent.markers.length - 1
            }
            parent.set();

        }
  this.removeMarker = function(pos){
      var parent = this
      parent.map.removeLayer(parent.markers[pos])
      parent.markers.splice(pos, 1)
      $.each(parent.markers, function(i, m){
        parent.markers[i].options.index = i
      })
  }
  this.getPolylines = function(){
    return this.polylines
  }

  this.setPolylines = function(polylines){
    var parent = this
    $.each(polylines, function(i, p){
      parent.addMarker(L.latLng(p))
    })
  }

  this.set = function(){ //genera un poligono y lo inicializa
      var parent = this
          if(parent.polygon != null){
             parent.map.removeLayer(parent.polygon);
            
          }
            console.log('POLYLINES POL', parent.polylines)
          parent.polygon = L.polygon(parent.polylines, {
                color: parent.color,
                stroke:1,
                opacity: parent.opacity
            });
        if(parent.edit){
          parent.polygon.on('click', function(evt){
              parent.polygon = evt.target;
              parent.selections = []
              parent.recyclers = []
              $.each(ROUTE.markers, function(i, marker){
                if(parent.polygon.contains(marker.getLatLng())){
                  parent.selections.push(i);
                  parent.recyclers.push(marker)
                }
              })

              

              SWAL_POLYGON = Swal.fire({
                title: 'Agrupar Puntos',
                text: parent.selections.join(','),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#006600',
                cancelButtonColor: '#FF0000',
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Eliminar',
                showCloseButton: true, // Botón 3 (cerrar)
                footer: '<button class="btn btn-dark" id="close-button">Cancelar</button>'
              })

              $('#close-button').click(function(){
                parent.remove()
                SWAL_POLYGON.close()
              })

              SWAL_POLYGON.then((result) => {
                console.log('CONFIG', result)
                if (result.isConfirmed) {
                  SWAL_POLYGON.close()
                  swalSiNo('Guardar Puntos', '¿Guardar grupo?', function(){
                      console.log('SELECTIONS', parent.selections)
                      RECYCLER = parent.recyclers
                      $('#restore-recycler').show()
                      parent.remove()
                  })
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                  SWAL_POLYGON.close()
                  swalSiNo('Eliminar Puntos', '¿Eliminar grupo?', function(){
                      console.log('SELECTIONS', parent.selections)
                      ROUTE.deletePoints(parent.selections)
                      parent.remove()
                  })
                }
              }); 

              
            })
          
        }
        if(parent.callback != null){
          parent.polygon.on('click', function(evt){
            parent.callback(parent.id)
          }).on('mouseover', function(evt){
            parent.polygon.setStyle({fillOpacity:.75})
            if(parent.over != null){
              parent.over(parent.id)
            }
          }).on('mouseout', function(evt){
            parent.polygon.setStyle({fillOpacity:.2})
            if(parent.over != null){
              parent.over()
            }
          })
        }
      parent.polygon.addTo(parent.map);
      parent.lastPosition = parent.markers.length - 1
      

  }

  this.zoom = function(){
      if(this.markers.length == 0){
        return
      }

      var zoommarkers = [],
          zoomZona = new L.featureGroup(),
          parent = this
      $.each(parent.markers, function(i, m){
        var marker = new L.Marker([m._latlng.lat, m._latlng.lng])
        zoommarkers.push(marker)
        zoomZona.addLayer(marker)
      })

      zoomZona.addTo(parent.map);
      
      parent.map.fitBounds(zoomZona.getBounds())
           
      for(var m = 0; m < zoommarkers.length; m++){
          parent.map.removeLayer(zoommarkers[m])
      }
    }

  this.undo = function(){
                var last = this.lastPosition
                console.log('LAST', last)
                if(last < 0){
                    return;
                }
                this.map.removeLayer(this.markers[last])
                this.markers.splice(last, 1)
                this.polylines.splice(last, 1)
                this.set()
  }

  this.editPoint = function(index){
                        var url = ""
                        url = url.replace('::', index) 
                        
                       
                        modalPolygon.openModal(url)
                      }

  this.insertPoint = function(index){
    this.insert = index

  }

  this.insertTo = function(marker){
    var parent = this,
        pos = this.insert,
        newMarkers = [],
        newPolylines = [],
        insertado = false,
        index = 0
    
    if(pos >= parent.markers.length){
      pos = 0
    }
    if(pos < 0){
      pos = parent.markers.length - 1
    }
    for(var i = 0; i < parent.markers.length; i++){
      var m = parent.markers[i],
          poly = parent.polylines[i]
      if(i == pos){
        marker.options.index = index
        index++
        newMarkers.push(marker)
        newPolylines.push([marker._latlng.lat, marker._latlng.lng])
      }
        m.options.index = index++
        newMarkers.push(m)
        newPolylines.push([m._latlng.lat, m._latlng.lng])
      
    }
    parent.insert = null
    parent.polylines = newPolylines
              
    parent.markers = newMarkers
    marker.addTo(parent.map)
    parent.set()
  }

  this.deletePoint = function(pos){
      var parent = this,
          newMarkers = []
      $.each(parent.markers, function(i, m){
        parent.map.removeLayer(m)
      })
      parent.map.removeLayer(parent.polygon)
      parent.polylines = []
      $.each(parent.markers, function(i, m){
        if(i != pos){
          newMarkers.push(m)
        }
      })

      parent.markers = []
      
      parent.set()
      
      $.each(newMarkers, function(i, m){
        parent.addMarker(m._latlng)
      })

  } 



  this.remove = function(){
    var parent = this
    $.each(parent.markers, function(i, m){
      parent.map.removeLayer(m)
    })
    parent.map.removeLayer(parent.polygon)
    
    POLYGON = null

  }
}


function Ruteo(map, options){
  this.route = null
  this.map = map
  this.options = options !== undefined ? options : null
  this.path = []
  this.reset = function(){
    //this.route.removeFrom(this.map);
    this.map.removeLayer(this.route)
  }
  this.routing = function(waypoints, callback){
    var params = {waypoints: waypoints},
    parent = this
    if(parent.options != null){
      params = Object.assign(params, parent.options)
    }
    console.log('OPTIONS', params)
    parent.route = L.Routing.control(params) //.addTo(parent.map);
    parent.route.on('routesfound', function(event) {
        var routes = event.routes;
        routes.forEach(function(route) {
          parent.path = route.coordinates;
          try{
            callback(route.coordinates)
            parent.map.removeLayer(route.coordinates)
          }catch(e){

          }
        });
        parent.route.off(); 
       
    });

    parent.route.route()
  }
  this.getPoints = function(){
    return this.path
  }
}


function distanciaPuntoSegmento(p, p1, p2) {
  var A = p.lat - p1.lat;
  var B = p.lng - p1.lng;
  var C = p2.lat - p1.lat;
  var D = p2.lng - p1.lng;

  var dot = A * C + B * D;
  var len_sq = C * C + D * D;
  var param = dot / len_sq;

  var xx, yy;

  if (param < 0 || (p1.lat == p2.lat && p1.lng == p2.lng)) {
    xx = p1.lat;
    yy = p1.lng;
  } else if (param > 1) {
    xx = p2.lat;
    yy = p2.lng;
  } else {
    xx = p1.lat + param * C;
    yy = p1.lng + param * D;
  }

  var dx = p.lat - xx;
  var dy = p.lng - yy;
  return Math.sqrt(dx * dx + dy * dy);
}

function pasaCerca(lat, lng, points){
  var distanciaMinimaEnSegmentos = Number.POSITIVE_INFINITY,
      punto = L.latLng(lat, lng),
      polylineCoordinates = []
  
  //  $.each(points, function(i, p){
  //    polylineCoordinates.push([p.lat, p.lng])
  //  })

  // for (var i = 0; i < polylineCoordinates.length - 1; i++) {
  //   var segmentoInicio = L.latLng(polylineCoordinates[i]);
  //   var segmentoFin = L.latLng(polylineCoordinates[i + 1]);

  //   var distanciaSegmento = distanciaPuntoSegmento(punto, segmentoInicio, segmentoFin);

  //   if (distanciaSegmento < distanciaMinimaEnSegmentos) {
  //     distanciaMinimaEnSegmentos = distanciaSegmento;
  //   }
  // }
  // console.log('INFINITE', distanciaMinimaEnSegmentos)
  // return distanciaMinimaEnSegmentos <= 100 ? true : false
  var minD = Number.POSITIVE_INFINITY
  $.each(points, function(i, p){
    
    if(i != 0){
      var a = points[i - 1],
          b = p
      var coef = getCoeficientesRecta(a.lat, a.lng, b.lat, b.lng)

      var d = distanciaPuntoRecta(lat, lng, coef.a, coef.b, coef.c)

      if(d < minD){
        minD = d
      }
    }
  })

  console.log('MIN', minD)

  return minD <= 100 ? true : false

}

// ******************************************************************

function getCoeficientesRecta(x1, y1, x2, y2) {
  // Calcular la pendiente (m)
  const pendiente = (y2 - y1) / (x2 - x1);

  // Coeficientes de la recta
  const a = -pendiente;
  const b = 1;
  const c = -y1 + pendiente * x1;

  return { a:a, b:b, c:c };
}

// // Ejemplo de uso
// const { a, b, c } = obtenerCoeficientesRecta(1, 2, 3, 4);

function distanciaPuntoRecta(x0, y0, a, b, c) {
  // Calcula la distancia usando la fórmula
  const distancia = Math.abs(a * x0 + b * y0 + c) / Math.sqrt(a * a + b * b);
  return distancia;
}

function zoomControl(map){
  
  var box = $('<div id="box-zoom" class="btn-group" role="group" data-zoom="12">\
                <button id="btn-zoom-far" class="btn-zoom btn btn-warning" data-increment="-1"><i class="fa fa-minus"></i></button>\
                <button id="btn-zoom-near" class="btn-zoom btn btn-warning" data-increment="1"><i class="fa fa-plus"></i></button>\
            </div>')
  box.css({
    position:'fixed',
    bottom: '20px',
    left: '50%',
    transform: 'translateX(-50%)',
    zIndex:1000
  })

  box.find('.btn-zoom').click(function(){
    var increment = parseInt($(this).data('increment')),
        zoom = parseInt($('#box-zoom').data('zoom'))
    zoom += 1*increment
    map.setZoom(zoom)
  })
  
  $('#map').append(box)

  map.on('zoomend', function (e){
    $('#box-zoom').data('zoom', e.target._zoom);
  })
}



</script>