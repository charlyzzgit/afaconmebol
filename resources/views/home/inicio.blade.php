
  <style>
    .menu-item{
/*      height: 100px;*/
    }

    #menu{
      height: 63%;
    }

    #footer{
      height: 37%;
      
    }

    .ic{
      font-size: 50px;
    }

    .footer{
      border: solid 2px white;
      background: rgba(255,255,255,.5);
      border-radius: 10px;
      color:white;
      height: 100%;
    }

    .menu-item .inner{
      border: solid 2px white;
      background: rgba(255,255,255,.5);
      border-radius: 10px;
      color:white;
    }

    .icon{
      height: 50px;
    }
  </style>

  <div class="col-12 box-content flex-col-start-center p-2">
    <div id="menu" class="col-12 flex-row-between-start flex-wrap">
      
    </div>
    
    <div id="footer" class="col-12 flex-col-start-center pb-1 pl-1 pr-1 pt-2">
      <div id="new-temporada" class="footer col-12 flex-col-center-center">
        <img src="{{ asset('resources/default/conmebol.png') }}" height="60%">
        <h2><b class="title"></b></h2>
        
      </div>
    </div>
  </div>

 <script>
   function getItem(action){
     var c = $('<div class="col-6 menu-item p-1">\
                <div class="inner col-12 flex-col-start-center p-1">\
                  <img class="icon">\
                  <b class="text"></b>\
                </div>\
              </div>'),
     icon = 'escudo',
     label = 'None',
     a = 'gris',
     bg = 'gris',
     isIcon = false,
     page = null,
     params = ['home']
     switch(action){
      case 'ligas':
        icon = 'conmebol.png'
        label = 'Ligas'
        bg = 'amarillo'
        page = 'ligas'
        break
      case 'afa a':
        icon = 'afaa.png'
        label = 'afa a'
        bg = 'rojo'
        break
      case 'afa b':
        icon = 'afab.png'
        label = 'afa b'
        bg = 'azul'
        break
      case 'afa c':
        icon = 'afac.png'
        label = 'afa c'
        bg = 'verde'
        break
      case 'argentina':
        icon = 'argentina.png'
        label = 'argentina'
        bg = 'celeste'
        break
      case 'recopa':
        icon = 'recopa.png'
        label = 'recopa'
        bg = 'verde'
        break
      case 'sudamericana':
        icon = 'sudamericana.png'
        label = 'sudamericana'
        bg = 'azul'
        break
      case 'libertadores':
        icon = 'libertadores.png'
        label = 'libertadores'
        bg = 'rojo'
        break
      case 'calendar':
        isIcon = true
        icon = $('<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 448 512">\
                  <path fill="gold" d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l80 0 0 56-80 0 0-56zm0 104l80 0 0 64-80 0 0-64zm128 0l96 0 0 64-96 0 0-64zm144 0l80 0 0 64-80 0 0-64zm80-48l-80 0 0-56 80 0 0 56zm0 160l0 40c0 8.8-7.2 16-16 16l-64 0 0-56 80 0zm-128 0l0 56-96 0 0-56 96 0zm-144 0l0 56-64 0c-8.8 0-16-7.2-16-16l0-40 80 0zM272 248l-96 0 0-56 96 0 0 56z"/>\
                </svg>')
        label = 'calendario'
        bg = 'negro'
        break
      case 'system':
        isIcon = true
        icon = $('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="50" height="50">\
                  <path fill="red" d="M352 320c88.4 0 160-71.6 160-160c0-15.3-2.2-30.1-6.2-44.2c-3.1-10.8-16.4-13.2-24.3-5.3l-76.8 76.8c-3 3-7.1 4.7-11.3 4.7L336 192c-8.8 0-16-7.2-16-16l0-57.4c0-4.2 1.7-8.3 4.7-11.3l76.8-76.8c7.9-7.9 5.4-21.2-5.3-24.3C382.1 2.2 367.3 0 352 0C263.6 0 192 71.6 192 160c0 19.1 3.4 37.5 9.5 54.5L19.9 396.1C7.2 408.8 0 426.1 0 444.1C0 481.6 30.4 512 67.9 512c18 0 35.3-7.2 48-19.9L297.5 310.5c17 6.2 35.4 9.5 54.5 9.5zM80 408a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>\
                </svg>')
        label = 'sistema'
        bg = 'blanco'
        page = 'system'
        break
     }
     if(isIcon){
      c.find('.icon').hide()
      c.find('.icon').after(icon)
     }else{
       c.find('.icon').prop('src', ASSET + 'default/' + icon)
       c.find('.ic').hide()
     }
     
     c.find('.text').html(label)
     setCristal(c.find('.inner'), bg)

     if(page != null){
       params.push(page)
     }
     
    c.data('params', params.join('.'))
     
     c.click(function(){
      var url = "{{ route('home') }}",
          params = $(this).data('params').split('.')
       //url += page
      
       nextPage(url, params, true)
     })
     return c
   }


   $(function(){

     $('#menu').append(getItem('ligas'))
     $('#menu').append(getItem('afa a'))
     $('#menu').append(getItem('afa b'))
     $('#menu').append(getItem('afa c'))
     $('#menu').append(getItem('argentina'))
     $('#menu').append(getItem('recopa'))
     $('#menu').append(getItem('sudamericana'))
     $('#menu').append(getItem('libertadores'))
     $('#menu').append(getItem('calendar'))
     $('#menu').append(getItem('system'))


     setCristal($('#new-temporada'), 'negro')
     $('#new-temporada .title').html('temporada ' + (MAIN.anio + 1))
     $('#new-temporada').click(function(){
       swalSiNo('nueva temporada', '¿iniciar temporada ' + (MAIN.anio + 1) + '?', function(){
        preload(true)
          sendPostRequest("{{ route('main.new-temporada') }}", null, function(data){
            swalResponse('nueva temporada', data, function(){
              location.reload()
            })
          })
       })
     })

    preload()
   })
   
 </script>
