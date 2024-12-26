<style>
    .campeon{
      border-radius: 20px;
    }

    .name-copa{
      font-size: 20px;
    }

    .equipo{
      font-size: 30px;
      line-height: 1;
      border-radius: 10px;
    }

    .copa, .escudo{
      height: 70px;
    }

    #list{
      height: 100%;
    }

    .sel-anio{
      width: 100px;
    }
</style>
<div class="col-12 box-content p-1">
  <div class="title-bar col-12 flex-row-between-center p-1" id="bar">
    <div class="flex-row-start-center h-100">
      <img src="{{ asset('resources/default/conmebol.png') }}" class="icon" height="90%">
      <b class="title ml-2">campeones</b>
    </div>
    <b class="subtitle">copas</b>
  </div>
  <ul id="list" class="list col-12 flex-col-start-center p-1 m-0"></ul>
</div>


<script>
   var ANIO = MAIN.anio
   function getLiCampeon(c){

     var li = $('<li class="campeon col-12 flex-row-between-center p-2 mb-1 cristal">\
                  <img class="copa">\
                  <div class="flex-col-start-center">\
                    <b class="name-copa"></b>\
                    <div class="equipo p-2 cristal">\
                      <b class="name">sin definir</b>\
                    </div>\
                  </div>\
                  <img class="escudo" src="{{ asset('resources/default/escudo.png') }}">\
                </li>'),
          title = c.copa,
          col = c.copa == 'afa' ? getColorZona(c.zona, true) : getColorCopa(c.copa, true)
    if(c.zona != null){
      title += ' ' + c.zona
    }
    title += ' - ' + ANIO
    setImageCopa(li.find('.copa'), c.zona != null ? [c.copa, c.zona].join('_') : c.copa)
     li.find('.name-copa').html(title)
     setText(li.find('.name-copa'), parseColor('blanco'), parseColor(col.b), .1)

     setCristalBorder(li, parseColor(col.a), parseColor(col.b), 1)

     if(c.data != null){
       setEquipoUI(li.find('.equipo'), c.data.equipo, .1)
       li.find('.name').html(c.data.equipo.name)

       setImageEquipo(li.find('.escudo'), c.data.equipo, 'escudo')
     }
     return li
   }

   function selectAnio(){
      var row = $('<div class="sel-anio p-1 ml-2">\
                    <div class="form-group mb-0">\
                      <select class="form-control custom-select"></select>\
                    </div>\
                  </div>')
      for(var a = MAIN.anio; a >= 2000; a--){
        var option = $('<option></option>')
        option.text(a).val(a)
        if(a == MAIN.anio){
          option.prop('selected', true)
        }
        row.find('select').append(option)
      }
      row.find('select').change(function(){
        ANIO = $(this).val()
        listar()
      })
      return row
   }

   function listar(){
     $('#list').empty()
        preload(true)
        sendPostRequest("{{ route('home.campeones-anio') }}", {anio: ANIO}, function(data){
          $.each(data, function(i, c){
            $('#list').append(getLiCampeon(c))
           })
           preload()
        })
     
   }


   $(function(){
    setBar($('#bar'), 'default/escudo_afa.png', 'campeones', 'violeta', MAIN.anio, '')

    footer.empty()
    footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
      nextPage("{{ route('home') }}", ['home', 'inicio'])
    }))
    footer.append(getBtnFooter('negro', null, 'fas fa-circle-left', function(){
        goBack(true)
      }))

    footer.append(selectAnio())
    listar()
    
   })
</script>
