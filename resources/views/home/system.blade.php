
  <style>
    .btn-system{
      width: 90%;
      height: 40%;
      border-radius: 10px;
      border:solid thick white;
      cursor: pointer;
      font-size: 50px;
    }

    .btn-system i{
      font-size: 100px;
    }
  </style>

  <div class="col-12 box-content flex-col-center-center p-1">
    <div id="btn-restore" class="btn-system flex-col-center-center" data-action="restore">
      <i class="fa-solid fa-clock-rotate-left"></i>
      <b class="mt-2 text-white">Restaurar</b>
    </div>
     <div id="btn-backup" class="btn-system flex-col-center-center mt-5" data-action="backup">
      <i class="fa-solid fa-upload"></i>
      <b class="mt-2 text-white">backup</b>
    </div>
  </div>

  

 <script>
  var footer = $('footer')
   $(function(){
      preload()
      footer.empty()
      footer.append(getBtnFooter('azul', null, 'fas fa-home', function(){
        nextPage("{{ route('home') }}", ['home', 'inicio'])
      }))

      setCristal($('#btn-restore'),'blanco')
      setCristal($('#btn-backup'), 'blanco')

      colBorde($('#btn-restore'), 'rojo')
      textColor($('#btn-restore i'), 'rojo', 'blanco', 1)
      textColor($('#btn-restore b'), 'blanco', 'rojo', .25)

      colBorde($('#btn-backup'), 'azul')
      textColor($('#btn-backup i'), 'azul', 'blanco', 1)
      textColor($('#btn-backup b'), 'blanco', 'azul', .25)

      $('.btn-system').click(function(){
        var action = $(this).data('action'),
            title = (action == 'backup' ? 'backup' : 'restaurar'),
            text = (action == 'backup' ? '¿Hacer copia de seguridad?' : '¿restaurar sistema?')
        swalSiNo(title, text, function(){
          preload(true)
          sendPostRequest("{{ route('main.set-system') }}", {action: action}, function(data){
            preload()
            Swal.fire(title, data.message, data.result == 'OK' ? 'success' : 'error').then(function(){
              if(action == 'restore'){
                //nextPage("{{ route('home') }}", ['home', 'inicio'])
                location.reload()
              }
            })
          })
        })
      })

   })
 </script>
