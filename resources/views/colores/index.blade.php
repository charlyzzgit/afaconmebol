@extends('layouts.app')
@section('title')
  <h1>Colores</h1>
@stop
@section('content_header')
  Home
@stop
@section('css')
  <style>
    .muestra{
      width: 50px;
      height: 30px;
      border-radius: 5px;
      overflow: hidden;
      border:solid thin lightgray;
      border-radius: 5px;
    }

    .mu{
      width: 40px;
      height: 20px;
      overflow: hidden;
      border:solid thin lightgray;
      border-radius: 3px;
    }

    .semi-color, .mu-left, .mu-right{
      width: 50%;
      height: 100%;
    }

    .similares{
      width: 750px;
      height: 30px;
    }
  </style>
@stop
@section('content')


  <div class="col-12">
    <div class="card card-outline card-primary">
        <div class="card-header flex-row-between-center">
          <div class="col-9 flex-row-between-center">
            <h1 class="card-title">Listado de Colores</h1>
          
            
            <!-- <button id="btn-new" class="btn btn-primary btn-xs">
              <i class="fa fa-plus mr-1"></i>
              <span>Nuevo Color</span>
            </button> -->
          </div>
          <div class="col-3 flex-row-end-center">
              <label class="mb-0 mr-1" for="is_combinado">Filtrar por:</label>
              <select id="is_combinado" class="custom-select custom-select-sm" style="width:150px">
                <option value="">Todos</option>
                <option value="si">Combinado</option>
                <option value="no">Solido</option>
              </select>
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
                  data-page-size="10"
                  data-page-list="[10,20,50,100,200]"
                  data-method="post"
                  data-resizable="true"
                  data-sort-name="name"
                  data-sort-order="asc"
                  data-cookie="true"
                  data-cookie-id-table="saveId"
                  data-filter-show-clear="true"
                  data-unique-id="id">
                <thead>
                  <tr>
                    <th data-field="id" data-sortable="true" data-align="right" data-valign="middle" data-width="70">Id</th>
                    <th data-field="name" data-sortable="true" data-valign="middle" data-width="70">Color</th>
                    <th data-formatter="rgb">Muestra</th>
                    <th data-formatter="setSimilares" data-valign="middle">Similares</th>
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
      modal = new Modal({
                        title: 'Editar Color',
                        customSize: '80%',
                        bg: 'bg-primary'
                  })
  function queryParams(params){
    params._token = '{{ csrf_token() }}'
    params.is_combinado = $('#is_combinado').val()
    return params
  }

  function listar(){
    blockUi('table', true)
    table.bootstrapTable('refresh', {url: "{{ route('admin.coloresListJSON') }}"})
  }

  
  function rgb(i, row){
    var div = $('<div class="muestra flex-row-between-center">\
                  <div class="semi-color left-color"></div>\
                  <div class="semi-color right-color"></div>\
                </div>')
    if(row.a != null && row.b != null){
      div.find('.left-color').css({background: getRgb(row.a)})
      div.find('.right-color').css({background: getRgb(row.b)})
    }else{

      div.css({background: getRgb(row.rgb)})

    }
    return getHtml(div)
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

  function setSimilares(i, row){
    var colores = row.similares
        div = $('<div class="similares flex-row-start-start flex-wrap"></div>')
    $.each(colores, function(i, c){
      var el = $('<div class="mu flex-row-between-center m-1">\
                  <div class="mu-left"></div>\
                  <div class="mu-right"></div>\
                </div>')
      el.find('.mu-left').css({background: getRgb(c.is_combinado ? c.a : c.rgb)})
      el.find('.mu-right').css({background: getRgb(c.is_combinado ? c.b : c.rgb)})
      div.append(el)

    })
    return getHtml(div)
  }

  
  $(function(){
    $('#btn-new').click(function(){
      modal.openModal("")
    })

    table.on('load-success.bs.table', function(){
      blockUi('table')
    }).on('click', '.btn-edit', function(evt){
      evt.preventDefault()
      var id = $(this).data('id'),
          url = "{{ route('admin.edit-color', '::') }}"
      url = url.replace('::', id)
      modal.openModal(url)
    }).on('click', '.btn-ramales', function(evt){
      evt.preventDefault()
      var id = $(this).data('id'),
          url = ""
      url = url.replace('::', id)
      window.location.href = url
    })

    $('#is_combinado').change(function(){
      listar()
    })

    listar()
  })
</script>
@stop