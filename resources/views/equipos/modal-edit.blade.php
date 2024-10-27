<div class="col-12 p-1">
  <form id="form" class="col-12 flex-row-start-start flex-wrap">
    <div id="box-name" class="col-2 p-1"></div>
    <div id="box-a" class="col-2 p-1"></div>
    <div id="box-b" class="col-2 p-1"></div>
    <div id="box-c" class="col-2 p-1"></div>
    <div id="box-combinado" class="col-2 p-1"></div>
    <div id="box-alternativo" class="col-2 p-1"></div>
    <div id="box-images" class="col-12 flex-row-start-start"></div>
    <div id="box-values" class="col-12 flex-row-start-start"></div>
  </form>
</div>


<script>
  
  var form = $('#form'),
      inputs = [],
      equipo = null,
      colores = {!! $colores !!},
      clasicos = {!! $clasicos !!},
      levels = [],
      estructuras = [],
      cespedes = []

  function getImageEquipo(field, equipo){
    return ASSET + equipo.directory + field + '.png'
  }

  for(var i = 0; i < 10; i++){
    levels.push({nivel: i + 1})
  }

  estructuras.push({size:'chica'})
  estructuras.push({size:'cuadrada'})
  estructuras.push({size:'mediana'})
  estructuras.push({size:'grande'})

  cespedes.push({type:'lisa'})
  cespedes.push({type:'rayada'})
  cespedes.push({type:'cuadriculada'})
  cespedes.push({type:'circular'})
  cespedes.push({type:'romboide'})


  @if($equipo)
    equipo = {!! $equipo !!}
  @endif

  inputs.push({
    type: 'hidden',
    name: 'liga_id',
    value: '{{ $liga_id }}'
  })

  if(equipo != null){
    inputs.push({
      type: 'hidden',
      name: 'id',
      value: equipo.id
    })
  }


 
  inputs.push({
    type: 'text',
    name: 'name',
    label: 'Nombre',
    value: getVal(equipo, 'name', ''),
    box:'box-name',
    required:{
      value:''
    }
  })


  colorSelector('box-a', colores, 'a', 'Color Principal', getVal(equipo, 'a', undefined))
  colorSelector('box-b', colores, 'b', 'Color Secundario', getVal(equipo, 'b', undefined))
  colorSelector('box-c', colores, 'c', 'Color Terciario', getVal(equipo, 'c', undefined))
  colorSelector('box-combinado', colores, 'combinado', 'Color Combinado', getVal(equipo, 'combinado', undefined))
  colorSelector('box-alternativo', colores, 'alternativo', 'Color Alternativo', getVal(equipo, 'alternativo', undefined))

  inputs.push({
    type: 'file',
    label: 'Escudo',
    name: 'escudo',
    value: equipo != null ? getImageEquipo('escudo', equipo) : DEFAULT_SRC + 'escudo.png',
    image:true,
    scale:{
      width:'150px'
    },
    size:2,
    box: 'box-images',
    align:'center'
  })

  inputs.push({
    type: 'file',
    label: 'Local',
    name: 'local',
    value: equipo != null ? getImageEquipo('local', equipo) : DEFAULT_SRC + 'jugador.png',
    image:true,
    scale:{
      width:'150px'
    },
    size:3,
    box: 'box-images',
    align:'center'
  })

  inputs.push({
    type: 'file',
    label: 'Visitante',
    name: 'visitante',
    value: equipo != null ? getImageEquipo('visitante', equipo) : DEFAULT_SRC + 'jugador.png',
    image:true,
    scale:{
      width:'150px'
    },
    size:3,
    box: 'box-images',
    align:'center'
  })

  inputs.push({
    type: 'file',
    label: 'Estadio',
    name: 'estadio',
    value: equipo != null ? getImageEquipo('estadio', equipo) : DEFAULT_SRC + 'estadio.png',
    image:true,
    scale:{
      width:'200px'
    },
    size:2,
    box: 'box-images',
    align:'center'
  })

  inputs.push({
    type: 'file',
    label: 'Bandera',
    name: 'bandera',
    value: equipo != null ? getImageEquipo('bandera', equipo) : DEFAULT_SRC + 'flag.png',
    image:true,
    scale:{
      width:'150px'
    },
    size:2,
    box: 'box-images',
    align:'center'
  })

  inputs.push({
    type: 'select',
    name: 'nivel',
    label: 'Nivel',
    value: getVal(equipo, 'nivel', ''),
    options: selectOptions(levels, 'nivel', 'nivel'),
    box:'box-values',
    size:2,
    required:{
      value:''
    }
  })

  inputs.push({
    type: 'select2',
    name: 'clasico_id',
    label: 'Clasico',
    value: getVal(equipo, 'clasico_id', ''),
    options: selectOptions(clasicos, 'name', 'id'),
    box:'box-values',
    size:3
  })

  inputs.push({
    type: 'select',
    name: 'estructura',
    label: 'Estructura',
    value: getVal(equipo, 'estructura', ''),
    options: selectOptions(estructuras, 'size', 'size'),
    box:'box-values',
    size:2
  })

  inputs.push({
    type: 'select',
    name: 'cesped',
    label: 'Cesped',
    value: getVal(equipo, 'cesped', ''),
    options: selectOptions(cespedes, 'type', 'type'),
    box:'box-values',
    size:2
  })

  inputs.push({
    type: 'submit',
    name: 'save',
    label: 'Guardar',
    className: 'btn btn-success btn-form',
    icon:{
      left: 'fas fa-save'
    },
    box:'box-values',
    size:2,
    align:'right'
  })

 

  inputs.push({
    type: 'button',
    name: 'close',
    label: 'Cerrar',
    className: 'btn btn-dark btn-form',
    icon:{
      left: 'fas fa-times'
    },
    box:'box-values',
    size:2,
    align:'left',
    callback: function(){
      modal.closeModal()
    }
  })


  setForm(form, inputs, "{{ route('admin.saveEquipo') }}", function(data){
    preload()
    if(data.result == 'OK'){
      modal.closeModal()
      // Swal.fire({
      //   title: 'Guardar',
      //   text: data.message,
      //   icon: 'success'
      // })
      var id = data.data.id
      listar(id)
    }else{
      Swal.fire({
        title: 'Guardar',
        text:data.message,
        icon: 'error'
      })
    }
  })
</script>