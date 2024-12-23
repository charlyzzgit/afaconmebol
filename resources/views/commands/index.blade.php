@extends('layouts.app')
@section('title')
  Comandos
@stop
@section('css')
  <style>
    .list-results{
      height: 400px;
      overflow-x:hidden;
      overflow-y: auto;
    }
  </style>
@stop
@section('content')
  <div class="col-12">
    <div class="card card-outline card-primary">
        <div class="card-header flex-row-between-center">
          <div class="col-6">
            <h4 class="m-0">Listado de fases</h4>
          </div>
          <div class="col-6 flex-row-end-center">
            <button id="btn-reset" class="btn btn-danger btn-sm">
              <i class="fas fa-refresh mr-1"></i>
              <span>Reset</span>
            </button>
            <button id="btn-reset-all" class="btn btn-dark btn-sm ml-2">
              <i class="fas fa-triangle-exclamation mr-1 text-warning"></i>
              <span>Borrar todo</span>
            </button>
          </div>
        </div>
        <div class="card-body p-2">
          <table id="table" class="table table-condensed table-bordered table-stripped table-sm"
                  data-toggle="table"
                  data-height="500"
                  style="background-color:#FFF;"
                  data-row-style="rowStyle"
                  data-query-params="queryParams"
                  data-content-type="application/x-www-form-urlencoded"
                  data-pagination="true"
                  data-side-pagination="server"
                  data-page-size="12"
                  data-page-list="[10,20,50,100,200]"
                  data-method="post"
                  data-resizable="true"
                  data-sort-name="id"
                  data-sort-order="asc"
                  data-cookie="true"
                  data-cookie-id-table="saveId"
                  data-filter-show-clear="true"
                  data-unique-id="id">
                <thead>
                  <tr>
                    <th data-field="index" data-sortable="true" data-align="right" data-valign="middle" data-width="50">O</th>
                    <th data-field="label" data-valign="middle">fase</th>
                    <th data-field="processed" data-formatter="state" data-valign="middle" data-align="center" data-width="70">procesado</th>
                    <th data-formatter="procesar" data-valign="middle" data-align="center" data-width="70">procesar</th>
                  </tr>
                </thead>
          </table>
          
          
        </div>
      </div>
  </div>

  
@stop
@section('js')
  <script>
    var table = $('#table'),
        cmd = null

    @if($cmd)
      cmd = {!! $cmd !!}
    @endif

    function queryParams(params){
      params._token = '{{ csrf_token() }}'
      return params
    }

    function state(i, row){
      var lbl = $('<div class="badge"></div>')
      lbl.addClass(row.processed ? 'badge-success' : 'badge-danger')
      lbl.html(row.processed ? 'SI' : 'NO')
      return getHtml(lbl)
    }

    function procesar(i, row){
      if(row.processed){
        return ''
      }
      var btn = $('<button class="btn-procesar btn btn-xs"  data-id="' + row.id + '">\
                  <i class="fas fa-play"></i>\
                  </button>'),
          e = false

      if(cmd != null){
        if(cmd.id == row.id){
          e = true
        }
      }

      btn.addClass(e ? 'btn-success' : 'btn-secondary')

      if(!e){
        btn.prop('disabled', true)
      }
      
      return getHtml(btn)
    }

    function listar(){
      blockUi('table', true)
      table.bootstrapTable('refresh', {url: "{{ route('admin.commandsListJSON') }}"})
    }

    function isJSON(str){
      try {
        JSON.parse(str); // Intenta parsear el string
        return true;     // Si tiene éxito, es un JSON válido
      } catch (e) {
          return false;    // Si lanza un error, no es un JSON válido
      }
    }

    function processResult(data){

      var H = $('<div></div>'),
          content = $('<div class="flex-col-start-center"></div>')
      content.css({width:'100%'})
      content.append('<ul class="list-results col-12 flex-col-start-center p-1 m-0"></ul>')
      content.append('<button id="close-result" class="btn btn-dark mt-2">\
                        <i class="fas fa-times mr-1"></i>\
                        <span>Cerrar</span>\
                      </button>')
      $.each(data, function(i, d){
        var li = $('<li class="alert alert-warning col-12 flex-row-start-center p-1 mb-1 text-white"></li>'),
            col = parseColor(getColorCopa(d.copa))

        li.html(d.message)
        bg(li, col.rgb)
        content.find('ul').append(li)
      })

      H.append(content)
      
      
      Swal.fire({
                  title: 'Resultado proceso',
                  html: H.html(),
                  showConfirmButton: false, // Ocultamos el botón predeterminado de confirmación
                  didRender: () => {
                    // Agregamos un evento al botón personalizado
                    const closeButton = document.getElementById('close-result');
                    closeButton.addEventListener('click', () => {
                      Swal.close(); // Cerramos el SweetAlert manualmente
                    });
                  }
                });
    }


    $(function(){
      table.on('load-success.bs.table', function(){
        blockUi('table')
      }).on('click', '.btn-procesar', function(evt){
        evt.preventDefault()
        var id = $(this).data('id')
        
        swalSiNo('Procesar lote', '¿Seguro de procesar este lote?', function(){
          preload(true)
          sendPostRequest("{{ route('admin.procesar-lote') }}", {
                id: id
              }, function(data){
                preload()
                if(data.result == 'OK'){
                  cmd = data.data.cmd
                  processResult(data.data.response.progress)
                  listar()
                }else{
                  swal('Procesar lote', data.message, 'error')
                }
              }, function(data){
                preload()
                console.log('ERROR', data)
              })
        })
      })

      $('#btn-reset').click(function(){
        swalSiNo('Reiniciar lotes', '¿Seguro de reiniciar todos los lotes?', function(){
          preload(true)
            sendPostRequest("{{ route('admin.reset-lotes') }}", null, function(data){
                  preload()
                  if(data.result == 'OK'){
                    cmd = data.data
                    swal('Reiniciar lotes', data.message, 'success')
                    listar()
                  }else{
                    swal('Reiniciar lotes', data.message, 'error')
                  }
                }, function(data){
                  preload()
                  console.log('ERROR', data)
                })
          })
      })

      $('#btn-reset-all').click(function(){
        swalSiNo('Resetear sistema', '¿Seguro de borrar todas las tablas?', function(){
          preload(true)
            sendPostRequest("{{ route('admin.reset-all') }}", null, function(data){
                  preload()
                  if(data.result == 'OK'){
                    swal('Resetear sistema', data.message, 'success').then(function(){
                      location.reload()
                    })
                    
                  }else{
                    swal('Resetear sistema', data.message, 'error')
                  }
                }, function(data){
                  preload()
                  console.log('ERROR', data)
                })
          })
      })



      listar()
    })
  </script>

@stop