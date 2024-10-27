@extends('layouts.app')
@section('title')
  <h1>Equipos</h1>
@stop
@section('content_header')
  
@stop
@section('css')
  <style>
    #liga{
      border-radius: 10px 50px 50px 10px;
    }

    .bandera, .escudo, .jugador, .estadio{
      height: 30px;
    }

    .jugador{
      height: 50px;
    }

    .equipo{
      border-radius: 10px 50px 50px 10px;
      font-size: 18px;
      font-weight: bold;
      width: 200px;
    }
  </style>
@stop
@section('content')


  <div class="col-12">
    <div class="card card-outline card-primary">
        <div class="card-header flex-row-between-center">
          <div class="col-4 flex-row-between-center">
            <h1 class="card-title">Listado de Equipos</h1>
          </div>
          <div id="liga" class="col-4 flex-row-start-center p-1">
            <img height="30">
            <h4 class="mb-0 ml-2">
              <b class="name"></b>
            </h4>
          </div>
          <dv class="col-4 flex-row-end-center">
            <button id="btn-reload" class="btn btn-dark btn-xs">
              <i class="fas fa-sync mr-1"></i>
              <span>Recargar</span>
            </button>
            <button id="btn-new" class="btn btn-primary btn-xs ml-2">
              <i class="fas fa-plus mr-1"></i>
              <span>Nuevo Equipo</span>
            </button>
          </dv>
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
                  data-page-size="10"
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
                    <th data-field="id" data-sortable="true" data-align="right" data-valign="middle" data-width="50">Id</th>
                    <th data-field="orden" data-sortable="true" data-align="right" data-valign="middle" data-width="50">Orden</th>
                    <th data-valign="middle" data-align="center" data-formatter="escudo" data-width="50">Escudo</th>
                    <th data-field="name" data-sortable="true" data-valign="middle"data-formatter="setEquipo" data-width="400">Equipo</th>
                    <th data-valign="middle" data-align="center" data-formatter="local" data-width="50">local</th>
                    <th data-valign="middle" data-align="center" data-formatter="visitante" data-width="50">visitante</th>
                    <th data-field="nivel" data-sortable="true" data-align="right" data-valign="middle" data-width="50">Nivel</th>
                    <th data-valign="middle" data-align="center" data-formatter="estadio" data-width="50">Estadio</th>
                    <th data-valign="middle" data-align="center" data-formatter="bandera" data-width="50">bandera</th>
                    <th data-valign="middle" data-align="center" data-formatter="setA" data-width="50">Color 1</th>
                    <th data-valign="middle" data-align="center" data-formatter="setB" data-width="50">Color 1</th>
                    <th data-valign="middle" data-align="center" data-formatter="setC" data-width="50">Color 1</th>
                    <th data-valign="middle" data-align="center" data-formatter="setCombinado" data-width="50">Combinado</th>
                    <th data-valign="middle" data-align="center" data-formatter="setAlternativo" data-width="50">Alternativo</th>
                    <th data-field="estructura" data-sortable="true" data-valign="middle">Estructura</th>
                    <th data-field="cesped" data-sortable="true" data-valign="middle">Cesped</th>
                    
                    <th data-formatter="editar"  data-align="center" data-valign="middle" data-width="70">Editar</th>
                    <th data-formatter="eliminar"  data-align="center" data-valign="middle" data-width="70">Eliminar</th>
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
      liga = {!! $liga !!},
      modal = new Modal({
                        title: 'Editar Equipo',
                        //customSize: '80%',
                        size:'full',
                        bg: 'bg-primary'
                  })
  function queryParams(params){
    params._token = '{{ csrf_token() }}'
    params.liga_id = liga.id
    
    return params
  }

  function listar(id){
    blockUi('table', true)
    var params = {url: "{{ route('admin.equiposListJSON') }}"}
    if(id !== undefined){
      params = Object.assign(params, { query:{id: id}})
    }
    table.bootstrapTable('refresh', params)
  }

  function setEquipo(i, row){
    var div = $('<div class="equipo flex-row-start-center p-2 filter-1"></div>')
    setBgGradient(div, [row.a, row.b, row.c])
    div.css({color: getRgb(row.b)}).html(row.name)
    return getHtml(div)
  }

  function escudo(i, row){
    var img = $('<img class="escudo filter-1">')
    img.prop('src', getImageSource(row.directory + '/escudo.png'))
    return getHtml(img)
  }

  function local(i, row){
    var img = $('<img class="jugador filter-1">')
    img.prop('src', getImageSource(row.directory + '/local.png'))
    return getHtml(img)
  }

  function visitante(i, row){
    var img = $('<img class="jugador filter-1">')
    img.prop('src', getImageSource(row.directory + '/visitante.png'))
    return getHtml(img)
  }

  function estadio(i, row){
    var img = $('<img class="estadio filter-1">')
    img.prop('src', getImageSource(row.directory + '/estadio.png'))
    return getHtml(img)
  }
  
  function bandera(i, row){
    var img = $('<img class="bandera filter-1">')
    img.prop('src', getImageSource(row.directory + '/bandera.png'))
    return getHtml(img)
  }

  function setA(i, row){
    return getHtml(getRowColor(row.a))
  }

  function setB(i, row){
    return getHtml(getRowColor(row.b))
  }

  function setC(i, row){
    return getHtml(getRowColor(row.c))
  }

  function setCombinado(i, row){
    var a = row.is_combinado ? row.ca : row.combinado,
        b = row.is_combinado ? row.cb : row.combinado

    return getHtml(getRowColor(a, b))
  }

  function setAlternativo(i, row){
    if(row.alternativo == null){
      return "-"
    }
    var a = row.is_combinado_alternativo ? row.aa : row.alternativo,
        b = row.is_combinado_alternativo ? row.ab : row.alternativo

    return getHtml(getRowColor(a, b))
  }

  
  

  function editar(i, row){
    var btn = $('<button class="btn-edit btn btn-primary btn-xs" data-id="' + row.id + '">\
                  <i class="fas fa-edit"></i>\
              </button')
    return getHtml(btn)
  }

  function eliminar(i, row){
    var btn = $('<button class="btn-delete btn btn-danger btn-xs" data-id="' + row.id + '">\
                  <i class="fas fa-trash"></i>\
              </button')
    return getHtml(btn)
  }

  function setTitle(){
    setBgGradient($('#liga'), [liga.a, liga.b, liga.c])
    $('#liga').find('.name').css({color: getRgb(liga.b)}).html(liga.name)
    $('#liga').find('img').prop('src', getImageSource(liga.bandera))
  }

  

  
  $(function(){
    $('#btn-new').click(function(){
      modal.openModal("{{ route('admin.edit-equipo', $liga->id) }}")
    })

    setTitle()

    table.on('load-success.bs.table', function(){
      blockUi('table')
    }).on('click', '.btn-edit', function(evt){
      evt.preventDefault()
      var id = $(this).data('id'),
          url = "{{ route('admin.edit-equipo', ['liga_id' => $liga->id, 'id' => '::']) }}"
      url = url.replace('::', id)
      modal.openModal(url)
    }).on('click', '.btn-delete', function(evt){
      evt.preventDefault()
      var id = $(this).data('id'),
          row = table.bootstrapTable('getRowByUniqueId', id)
      swalSiNo('Eliminar', '¿Seguro de eliminar ' + row.name +  '?', function(){
        preload(true)
        sendPostRequest("{{ route('admin.deleteEquipo') }}", {
              id: id
            }, function(data){
              preload()
              if(data.result == 'OK'){
                swal('Eliminar Equipo', data.message, 'success')
                listar()
              }else{
                swal('Eliminar Equipo', data.message, 'error')
              }
            }, function(data){
              preload()
              console.log('ERROR', data)
            })
      })
    })

    $('#btn-reload').click(function(){
      listar();
    })

    listar()
  })
</script>
@stop