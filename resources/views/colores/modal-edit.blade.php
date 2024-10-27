<style>
  #color{
    width: 100%;
    height: 40px;
    border-radius: 5px;
    overflow: hidden;
    border:solid thin lightgray;
  }

  .c-left, .c-right{
    width: 50%;
    height: 100%;
  }
</style>
<div class="col-12 p-1">
  <form id="form" class="col-12 flex-row-between-start flex-wrap">
    <div id="row-name" class="col-3"></div>
    <div id="color" class="col-3 flex-row-between-center mt-5">
      <div class="c-left"></div>
      <div class="c-right"></div>
    </div>
    <div id="row-combine" class="col-6 flex-row-start-center mt-3"></div>
    <div class="col-6 p-2">
      <div class="col-12 flex-row-between-center">
        <div class="col-6"><h5>Similares</h5></div>
        <div id="row-move-left" class="col-6"></div>
      </div>
      
      <div class="box-edit-table">
        <table id="table-simil" class="table table-condensed table-bordered table-stripped table-sm"
          data-toggle="table"
          data-height="260"
          style="background-color:#FFF;"
          data-row-style="rowStyle"
          data-content-type="application/x-www-form-urlencoded"
          
          data-method="post"
          data-sort-name="id"
          data-sort-order="asc"
          data-cookie="true"
          data-cookie-id-table="saveId"
          data-filter-show-clear="true"
          data-resizable="true"
          data-unique-id="id">
          <thead>
            <tr>
              <th data-field="state" data-checkbox="true"></th>
              <!-- <th data-field="id" data-sortable="true" data-align="right" data-valign="middle" data-width="70">Id</th> -->
              <th data-field="name" data-sortable="true" data-valign="middle" data-width="70">Color</th>
              <th data-formatter="rgb">Muestra</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    <div class="col-6 p-2">
      <div class="col-12 flex-row-between-center">
        <div class="col-6"><h5>Colores</h5></div>
        <div id="row-move-right" class="col-6"></div>
      </div>
      <div class="box-edit-table">
        <table id="table-colors" class="table table-condensed table-bordered table-stripped table-sm"
          data-toggle="table"
          data-height="260"
          style="background-color:#FFF;"
          data-row-style="rowStyle"
          data-content-type="application/x-www-form-urlencoded"
          
          data-method="post"
          data-sort-name="id"
          data-sort-order="asc"
          data-cookie="true"
          data-cookie-id-table="saveId"
          data-filter-show-clear="true"
          data-resizable="true"
          data-unique-id="id">
          <thead>
            <tr>
              <th data-field="state" data-checkbox="true"></th>
              <!-- <th data-field="id" data-sortable="true" data-align="right" data-valign="middle" data-width="70">Id</th> -->
              <th data-field="name" data-sortable="true" data-valign="middle" data-width="70">Color</th>
              <th data-formatter="rgb">Muestra</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    <div id="row-footer" class="col-12 flex-row-center-center div-footer pt-3"></div>
  </form>
</div>

