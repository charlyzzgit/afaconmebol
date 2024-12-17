<style>
    #menu{
      position: absolute;
      bottom: -1000px;
      left: 0;
      z-index: 1000;
    }

    .flag{
      width: 100%;
      border-radius: 10px;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/bandera.png') }}" class="icon" height="90%">
      <b class="title ml-2">libertadores</b>
    </div>
    <b class="subtitle">en copmetencia</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
  <div id="menu" class="col-12 flex-row-between-start flex-wrap cristal" data-state="off"></div>
</div>


<script>
  var copa = '{{ $copa }}',
      zona = '{{ $zona }}',
      ligas = {!! $ligas !!},
      ul = $('#list'),
      src_copa = 'default/' + copa + (zona != null && zona != '' ? '_' + zona : '') + '.png'

   log('ligas', [ligas])
   function setFlags(){
     $.each(ligas, function(i, l){
       var el = $('<div class="liga col-6 p-3">\
                    <img class="flag">\
                  </div>')
        setImageFlag(el.find('img'), l.data.bandera)
        $('#menu').append(el)
     })
   }

   $(function(){
    setBar($('#bar'), src_copa, copa != 'afa' ? copa : [copa, zona].join(' - '), 'marron', 'en competencia', zona)
    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
        nextPage("{{ route('home') }}", ['home', 'inicio'])
      }))

    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
      }))

    footer.append(getBtnFooter('marron', null, 'fa fa-th', function(){
          var state = $('#menu').data('state')
          if(state == 'off'){
            $('#menu').data('state', 'on')
            $('#menu').animate({bottom: 0}, 150)
          }else{
            $('#menu').data('state', 'off')
            $('#menu').animate({bottom: '-1000px'}, 150)
          }
        }))

     setFlags()
     preload()
   })
</script>
