@extends('layouts.app')
@section('title')
  <h1>Ligas</h1>
@stop
@section('content_header')
  
@stop
@section('css')
  <style>
    .pais{
      border-radius: 10px 50px 50px 10px;
    }

    .bandera{
      height: 30px;
    }
  </style>
@stop
@section('content')


  <div class="col-12">
    <div class="card card-outline card-primary">
        <div class="card-header flex-row-between-center">
          <div class="col-6 flex-row-between-center">
            <h1 class="card-title">Listado de Ligas</h1>
          </div>
          <dv class="col-6 flex-row-end-center">
            <button id="btn-new" class="btn btn-primary btn-xs">
              <i class="fas fa-plus mr-1"></i>
              <span>Nueva Liga</span>
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
                  data-sort-name="name"
                  data-sort-order="asc"
                  data-cookie="true"
                  data-cookie-id-table="saveId"
                  data-filter-show-clear="true"
                  data-unique-id="id">
                <thead>
                  <tr>
                    <th data-field="id" data-sortable="true" data-align="right" data-valign="middle" data-width="50">Id</th>
                    <th data-field="name" data-sortable="true" data-valign="middle"data-formatter="pais" data-width="400">Pais</th>
                    <th data-field="bandera" data-valign="middle" data-align="center" data-formatter="bandera" data-width="70">Bandera</th>
                    <th data-field="a" data-valign="middle" data-align="center" data-formatter="setA">Color Principal</th>
                    <th data-field="b" data-valign="middle" data-align="center" data-formatter="setB">Color Secundario</th>
                    <th data-field="c" data-valign="middle" data-align="center" data-formatter="setC">Color Terciario</th>
                    <th data-formatter="equipos"  data-align="center" data-valign="middle" data-width="70">Equipos</th>
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
                        title: 'Editar Liga',
                        //customSize: '80%',
                        size:'big',
                        bg: 'bg-primary'
                  })
  function queryParams(params){
    params._token = '{{ csrf_token() }}'
    
    return params
  }

  function listar(){
    blockUi('table', true)
    table.bootstrapTable('refresh', {url: "{{ route('admin.ligasListJSON') }}"})
  }


  function pais(i, row){
    var div = $('<div class="pais flex-row-start-center p-1"></div>')

    setBgGradient(div, row.color_a.rgb, row.color_b.rgb, row.color_c.rgb)
    div.css({color: getRgb(row.color_b.rgb)})
    div.html(row.name)
    return getHtml(div)
  }

  function bandera(i, row){
    var img = $('<img class="bandera">')
    img.prop('src', getImageSource(row.bandera))
    return getHtml(img)
  }

  function setA(i, row){
    return getHtml(getRowColor(row.color_a.rgb))
  }

  function setB(i, row){
    return getHtml(getRowColor(row.color_b.rgb))
  }

  function setC(i, row){
    return getHtml(getRowColor(row.color_c.rgb))
  }

  
  function equipos(i, row){
    var btn = $('<button class="btn-equipos btn btn-success btn-xs" data-id="' + row.id + '">\
                  <i class="fas fa-shield-alt"></i>\
              </button')
    return getHtml(btn)
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

  

  
  $(function(){
    $('#btn-new').click(function(){
      modal.openModal("{{ route('admin.edit-liga') }}")
    })

    table.on('load-success.bs.table', function(){
      blockUi('table')
    }).on('click', '.btn-edit', function(evt){
      evt.preventDefault()
      var id = $(this).data('id'),
          url = "{{ route('admin.edit-liga', '::') }}"
      url = url.replace('::', id)
      modal.openModal(url)
    }).on('click', '.btn-delete', function(evt){
      evt.preventDefault()
      var id = $(this).data('id')
    }).on('click', '.btn-equipos', function(evt){
      evt.preventDefault()
      var id = $(this).data('id'),
          url = "{{ route('admin.equipos', '::') }}"
          url = url.replace('::', id)
          window.location.href = url
    })

    

    listar()
  })
</script>
@stop