<script>
  var form = $('#form'),
      inputs = [],
      color = {!! $color !!},
      similares = {!! $similares !!},
      colores = {!! $colores !!},
      all_colores = {!! $all_colores !!},
      table_simil = $('#table-simil'),
      table_colors = $('#table-colors')


  console.log('info', similares, colores)

  function getOptionColors(array, selected){
    var options = []
    $.each(array, function(i, e){
      if(!e.is_combinado){
        options.push({text:e.name, value:e.id})
      }
    })
    return options
  }

  function getColor(colors, id){
    var color = null
    $.each(colors, function(i, c){
      if(c.id == id){
        color = c
      }
    })
    return color
  }

  function moveTo(ids, add){
    table_simil.bootstrapTable('uncheckAll')
    table_colors.bootstrapTable('uncheckAll')
    var aux = []
    if(add){
      $.each(colores, function(i, row){
        if(ids.includes(row.id)){
          similares.push(row)
        }else{
          aux.push(row)
        }
      })
      colores = aux
    }else{
      $.each(similares, function(i, row){
        if(ids.includes(row.id)){
          colores.push(row)
        }else{
          aux.push(row)
        }
      })
      similares = aux
    }
    refreshTables()
  }

  function getRgbByColor(rgb){
    var id = null 
    $.each(colores, function(i, c){
      if(!c.is_combinado){
        if(c.rgb == rgb){
          id = c.id
        }
      }
    })
    return id
  }

  

  function refreshTables(){

    table_simil.bootstrapTable('load', similares)
    table_colors.bootstrapTable('load', colores)

    var input = getInputByName(form, 'similares'),
          ids = table_simil.bootstrapTable('getData').map(function (row) {
            return row.id;
        });
    input.val(JSON.stringify(ids))

  }

  table_simil.bootstrapTable()
  table_colors.bootstrapTable()



  if(color.a != null && color.b != null){
    $('.c-left').css({background: getRgb(color.a)})
    $('.c-right').css({background: getRgb(color.b)})
  }else{
    $('.c-left, .c-right').css({background: getRgb(color.rgb)})
  }
  


  inputs.push({
    type:'hidden',
    name:'id',
    value: color.id,
    box:'row-name'
  })
  inputs.push({
    type:'hidden',
    name:'similares',
    value: color.similares,
    box:'row-name'
  })
  inputs.push({
    type:'text',
    name:'name',
    label:'Nombre',
    value: color.name,
    box:'row-name',
    readonly:true
  })

  inputs.push({
    type:'switch',
    label: 'Combinado',
    name:'is_combinado',
    size: 'normal',
    box: 'row-combine',
    size:2,
    checked: color.is_combinado,
    callback:function(input){
      if(input.prop('checked')){
        hideShowBox(form, 'a', true)
        hideShowBox(form, 'b', true)
        $('.c-left, .c-right').css({background: 'transparent'})
      }else{
        hideShowBox(form, 'a')
        hideShowBox(form, 'b')
        $('.c-left, .c-right').css({background: getRgb(color.rgb)})
      }
    }
  })

  inputs.push({
    type:'select2',
    label: 'Color 1',
    name:'a',
    options: getOptionColors(all_colores),
    size:5,
    box: 'row-combine',
    callback:function(input){
      var col = getColor(all_colores, input.val())
      $('.c-left').css({background: getRgb(col.rgb)})
    }
  })
  inputs.push({
    type:'select2',
    label: 'Color 2',
    name:'b',
    options: getOptionColors(all_colores),
    size:5,
    box: 'row-combine',
    callback:function(input){
      var col = getColor(all_colores, input.val())
      $('.c-right').css({background: getRgb(col.rgb)})
    }
  })

  inputs.push({
    type:'button',
    name:'remove',
    label: 'Descartar Selección',
    box:'row-move-left',
    className: 'btn btn-danger btn-xs',
    align:'right',
    icon:{
      left:'fas fa-times'
    },
    callback: function(){
      var ids = table_simil.bootstrapTable('getSelections').map(function (row) {
            return row.id;
        });
      if(ids.length == 0){
        Swal.fire('¡ATENCION!', 'No se seleccionó ningún color', 'warning')
        return
      }

      moveTo(ids, false)
    }
  })

  inputs.push({
    type:'button',
    name:'add',
    label: 'Agregar Selección',
    box:'row-move-right',
    className: 'btn btn-success btn-xs',
    align:'right',
    icon:{
      left:'fas fa-plus'
    },
    callback: function(){
      var ids = table_colors.bootstrapTable('getSelections').map(function (row) {
            return row.id;
        });
      if(ids.length == 0){
        Swal.fire('¡ATENCION!', 'No se seleccionó ningún color', 'warning')
        return
      }

      moveTo(ids, true)
    }
  })

  inputs.push({
    type:'button',
    name:'close',
    label: 'Cerrar',
    box:'row-footer',
    className: 'btn btn-dark mr-2',
    align:'right',
    icon:{
      left:'fas fa-times'
    },
    size:6,
    callback: function(){
      modal.closeModal()
    }
  })
  inputs.push({
    type:'submit',
    name:'save',
    label: 'Guardar',
    box:'row-footer',
    className: 'btn btn-success ml-2',
    icon:{
      left:'fas fa-save'
    },
    size:6
  })

  setForm(form, inputs, "{{ route('admin.saveColor') }}", function(data){
    preload()
    if(data.result == 'OK'){
      modal.closeModal()
      Swal.fire({
        title: 'Guardar',
        text: data.message,
        icon: 'success'
      })
      
      listar()
    }else{
      Swal.fire({
        title: 'Guardar',
        text:data.message,
        icon: 'error'
      })
    }
  })

  if(color.is_combinado){
    hideShowBox(form, 'a', true)
    hideShowBox(form, 'b', true)

    getInputByName(form, 'a').val(getRgbByColor(color.a)).change()
    getInputByName(form, 'b').val(getRgbByColor(color.b)).change()
  }else{
    hideShowBox(form, 'a')
    hideShowBox(form, 'b')
  }

  

  refreshTables()
</script>