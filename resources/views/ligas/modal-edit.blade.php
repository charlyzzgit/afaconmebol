<div class="col-12 p-1">
  <form  id="form" class="col-12 flex-row-start-start flex-wrap">
    <div id="box-sup" class="col-12 flex-row-between-start"></div>
    <div id="box-a" class="col-4 p-1"></div>
    <div id="box-b" class="col-4 p-1"></div>
    <div id="box-c" class="col-4 p-1"></div>
    <div id="box-footer" class="col-12 div-footer p-3"></div>
  </form>
</div>

<script>
  var form = $('#form'),
      liga = null,
      inputs = [],
      colores = {!! $colores !!}

  @if($liga) 
    liga = {!! $liga !!}

    inputs.push({
      type:'hidden',
      name:'id',
      value: liga.id
    })

  @endif


  inputs.push({
    type:'text',
    name:'name',
    label:'Pais',
    size:6,
    value: getVal(liga, 'name', ''),
    box: 'box-sup'
  })

  inputs.push({
    type: 'file',
    label: 'Bandera',
    name: 'bandera',
    value: liga != null ? ASSET + liga.bandera : DEFAULT_SRC + 'flag.png',
    image:true,
    scale:{
      width:'120px'
    },
    size:6,
    box: 'box-sup'
  })



  colorSelector('box-a', colores, 'a', 'Color Principal', getVal(liga, 'a', undefined))
  colorSelector('box-b', colores, 'b', 'Color Secundario', getVal(liga, 'b', undefined))
  colorSelector('box-c', colores, 'c', 'Color Terciario', getVal(liga, 'c', undefined))

  inputs.push({
    type: 'button',
    name: 'close',
    label: 'Cerrar',
    className: 'btn btn-dark mr-2',
    icon:{
      left:'fas fa-times'
    },
    size:6,
    align:'right',
    callback: function(){
      modal.closeModal()
    }
  })

  inputs.push({
    type: 'submit',
    name: 'save',
    label: 'Guardar',
    className: 'btn btn-success ml-2',
    icon:{
      left:'fas fa-save'
    },
    size:6,
    align:'left',
    callback: function(){
      modal.closeModal()
    }
  })


  setForm(form, inputs, "{{ route('admin.saveLiga') }}", function(data){
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
</script>