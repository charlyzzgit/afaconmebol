@extends('layouts.app')
@section('title')
  Comandos
@stop
@section('content')
  <div class="col-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
          <h4 class="m-0">Listado de fases</h4>
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
    var table = $('#table')

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
      var btn = $('<button class="btn btn-success btn-xs">\
                  <i class="fas fa-play"></i>\
                  </button>')
      
      return getHtml(btn)
    }

    function listar(){
      blockUi('table', true)
      table.bootstrapTable('refresh', {url: "{{ route('admin.commandsListJSON') }}"})
    }


    $(function(){
      table.on('load-success.bs.table', function(){
        blockUi('table')
      })


      listar()
    })
  </script>

@stop