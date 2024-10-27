var TIMER
function getInputByName(form, name){ //obtiene un campo del formulario por su name
 var input = form.find('[name="' + name + '"]')
 if(input.prop('type') == 'radio'){
  return form.find('[name="' + name + '"]:checked')
 }
 
	return input

}

function getInputLabel(form, name){ //obtiene el texto del label del input por su name

  return form.find('[name="' + name + '"]').closest('.form-group').find('label').text();

}

function getForm(input){  //obtiene el formulario padre del campo
	return input.closest('form')
}

function getExclude(input){
	return input.closest('.input-box').find('.exclude-input')
}

function loadFormSelect(select, options, selected){ //recarga un select
  console.log('OPTIONS', options)
	select.children('option:not(:first)').remove();
	$.each(options, function(i, opt){
		var option = $('<option></option>')
		option.text(opt.text).val(opt.value)
		if(selected !== undefined){
			if(opt.value == selected){
				option.prop('selected', true)
			}
		}

		select.append(option)
	})
}

function hideShowBox(form, name, show){
  var input = getInputByName(form, name),
      box = input.closest('.input-box')
  if(show !== undefined){
    box.show()
  }else{
    box.hide()
  }
}

function selectOptions(array, text, value){
	var options = [];
	$.each(array, function(i, row){
		options.push({
			text: row[text],
			value: row[value]
		})
	})
	return options
}

function selectPreload(select, pre){ //muetra una precarga al select
   var parent = select.closest('.form-group');
   if(pre === undefined){
     parent.find('.form-select-preload').remove();
     return;
   }
              

   var preload = $('<i class="form-select-preload fas fa-spinner text-secondary"></i>');
   preload.css({
     position: 'absolute',
     bottom: '5px',
     right:'20px',
     zIndex: 100000000000000000,
     fontSize: '20px',
     animationName: 'select-preload',
     animationIterationCount: 'infinite',
     animationDirection: 'normal',
     animationDuration: '1s'
   });
   parent.css('position', 'relative');

   parent.append(preload);
}

function getDate(format, value){
	return value !== undefined ? moment(value).format(format) : moment().format(format)
}

function getValueOrDefault(value, default_value, force_value){
	 return value !== undefined ? (force_value !== undefined ? force_value : value) : default_value;
}

function markError(form, input_name, error){
  var input = form.find('[name="' + input_name + '"]')
	input.addClass('input-error');
	input.closest('.form-group').find('.error').remove()
	input.closest('.form-group').append('<small class="error text-danger"><i style="font-size:12px">' + error + '</i></small>')
	input.focus(function(evt){
		evt.preventDefault();
		$(this).removeClass('input-error');
		input.closest('.form-group').find('.error').remove();
		input.closest('form').find('.errors').fadeOut(150);

	});
}

function clearForm(form){
	 form.find(':input').each(function(){
			var input = $(this)
			var type = input.data('type')
			var defaultvalue = input.data('default')
						 		
			switch(type){
				case 'hidden':
					if(getValueOrDefault(defaultvalue, false)){
						input.val(defaultvalue)
					}
				break
				case 'text':
				case 'password':
				case 'numeric':
				case 'textarea':
					input.val(getValueOrDefault(defaultvalue, ''))
				break;
				case 'datepicker':
					input.val(getValueOrDefault(defaultvalue, getDate('DD/MM/YYYY')))
				break
				case 'timepicker':
					input.val(getValueOrDefault(defaultvalue, getDate('HH:mm')))
				break
				case 'datetimepicker':
					input.val(getValueOrDefault(defaultvalue, getDate('DD/MM/YYYY HH:mm')))
				break
				case 'rangepicker':
					input.val(getValueOrDefault(defaultvalue, [getDate('DD/MM/YYYY'), getDate('DD/MM/YYYY')].join(' - ')))
				break
				case 'select':
					input.val(getValueOrDefault(defaultvalue, '')).change()
				break
				case 'select2':
					input.val(getValueOrDefault(defaultvalue, '')).change()
				break
				case 'multiple':
					input.val(getValueOrDefault(defaultvalue, '')).change()
				break
				case 'radio':
					input.prop('checked', getValueOrDefault(defaultvalue, false))
				break
				case 'checkbox':
					input.prop('checked', getValueOrDefault(defaultvalue, false))
				break
				case 'switch':
					input.bootstrapSwitch('state', getValueOrDefault(defaultvalue, false))
				break
				case 'range':
					input.val(getValueOrDefault(defaultvalue, 0))
				break
				case 'colorpicker':
					input.val(getValueOrDefault(defaultvalue, '#000000')).change()
				break
				case 'file':
					input.val(null)
					form.find('.preview').prop('src', window.location.origin + "/plugins/Form/no_image.png")
				break;
				}
		})
}

function maxMin(btn){
			    	
					var input = $(btn).closest('.input-group').find('input'),
						n = parseInt(input.val()),
						h = parseInt(btn.hasClass('min') ? input.prop('min') : input.prop('max')),
						callback = input.data('callback'),
						step = '' + input.data('step')

						var increment = step.includes('.') ? parseFloat(step) : parseInt(step)
					TIMER = setInterval(function(){
							if(btn.hasClass('min')){
								n -= increment
															
								if(n < h){
									n = h
								}
							}else{
								n += increment
															
								if(n > h){
									n = h
								}
							}
							
							//console.log('num', n)
							if(step.indexOf('.') != -1){
								input.val(n.toFixed(2)) 
							}						
							input.val(n)
							
							try{
								window[callback(input, input.closest('form'))].call
							}catch(e){
								console.log('ERROR SPINNER', e)
							}

															
						}, 50)
			    }


(function($){
	'use strict'
	$.fn.extend({
		form: function(uiOptions){

			var form = $(this),
				options = {
					url:undefined,
					token: undefined,
					method: 'POST',
					target:undefined,
					inputs:undefined,
					before:undefined,
					success:undefined,
					error:undefined,
					demo:undefined,
					helper:undefined,
					submit:true,
					action:true

				},
				opc = $.extend(options, uiOptions)
				

				

				return $(this).each(function(){

          function callEvent(callback){
            try{
              window.callback = function(){
                callback
              }
              window.callback()
            }catch(error){
              console.log('ERROR CALLBACK AUTO', error)
            }
          }

					function getInputsDemo(type, size){
						var inputs = []
						inputs.push({
							type: 'separator',
							options:{
								type: 'separator',
							}
						})
						inputs.push({
							type: 'info_separator',
							options:{
								type: 'separator',
								sep:true,
								name:'separator'
							}
						})
						inputs.push({
							type: 'hidden',
							options:{
								type: 'hidden',
								name: 'hidden',
								label: '<small>Hidden</smal>',
								size:size
							}
						})
						inputs.push({
							type: 'text',
							options:{
								type: 'text',
								name: 'text',
								label: 'Text',
								placeholder: 'Nombre',
								size:size,
								events:['change'],
								callback: function(input){
									var form = getForm(input);
									var inp = getInputByName(form, 'icon');
									inp.val(input.val())
								}
							}
						})

						inputs.push({
							type: 'mask',
							options:{
								type: 'text',
								name: 'telefono', 
								label: 'Teléfono (aplicando Mask)',
								placeholder: '+54 (000) 0000-0000',
								size:size,
								mask: '+54 (000) 0000-0000'
							}
						})

						inputs.push({
								type: 'spinner',
								options:{
									type: 'spinner',
									name: 'maxmin', 
									label: 'Cantidad',
									min:1,
									max:100,
									step:1,
									value:1,
									className: 'btn-primary',
									size:size
								}
						})

						inputs.push({
							type: 'email',
							options:{
								type: 'text',
								name: 'email',
								label: 'Email (con validación)',
								placeholder: 'Email',
								value: 'correo@gmail.com',
								size:size,
								required: {
									value: '',
									exp: /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
									message: 'Dirección de correo inválida'
								}
							}
						})
						inputs.push({
							type: 'password',
							options:{
								type: 'password',
								name: 'password',
								label: 'Contraseña',
								required: {
									value: '',
									message: 'Campo inválido'
								},
								size:size,

							}
						})
						inputs.push({
							type: 'password_view',
							options:{
								type: 'password',
								name: 'password_view',
								label: 'Contraseña Visible',
								required: {
									value: '',
									message: 'Campo inválido'
								},
								show:true,
								size:size
							}
						})
						inputs.push({
							type: 'numeric',
							options:{
								type: 'numeric',
								name: 'number',
								label: 'Numérico',
								size:size,
								placeholder:'Solo numeros',
								value:15,
								
								positive:true,
								places:1,
								required:{
									value:'',
									range:{
										min:10,
										max:20
									},
									message: 'Debe indicar un valor entre 10 y 20'
								}
							}
						})
						inputs.push({
							type: 'textarea',
							options:{
								type: 'textarea',
								name: 'textarea',
								label: 'Text Area con Placeholder',
								placeholder: 'Su texto',
								rows: 5,
								size:size
							}
						})
						inputs.push({
							type: 'select',
							options:{
								type: 'select',
								name: 'select',
								label: 'Select',
								optionDefault: 'Seleccionar',
								options: [
									{text:'Opcion 1', value: 1},
									{text:'Opcion 2', value: 2},
									{text:'Opcion 3', value: 3},
								],
								size:size,
								value: 1
							}
						})
						inputs.push({
							type: 'select2',
							options:{
								type: 'select2',
								name: 'select2',
								label: 'Select 2',
								optionDefault: 'Seleccionar',
								options: [
									{text:'Opcion 1', value: 1},
									{text:'Opcion 2', value: 2},
									{text:'Opcion 3', value: 3},
								],
								size:size,
								value:2
								

							}
						})
						inputs.push({
							type: 'multiple',
							options:{
								type: 'multiple',
								name: 'multiple',
								label: 'Select Multiple',
								options: [
									{text:'Opcion 1', value: 1},
									{text:'Opcion 2', value: 2},
									{text:'Opcion 3', value: 3},
								],
								size:size,
								value:[3,1]

							}
						})
						inputs.push({
							type: 'multiple_exclude',
							options:{
								type: 'multiple',
								name: 'multiple_exclude',
								label: 'Multiple (Excluir)',
								options: [
									{text:'Opcion 1', value: 1},
									{text:'Opcion 2', value: 2},
									{text:'Opcion 3', value: 3},
								],
								size:size,
								exclude:true

							}
						})
						inputs.push({
							type: 'radio',
							options:{
								type:'radio',
								name: 'radio',
								label: 'Radio',
								options: [
									{text:'Opcion 1', value: 1},
									{text:'Opcion 2', value: 2},
									{text:'Opcion 3', value: 3},
								],
								size:size,
								value:2
							}
						})
						inputs.push({
							type: 'checkbox',
							options:{
								type:'checkbox',
								name:'checkbox',
								label:'Checkbox',
								size:size
							}
						})
						inputs.push({
							type: 'switch',
							options:{
								type:'switch',
								name:'switch',
								label:'switch',
								switch:{
									onColor:'success',
									onText: 'SI',
									offColor: 'danger',
									offText: 'NO',
									size: 'small',
									width: 100
								},
								size:size,
								checked:true
							}
						})
						inputs.push({
							type: 'image',
							options:{
								type:'file',
								name:'image',
								label:'Image File',
								size:size,
								image:true
								
							}
						})
						inputs.push({
							type: 'file',
							options:{
								type:'file',
								name:'file',
								label:'File',
								size:size
							}
						})

						inputs.push({
							type: 'datepicker',
							options:{
								type:'datepicker',
								name:'datepicker',
								label:'Date Picker',
								size:size,
								value: getDate('DD/MM/YYYY'),
								minDate: getDate('DD/MM/YYYY','01/01/2022'),
								maxDate: getDate('DD/MM/YYYY','01/02/2022')
							}
						})
						inputs.push({
							type: 'timepicker',
							options:{
								type:'timepicker',
								name:'timepicker',
								label:'Time Picker',
								size:size,
								value: getDate('HH:mm')
							}
						})
						inputs.push({
							type: 'datetimepicker',
							options:{
								type:'datetimepicker',
								name:'datetimepicker',
								label:'Date Time Picker',
								size:size,
								value: getDate('DD/MM/YYYY HH:mm'),
								minDate: getDate('DD/MM/YYYY HH:mm','01/01/2022 00:00'),
								maxDate: getDate('DD/MM/YYYY HH:mm','01/02/2022 23:59')
							}
						})
						inputs.push({
							type: 'rangepicker',
							options:{
								type:'rangepicker',
								name:'rangepicker',
								label:'Range Picker',
								size:size,
								startDate: getDate('DD/MM/YYYY', '2022-01-01'),
								endDate: getDate('DD/MM/YYYY'),
								minDate: getDate('DD/MM/YYYY','25/12/2021'),
								maxDate: getDate('DD/MM/YYYY','01/12/2022')

							}
						})
						inputs.push({
							type: 'colorpicker',
							options:{
								type:'colorpicker',
								name:'colorpicker',
								label:'Color Picker',
								size:size,
								value: '#ff0000'
							}
						})
						inputs.push({
							type: 'range',
							options:{
								type:'range',
								name:'range',
								label:'Range',
								min:0,
								max:10,
								step:1,
								size:size,
								value:5
							}
						})
						inputs.push({
							type: 'icon',
							options:{
								type: 'text',
								name: 'icon',
								label: 'Input Icon',
								size:size,
								icon:{
									right: 'fa fa-user'
								}
							}
						})

						inputs.push({
							type: 'icon_button',
							options:{
								type: 'button',
								name:'icon_button',
								label:'Buscar',
								align:'center',
								className:'btn-info',
								icon:{
									left: 'fa fa-search'
								},
								size:size
							}
						})

						inputs.push({
							type: 'reset',
							options:{
								type: 'reset',
								name:'clear_button',
								label:'Restablecer',
								align:'center',
								className:'btn-warning text-black',
								icon:{
										left: 'fa fa-refresh'
								},
								size:size
							}
						})

						inputs.push({
							type: 'doc_button',
							options:{
								type: 'button',
								name:'doc_button',
								label:'Ver Documentación',
								align:'right',
								className:'btn-primary',
								size:size,
								info:true,
								icon:{
									left: 'fa fa-file-text'
								},
								callback: function(){
									
									window.open(window.origin + '/plugins/Form/documentacion.txt', "_blank");
									
								}
							}
						})

						inputs.push({
							type: 'form_button',
							options:{
								type: 'button',
								name:'form_button',
								label:'Configuración Formulario',
								align:'center',
								className:'btn-success',
								size:size,
								info:true,
								callback: function(){
									
									Swal.fire({
										title: 'Formulario: configuración',
										icon:'info',
										html: '<div class="col-lg-12">\
	               								<h4>Insertar el json dentro de la invocación: $("#my-form").form(json)</h4>\
	               								<pre id="form-json" align="left"></pre>\
	               							</div>',
	               					width:1100,
	               					didOpen: function(){
	               						var pre = $(Swal.getHtmlContainer()).find('#form-json')
	               						
	               						
	               						var json = {
	               							url: 'url o action del formulario ej: "{{ route(my_route) }}" - OBLIGATORIO',
														token: 'token de seguridad: "{ csrf_token() }"  - OBLIGATORIO',
														method: 'POST o GET  - Por defecto: POST',
														target: '_self o _blank - por defecto es _self. - opcional, pero si se especifica _blank, se redirecciona a otra pestaña (usar esta opcion con cuidado)',
														inputs: '[] array de objetos de tipo input -  - OBLIGATORIO (no vacio) (minimo un campo)',
														before:  'función que se ejecuta antes del envío (ej: un pleasewait()) - Opcional',
														success: 'función de respuesta exitosa - Opcional',
														error: 'función de respuesta fallida - Opcional',
														submit:'Flag para anular el evento submit del formulario (para ocsiones en que solo se necesita obtener los campos). Por defecto es true'
	               						}

	               						
	               						pre.jsonViewer(json);
	               						pre.css('text-align', 'left')
	               					}
									}).then((result) => {
		            						
											 $('#helper-doc').click()
														

						            })
									
								}
							}
						})

						inputs.push({
							type: 'input_button',
							options:{
								type: 'button',
								name:'input_button',
								label:'Configuración General Inputs',
								align:'center',
								className:'btn-info',
								size:size,
								info:true,
								callback: function(){
									
									Swal.fire({
										title: 'Input: configuración',
										icon:'info',
										html: '<div class="col-lg-12">\
	               								<h4>Insertar el json dentro del array inputs: inputs.push(json) o inputs = [ json, json, ...json]</h4>\
	               								<pre id="input-json" align="left"></pre>\
	               								<pre id="obs" class="hidden" align="left"></pre>\
	               							</div>',
	               					width:1200,
	               					didOpen: function(){
		               						var pre = $(Swal.getHtmlContainer()).find('#input-json')
		               						var obs = $(Swal.getHtmlContainer()).find('#obs')
		               						
		               						
		               						var json = {
		               							type: 'Tipo de Input - OBLIGATORIO',
		               							name: 'Nombre de referencia (aplica el mismo valor al id)  - OBLIGATORIO',
		               							label: 'Texto a mostrar en el Label del input - opcional (si no se indica, no se muestra) - (para el caso de BUTTON o SUBMIT el valor del label es el texto del botón)',
		               							placeholder:'Texto de la etiqueta interna del input (Placeholder) - opcional',
		               							options: [
		               								{ 
		               									text: "Texto a mostrar en el item del select o label del radio button", 
			               								value: 'valor del item' 
			               							}
		               							],
		               							optionDefault: 'Texto por defecto para los campos de tipo SELECT (excepto multiple). valor por defecto: "Seleccionar"',
		               							exclude: 'Flag para habilitar un checkbox a los combos de tipo multiple. El name de este checkbox tiene esta estructura: select-name + "_exclude". ej: "sucursal_id_exclude"',
		               							checked: 'Flag para marcar campos de tipo checkbox. opcional',
		               							value: 'Valor del input. Si se declara un valor, el mismo se muestra en el campo dependiendo del type',
		               							default:'Valor por defecto que toma el input cuando se limpia el formulario. Opcional (por defecto restablece los campos da la forma convencional)',
		               							maxchar:'Restrincción de caracteres, si se declara restringe el número de caracteres al valor indicado (sólo aplica a los inputs TEXT y PASSWORD',
		               							required: { 
		               								value: 'Valor inválido a comparar con el valor del campo: si el valor coincide se activa el mensaje de error',
		               								range: {
		               									min: 'Valor mínimo válido (opcional)',
		               									max: 'Valor máximo válido (opcional)'
		               								},
		               								exp: 'Expresión regular para validar con ciertos requisitos. (opcional)',
		               								message: 'Mensaje de error a mostrar (por defecto "Campo inválido")'
		               							},
		               							switch:{
															onColor:'color del boton ON (primary, success, info, warning, danger, default). Por defecto success',
															onText: 'Texto boton ON. Por defecto SI',
															offColor: 'color del boton OFF (primary, success, info, warning, danger, default). Por defecto danger',
															offText: 'Texto boton OFF. Por defecto NO',
															size: 'Tamaño del switch: (mini, small, normal, large). Por defecto normal',
															width: 'ancho de los botones (ON/OFF). Por defecto auto'
														},
														startDate: 'Fecha inicial para rangepicker',
														endDate: 'Fecha final para rangepicker',
														minDate: 'Fecha inicial a partir de la cual se puede seleccionar en un campo de fecha (datepicker, datetimepicker, y rangepicker)',
														maxDate: 'Fecha final hasta la cual se puede seleccionar en un campo de fecha (datepicker, datetimepicker, y rangepicker)',
		               							show: 'Flag que habilita el ojo de ver contraseña (solo funciona con type PASSWORD)',
		               							integer: 'Flag para restringir a solo entero el input numérico',
		               							positive: 'Flag para restringir a solo epositivos el input numérico',
		               							places: 'Cantidad de decimales permitidos en el input numérico',
		               							min: 'Valor mínimo permitido (numerico) - opcional',
		               							max:  'Valor máximo permitido (numerico) - opcional',
		               							step: 'Unidad de incremento/decremento (para campos de tipo RANGE) - opcional (por defecto 1)',
		               							readonly: 'si se declara, establece el campo como sólo lectura',
		               							disabled: 'si se declara, deshabilita el campo',
		               							icon:{
		               								left: 'Icono izquierdo. ej (fa fa-user)',
		               								right: 'icono derecho'
		               							},
		               							mask: 'Atributo para enmascarar el campo. (solo aplica al tipo TEXT',
		               							align: 'Alineación de los botones (left, center, right). coloca el botón dentro de su contenedor en la posición establecisa (por defecto es center)',
		               							className: 'clase o clases CSS adicionales a aplicar a un elemento de tipo boton o submit',
		               							size: 'Ancho del campo de entre 1 y 12 (representa col-lg-n)',
		               							image: 'Flag para mostrar vista previa para subida de imagenes, si se indica se muestra la vista previa de la imágen cargada en el campo',
		               							accept: '[] array de extensiones permitidas, si no se especifica, se permite cualquier extensión',
		               							callback: 'función a ejecutar cuando el input detecta un evento. opcional',
		               							events: '[keyup, change, enter] para indicar que tipo de evento debe ejecutar la callback que se le pase (solo para campos de typo text, password, numeric)'
		               							
		               						}

		               						var detalles = [
		               							{
		               								title:'Tipos de Campos (Inputs)',
		               								description:'Listado de tipos:',
		               								items: [
		               									'HIDDEN: campo oculto',
		               									'TEXT: campo de texto',
		               									'PASSWORD: campo de contraseña',
		               									'TEXTAREA: area de texto',
		               									'NUMERIC: campo numerico',
		               									'SELECT: combo de seleccion',
		               									'SELECT2: combo de seleccion con buscador (select2)',
		               									'MULTIPLE: combo de seleccion múltiple',
		               									'RADIO: radio button',
		               									'CHECKBOX: casilla de verificación',
		               									'SWITCH: campo de tipo switch',
		               									'DATEPICKER: campo de fecha',
		               									'TIMEPICKER: campo de hora',
		               									'DATETIMEPICKER: campo de fecha y hora',
		               									'RANGEPICKER: campo de rango de fechas',
		               									'RANGE: campo de rango de valor',
		               									'COLORPICKER: campo de seleccion de color',
		               									'FILE: campo de subida de archivos',
		               									'BUTTON: boton de accion',
		               									'SUBMIT: boton de envio (ejecuta el formulario)',
		               									'RESET: boton para restablecer el formulario',
		               									'SEPARATOR: funciona como separador o salto de linea para una mejor agrupacion dentro del formulario'

		               								]
		               							},
		               							{
		               								title: 'Required',
		               								description: 'El atributo required es opcional, si se declara se activa la validación del campo y agrega el * rojo al label'
		               							},
		               							{
		               								title:'Options',
		               								description:'El array options sólo se declara para los inputs de tipo SELECT (excepto multiple) y RADIO'
		               							},
		               							{
		               								title:'Default',
		               								description:'El valor por defecto se usa para setear el campo con un valor especificado cuando se limpia el formulario. Es opcional, los valores predefinidos son:',
		               								items: [
		               										'HIDDEN: por razones de seguridad, este campo solo aplica valor por defecto, si se declara',
		               										'TEXT, PASSWORD, NUMERIC, TEXTAREA, SELECT, SELECT2, MULTIPLE: ""',
		               										'DATEPICKER: fecha actual',
		               										'TIMEPICKER: hora actual',
		               										'DATETIMEPICKER fecha y hora actual:',
		               										'RANGEPICKER: fecha actual desde y hasta',
		               										'RADIO, CHECKBOX: false',
		               										'SWITCH: Off',
		               										'RANGE: 0',
		               										'COLORPICKER: #000000',
		               										'FILE: no soporta valor por defecto, cuando se limpia queda undefined'
		               								]
		               							},
		               							{
		               								title:'Placeholder',
		               								description:'Etiqueta de campo opcional (TEXT, TEXTAREA, PASSWORD, NUMERIC)'
		               							},
		               							{
		               								title:'Value',
		               								description:'Depende del tipo:',
		               								items: [
		               									'TEXT, PASSWORD, NUMERIC, TEXTAREA: muestra el valor en el campo',
		               									'SELECT: selecciona el item coincidente',
		               									'MULTIPLE: para este componente se debe pasar como value un array [values], que selecciona todos los items coincidentes dentro del array',
		               									'RADIO: activa el item coincidente',
		               									'DATEPICKER, TIMEPICKER, RANGEPICKER: muestra el valor (preformateado para el caso)',
		               									'FILE: solo con atributo image se usa para cargar la vista previa del valor',
		               									'Campos no soportados: FILE (), CHECKBOX, SWITCH, RANGE, BUTTON, SUBMIT'

		               								]
		               							},
		               							{
		               								title:'Icon',
		               								description:'Icono de campo, si se especifica, debe existir al menos uno (left o right) del tipo fa fa-iconClass. Esto incorpora un icono (o los 2) al campo o dentro de un botón'
		               							},
		               							{
		               								title:'ReadOnly',
		               								description:'Sólo soportado por los campos de texto (TEXT, TEXTAREA, PASSWORD, NUMERIC, CAMPOS DE FECHA)'
		               							},
		               							{
		               								title:'minDate y maxDate',
		               								description:'Estos valores deben respetar el formato del campo a aplicar (DD/MM/YYYY para fecha y DD/MM/YYYY HH:mm para fecha y hora)',
		               							},
		               							{
		               								title:'Eventos',
		               								description:'Dependiendo del tipo, y si se especifica una callback, al hacer un cambio en el campo, dentro de la funcion callback se pueden ejecutar acciones',
		               								items: [
		               									'TEXT, TEXTAREA, PASSWORD, NUMERIC: para estos tipos se debe especificar el/los eventos del array events',
		               									'SELECT, RADIO, CHECKBOX, DATEPICKER, TIMEPICKER, RANGEPICKER, COLORPICKER, RANGE: usan por defecto el change',
		               									'FILE: no soportado',
		               									'BUTTON: usa por defecto el evento click'
		               								]
		               							}
		               						]
		               						obs.append('<h5 align="left">Aclaraciones</h5>');
		               						$.each(detalles, function(i, o){
		               								obs.append('<p align="left"><b class="text-blue">' + o.title + ':</b><span style="margin-left:5px">' + o.description + '</span></p>')
		               								if(o.items !== undefined){
		               									var ul = $('<ul></ul>')
		               									$.each(o.items, function(k, d){
		               										ul.append('<li>' + d + '</li>')
		               									})
		               									obs.append(ul)
		               								}
		               						})
		               						obs.removeClass('hidden')
		               						

		               						
		               						pre.jsonViewer(json);
		               						pre.css('text-align', 'left')
		               					}
											}).then((result) => {
				            						
													 $('#helper-doc').click()
														

						            })
								}
							}
						})

						inputs.push({
							type: 'submit',
							options:{
								type: 'submit',
								name: 'submit',
								label:'Enviar',
								align:'center',
								className:'btn-success',
								icon:{
									left:'fa fa-paper-plane'
								},
								size:size
							}
						})
						
						var options;
						$.each(inputs, function(i, input){
							if(input.type == type){
								options = input.options
							}
						})
						return options
						
					}

					function setInputId(name){
						return form.attr('id') + '-' + name;
					}

					function getInputConfig(name){
						var input;
						$.each(opc.inputs, function(i, inp){
							if(inp.name == name){
								input = inp
							}
						})
						return input
					}

					// function getInputByName(name){
					// 	return form.find('[name="' + name + '"]');
					// }

					

					function validarFormulario(form){
						
						var ok = true;
						$.each(opc.inputs, function(i, inp){
							var input = form.find('[name="' + inp.name + '"]');
							if(getValueOrDefault(inp.required, false)){
								var err = false;
								switch(inp.type){
									case 'radio':
									var val = form.find('[name="' + inp.name + '"]:checked').val();
										if(val === undefined || val == inp.required.value){
											err = true;
										}
									break;
									default:
										if(input.val() == inp.required.value){
                      console.log('VALUE', 'val:' + input.val(), inp)
											err = true;
										}
										if(getValueOrDefault(inp.required.range, false)){
											if(!isNaN(input.val())){
												var val = parseFloat(input.val())
												var desde = getValueOrDefault(inp.required.range.min, undefined)
												var hasta = getValueOrDefault(inp.required.range.max, undefined)
												if(desde !== undefined){
													if(val < desde){
														err = true
													}
												}
												if(hasta !== undefined){
													if(val > hasta){
														err = true
													}
												}
											}
											
										}
										if(getValueOrDefault(inp.required.exp, false)){
											
											if(!inp.required.exp.test(input.val()) ){
				    	
												err = true;
											}
										}
									break;
								}
								
								if(err){
									input.addClass('input-error');
									input.closest('.form-group').find('.error').remove()
									input.closest('.form-group').append('<small class="error text-danger"><i style="font-size:12px">' + inp.required.message + '</i></small>')
									input.focus(function(evt){
										evt.preventDefault();
										$(this).removeClass('input-error');
										input.closest('.form-group').find('.error').remove();
										input.closest('form').find('.errors').fadeOut(150);

									});
									ok = false;
								}
							}
						});
						if(!ok){
							form.find('.errors').fadeIn(150);
						}
						return ok;
					}

					function enviarFormulario(f, submit){
						if(getValueOrDefault(opc.target, false)){
							if(opc.target == '_blank'){
								f.data('send', 'send').submit();
								return
							}
						}
						var form = document.getElementById(f.attr('id'));
						var formData = new FormData(form);
						console.log('SUBMIT', submit)
						
						// if(!submit){
						// 	try{
						// 		console.log('ANTES BEFORE', Object.fromEntries(formData))
						// 	  	window[opc.before(Object.fromEntries(f, formData))].call
						// 	  	return;
						// 	}catch(e){
						// 	  	console.log('ERROR callback no submit', e)
						// 	  	return;
						// 	}
							
						// }
						console.log('FORMDATA', Object.fromEntries(formData))
						
				        $.ajax({
				            type:opc.method,
				            url: opc.url,
				            contentType: false,
				            dataType: 'text',
				            data:formData,
				            cache:false,
				            processData: false,
				            beforeSend: function(){
				         //    	try{
							  	 	 // 	window[opc.before()].call
							  	 	 // }catch(e){
							  	 	 // 	 console.log('ERROR callback before', e)
							  	 	 // }
                     callEvent(opc.before())
                    
				            },
				            success:function(data){
				               
				         //       try{
							  	 	 // 	window[opc.success(JSON.parse(data))].call
							  	 	 // }catch(e){
							  	 	 // 	 console.log('ERROR callback success', e)
							  	 	 // }
                     callEvent(opc.success(JSON.parse(data)))
				            },
				            error: function(data){
				            	console.log('FORM ERROR', data)
				            	if(opc.error !== undefined){
					        //       try{
								  	 	//  	window[opc.error(data)].call
								  	 	//  }catch(e){
								  	 	//  	 console.log('ERROR callback error', e)
								  	 	// }
                      callbackEvent(opc.error(form, data))
								  	}else{
								  		swal('Error', 'Error al enviar', 'error');
								  	}
				              
				            }
				        });
					}

					function upLoadFile(file){
					 var preview = file.closest('.form-group').find('.preview');
           var base64 =  file.closest('.form-group').find('[type="hidden"]');
					 
	             var input = $(file)[0],
					     inputFiles = input.files,
					     inputFile = inputFiles[0],
					     reader = new FileReader()
						 $(file).closest('.form-group').find('.input-ready').val($(file).val().split('fakepath\\')[1])
						 console.log('FILE', inputFile)
						 // if(inputFile.size > 25000000){
						 // 	swal('¡ATENCION!', 'El archivo no debe superar los 5mb', 'error');
						 // 	file.val('');
						 // 	$(file).closest('.form-group').find('.input-ready').val('');
						 //    return
						 // }
						 if(inputFiles == undefined || inputFiles.length == 0){
						 	swal('¡ATENCION!', 'Archivo no valido', 'error');
						     return
						 }

						 reader.onload = function(event) {
						      //url.html(event.target.result)
						      preview.prop('src', event.target.result)
                  base64.val(event.target.result)
						      callbackExe(file)
						      //preview.show()
						 }
						 reader.onerror = function(event) {
						     alert("Error al Cargar imágen: " + event.target.error.code);
						 }
						 reader.readAsDataURL(inputFile);
					}

					function getSubmit(){
						 var s = 0;
						 $.each(opc.inputs, function(i, input){
						 	 if(input.type == 'submit'){
						 	 	s++;
						 	 }
						 });
						 return s;
					}

					function getIconInput(side, icon){
            var left = $('<div class="input-group-prepend"><span class="input-group-text"><i></i></span></div>'),
               right = $('<div class="input-group-append"><span class="input-group-text"><i></i></span></div>'),
						   box = side == 'left' ? left : right
						box.find('i').addClass(icon)
            //box.find('i').data('show', 'hide')
						return box
					}

					function getInputGroup(input, icon){
						
						var group = $('<div class="input-group"></div>');
						if(getValueOrDefault(icon.left, false)){
							group.append(getIconInput('left', icon.left))
						}
						group.append(input)
						if(getValueOrDefault(icon.right, false)){
							group.append(getIconInput('right', icon.right))
						}
						return group
					}

					function getInputSpinner(input, options){
						
						var group = $('<div class="input-group"></div>'),
							  btnmin = $('<button class="btn btn-spiner btn-spinner-min min" data-action="-">\
														<i class="fa fa-minus"></i>\
													</button>'),
							  btnmax = $('<button class="btn btn-spiner btn-spinner-max max" data-action="+">\
														<i class="fa fa-plus"></i>\
													</button>')
						input.addClass('input-spinner')

						input.data('step', options.step)
						group.append(btnmin)
								  .append(input)
								  .append(btnmax)
						if(options.className !== undefined){
							group.find('button').addClass(options.className)
						}
						return group
					}

					function callbackExe(input){

						var callback = input.data('callback');
            console.log('FUNCTION', callback)

						// try{
						// 	window[callback(input)].call
						// }catch(e){
						// 	console.log('callback ERROR', e)
						// }

            try{
              window.callback = function(){
              	
                callback(input)
              }
              window.callback()
            }catch(error){
              console.log('ERROR CALLBACK AUTO', error)
            }
					}

					// function setEvents(){
					// 	form.find(':input').each(function(){
					//    	var input = $(this);
					//    	var config = getInputConfig(input.prop('name'));
					//    	if(getValueOrDefault(config, false)){
					// 	   	if(getValueOrDefault(config.show, false)){
					// 	   		 var icon = input.closest('.input-group').find('.icon-right i')
					// 	   		 icon.data('show', 'show')
					// 	   		 icon.click(function(evt){
					// 	   		 	evt.preventDefault()
					// 	   		 	var e = $(this).data('show')
					// 	   		 	var input = $(this).closest('.input-group').find('input')
					// 	   		 	if(e == 'show'){
					// 	   		 		$(this).data('show', 'hide')
					// 	   		 		$(this).removeClass('fa-eye').addClass('fa-eye-slash')
					// 	   		 		input.prop('type', 'text')
					// 	   		 	}else{
					// 	   		 		$(this).data('show', 'show')
					// 	   		 		$(this).removeClass('fa-eye-slash').addClass('fa-eye')
					// 	   		 		input.prop('type', 'password')
					// 	   		 	}
					// 	   		 })
					// 	   	}

					// 	   	if(getValueOrDefault(config.callback, false)){
					// 	   		input.data('callback', config.callback)
					// 	   		switch(input.prop('type')){
					// 	   			case 'text':
					// 	   			case 'numeric':
					// 	   			case 'password':
					// 	   			case 'textarea':
					// 	   				if(getValueOrDefault(config.events, false)){
					// 	   					if(onfig.events.length != 0){
					// 	   						$.each(config.events, function(i, e){
					// 	   							swtich(e){
					// 	   								case 'keyup':
					// 	   									input.keyup(function(evt){
					// 	   										var input = $(this)
					// 	   										var callback = input.data('callback')
					// 	   									})
					// 	   								break;
					// 	   							}
					// 	   						})
					// 	   					}
					// 	   				}
					// 	   			break;
					// 	   			case 'select':
					// 	   			case 'select-one':
					// 	   			case 'select-multiple':
					// 	   			case 'radio':
					// 	   			case 'checkbox':
					// 	   			case 'range':

					// 	   			break;
					// 	   		}
					// 	   	}
					// 	   }
					//    })
					// }



					function addWarning(msg, pos){
						var a = $('<div class="col-lg-12 alert form-warning">\
										<i class="fa fa-exclamation-triangle text-danger"></i>\
										<b style="margin-left:5px"></b>\
									</div>')
						a.find('b').html(msg)
						if(pos == 'top'){
							form.prepend(a)
						}else{
							form.append(a)
						}
					}

					function InputsDemo(){
						 return  [
								      	// getInputsDemo('form_button', 4),
								      	// getInputsDemo('input_button', 4),
								      	// getInputsDemo('doc_button', 4),

								      	// getInputsDemo('separator'),

								      	getInputsDemo('hidden', 1),
								      	getInputsDemo('text', 2),
								      	getInputsDemo('email', 3),
								      	getInputsDemo('password', 2),
								      	getInputsDemo('password_view', 2),
								      	getInputsDemo('numeric', 2),

								      	getInputsDemo('separator'),

								      	getInputsDemo('select', 3),
								      	getInputsDemo('select2', 3),
								      	getInputsDemo('multiple', 3),
								      	getInputsDemo('multiple_exclude', 3),

								      	getInputsDemo('separator'),
								      	
								      	getInputsDemo('rangepicker', 3),
								      	getInputsDemo('datepicker', 2),
								      	getInputsDemo('timepicker', 2),
								      	getInputsDemo('datetimepicker', 3),
								      	
								      	getInputsDemo('icon', 2),

								      	getInputsDemo('separator'),

								      	getInputsDemo('textarea', 3),
								      	getInputsDemo('radio', 2),
								      	getInputsDemo('checkbox', 1),
								      	getInputsDemo('mask', 3),
								      	getInputsDemo('spinner', 3),

								      	getInputsDemo('separator'),

								      	getInputsDemo('switch', 2),
								      	getInputsDemo('colorpicker', 2),
								      	getInputsDemo('range', 2),

								      	

								      	getInputsDemo('image', 3),
								      	getInputsDemo('file', 3),
								      	
								      	
								      	getInputsDemo('info_separator', 6),
								      	getInputsDemo('icon_button', 4),
								      	getInputsDemo('submit', 4),
								      	getInputsDemo('reset', 4)
								      	
								      	]
								      
					}

					function showDemo(){
						var row = $('<div class="col-lg-12">\
											 <label>Ayuda Formulario</label>\
											 <i id="helper-doc" class="fa fa-question-circle text-green"></i>\
										 </div>')
						row.css({
							height:50
						})
						row.find('label').css({
							position:'absolute',
							top:'50%',
							right: 40,
							transform: 'translateY(-50%)'
						})
						var help = row.find('#helper-doc')
						help.css({
							fontSize:'25px',
							marginLeft: '10px',
							position:'absolute',
							top:'50%',
							right: 5,
							transform: 'translateY(-50%)'
						})
						help.customAlert({
							type: 'form',
							title: 'Ejemplos de Uso',
							open:'click',
							html:'<form id="form-demo"></form>',
							width:'100%',
							icon:'',
							form: {
								      token: opc.token,
								      url: opc.url,
								      helper:true,
								      //submit:false,
								      inputs: [
								      	getInputsDemo('form_button', 4),
								      	getInputsDemo('input_button', 4),
								      	getInputsDemo('close_button', 4),

								      	getInputsDemo('separator'),

								      	getInputsDemo('hidden', 1),
								      	getInputsDemo('text', 2),
								      	getInputsDemo('email', 3),
								      	getInputsDemo('password', 2),
								      	getInputsDemo('password_view', 2),
								      	getInputsDemo('numeric', 2),

								      	getInputsDemo('separator'),

								      	getInputsDemo('select', 3),
								      	getInputsDemo('select2', 3),
								      	getInputsDemo('multiple', 3),
								      	getInputsDemo('multiple_exclude', 3),

								      	getInputsDemo('separator'),
								      	
								      	getInputsDemo('rangepicker', 3),
								      	getInputsDemo('datepicker', 2),
								      	getInputsDemo('timepicker', 2),
								      	getInputsDemo('datetimepicker', 3),
								      	
								      	getInputsDemo('icon', 2),

								      	getInputsDemo('separator'),

								      	getInputsDemo('textarea', 4),
								      	getInputsDemo('radio', 2),
								      	getInputsDemo('checkbox', 2),
								      	getInputsDemo('mask', 4),

								      	getInputsDemo('separator'),

								      	getInputsDemo('switch', 2),
								      	getInputsDemo('colorpicker', 2),
								      	getInputsDemo('range', 2),

								      	

								      	getInputsDemo('image', 3),
								      	getInputsDemo('file', 3),
								      	
								      	getInputsDemo('separator'),

								      	getInputsDemo('icon_button', 4),
								      	getInputsDemo('button', 4),
								      	getInputsDemo('submit', 4),
								      ],
								      before:function(form, data){
								      	Swal.fire({
								      		type: 'success',
								      		title: 'Envio de Formulario',
								      		text:'Formulario enviado'
								      	})
											// Swal.fire({
											// 	title: 'Datos a Eniar',
											// 	icon: 'success',
											// 	html: '<div class="col-lg-12">\
											// 				<pre id="json-request"></pre>\
											// 			</div>',
											// 	didOpen: function(){
											// 		var box = $(Swal.getHtmlContainer()).find('#json-request');

											// 		$(form).find(':input').each(function(){
											// 			  var input = $(this)
											// 			  console.log('TYPE', input.prop('type'))
											// 			  if(input.prop('type') == 'file'){
											// 			  		console.log('is FILE')
											// 				  if(input.files[0] !== undefined){
											// 				  	 	console.log('FILE', input);
											// 				  }
											// 			  }
														  
											// 		})
													
													
											// 		box.jsonViewer(data)
											// 	}
											// })
								      }
							      }

						})

						row.append(help)

						form.append(row)
						
					}

					function inputRepe(name){
						var count = 0
						 $.each(opc.inputs, function(i, input){
						 		if(input.name == name){
						 			count++
						 		}
						 })
						 return count > 1 ? true : false
					}

					
					function getReptidos(){
						
						var repes = []
						 $.each(opc.inputs, function(i, input){
						 	if(input.name !== undefined){
							 		if(inputRepe(input.name)){
							 			if(!repes.includes(input.name)){
							 				repes.push(input.name)
							 			}
							 			
							 		}
							 	}
						 })
						 return repes
					}

					function createForm(){
						if(getValueOrDefault(opc.demo, false)){
							//showDemo()
							opc.inputs = InputsDemo();
						}
						
						if(getValueOrDefault(opc.target, false)){
							form.prop('target', opc.target)
						}
						form.data('form', form.attr('id'))

						var input_token = $('<input type="hidden" name="_token">');
						//form.append(inp);
						
						input_token.val(opc.token);
						form.append(input_token);
						
						
						if(getValueOrDefault(opc.inputs, false)){
							if(opc.inputs.length != 0){
								console.log('INPUTS', opc.inputs)
								$.each(opc.inputs, function(i, inp){
									console.log('INPUT', inp)
									var preview = null;
									var input = $('<input class="form-control" autocomplete="off">');
									var label = $('<label></label>');
									switch(inp.type){
										
										case 'hidden':
											input = $('<input>');
											input.prop({
												id:setInputId(inp.name),
												name: inp.name,
												type:'hidden'
											}).val(getValueOrDefault(inp.value, ''))
										break;
										case 'text': case 'numeric':
											input.prop({
												id:setInputId(inp.name),
												name: inp.name,
												type:'text',
												placeholder: inp.placeholder,
												disabled: inp.disabled,
												readonly: inp.readonly

											}).val(getValueOrDefault(inp.value, ''))


											if(inp.type == 'numeric'){
												input.addClass(form.attr('id') + '-numeric');

											}else{
												input.prop({
													maxLength: getValueOrDefault(inp.maxchar, undefined)
												})
											}

                      if(inp.className !== undefined){
                          input.addClass(inp.className)
                      }
										break;
										case 'password':
											input.prop({
												id:setInputId(inp.name),
												name: inp.name,
												type:'password',
												placeholder: inp.placeholder,
												disabled: inp.disabled,
												readonly: inp.readonly,
												maxLength: getValueOrDefault(inp.maxchar, undefined)
											}).val(getValueOrDefault(inp.value, ''))
											if(getValueOrDefault(inp.show, false)){
												input = getInputGroup(input, {right: 'fa fa-eye-slash'})
                        
											}

                      if(inp.className !== undefined){
                          input.addClass(inp.className)
                      }
											
										break;
										case 'textarea':
											input = $('<textarea class="form-control"></textarea>');
											input.attr({
												id:setInputId(inp.name),
												name: inp.name,
												type:'textarea',
												rows: getValueOrDefault(inp.rows, 3),
												placeholder: inp.placeholder,
												disabled: inp.disabled,
												readonly: inp.readonly
											}).val(getValueOrDefault(inp.value, ''))
										break;
										case 'spinner':
											input.prop({
												id:setInputId(inp.name),
												name: inp.name,
												type:'number',
												placeholder: inp.placeholder,
												disabled: inp.disabled,
												readonly: inp.readonly,
												min: inp.min,
												max:inp.max,
												step:inp.step

											}).val(getValueOrDefault(inp.value, ''))
											input = getInputSpinner(input, inp)
										break;
										case 'select': case 'select2': case 'multiple':
											input = $('<select class="custom-select"></select>');
											if(inp.type == 'select2' || inp.type == 'multiple'){
												input.addClass(form.attr('id') + '-select2');
												input.addClass('select2')
											}
											input.prop({
												id:setInputId(inp.name),
												name:inp.name,
												disabled: inp.disabled
															
											});
											if(inp.type == 'multiple'){
												input.prop('multiple', true)
											}else{
												input.append('<option value="">' + getValueOrDefault(inp.optionDefault, 'Seleccionar') + '</option>')
											}
											if(getValueOrDefault(inp.options, false)){
												$.each(inp.options, function(i, opt){
													var option = $('<option></option>');
													option.text(opt.text).val(opt.value);
													if(getValueOrDefault(inp.value, false)){
														if(inp.type != 'multiple'){
															if(opt.value == getValueOrDefault(inp.value, '')){
																option.prop('selected', true);
															}
														}else{
															if(inp.value.includes(opt.value)){
																option.prop('selected', true);
															}
														}
													}
													input.append(option);
												});
											}

                      if(inp.className !== undefined){
                          input.addClass(inp.className)
                      }

													
										break;
										case 'radio':
											input = $('<div class="radio-group"></div>')
											input.prop({
												id:setInputId(inp.name),
											})
											if(getValueOrDefault(inp.options, false)){
												$.each(inp.options, function(i, opt){
													var radio = $('<div class="radio">\
																				  <label>\
																				    <input type="radio">\
																				    <span></span>\
																				  </label>\
																				</div>');
													radio.find('input').prop({
														name:inp.name,
														value: opt.value,
														checked: inp.value == opt.value ? true : false,
														disabled: inp.disabled
													});
													radio.find('span').html(opt.text);
													input.append(radio)

												});
											}
													
										break;
										case 'checkbox':
											input = $('<input>');
													
											input.prop({
												type:'checkbox',
												id:setInputId(inp.name),
												name:inp.name,
												checked: getValueOrDefault(inp.checked, false),
												disabled: inp.disabled
											});
													
											label.addClass('btn-block')
													
													
										break;
										case 'switch':
											var sw = inp.switch;
											var onColor = sw !== undefined ? getValueOrDefault(sw.onColor, 'success') : 'success';
											var offColor = sw !== undefined ? getValueOrDefault(sw.offColor, 'danger') : 'danger';
											var onText = sw !== undefined ? getValueOrDefault(sw.onText, 'SI') : 'SI';
											var offText = sw !== undefined ? getValueOrDefault(sw.offText, 'NO') : 'NO';
											var size = sw !== undefined ? getValueOrDefault(sw.size, 'normal') : 'normal';
											var width = sw !== undefined ? getValueOrDefault(sw.width, 'auto') : 'auto';
											input = $('<input \
													 				data-off-color="' + offColor + '"\
													 				data-on-color="' + onColor + '"\
													 				data-off-text="' + offText + '"\
													 				data-on-text="' + onText + '"\
													 				data-size="' + size + '"\
													 				data-width="' + width + '"\
													 			>')
											input.prop({
												type: 'checkbox',
												id:setInputId(inp.name),
												name: inp.name,
												checked: getValueOrDefault(inp.checked, false),
												disabled: inp.disabled
											}).addClass(form.attr('id') + '-switch');
													  
											if(width != null){
												input.data('width', width)
											}
											label.addClass('btn-block')
										break;
										case 'datepicker':
                      input.prop({
                        id:setInputId(inp.name),
                        name: inp.name,
                        type:'text',
                        disabled: inp.disabled,
                        readonly: inp.readonly
                      }).val(getValueOrDefault(inp.value, ''))
                      input.addClass(form.attr('id') + '-datepicker');
                      if(inp.orientation !== undefined){
                        input.data('orientation', inp.orientation);
                      }

                      if(getValueOrDefault(inp.icon, true)){
                        
                        input =  getInputGroup(input, {right: 'fa fa-calendar'})
                      }
                    break;
                    case 'timepicker':
                      var orientation = getValueOrDefault(inp.orientation , 'bottom');
                        input = $('<input class="form-control" data-orientation="' + orientation + '">');
                        input.prop({
                          id:setInputId(inp.name),
                          name: inp.name,
                          type:'text',
                          disabled: inp.disabled,
                          readonly: inp.readonly
                        }).val(getValueOrDefault(inp.value, ''))
                        input.addClass(form.attr('id') + '-timepicker');
                        if(inp.orientation !== undefined){
                          input.data('orientation', inp.orientation);
                        }
                        if(getValueOrDefault(inp.icon, true)){
                          input =  getInputGroup(input, {right: 'fa fa-clock'})
                        }
                    break;
                    case 'datetimepicker':
                      input.prop({
                        id:setInputId(inp.name),
                        name: inp.name,
                        type:'text',
                        disabled: inp.disabled,
                        readonly: inp.readonly
                      }).val(getValueOrDefault(inp.value, ''))
                      input.addClass(form.attr('id') + '-datetimepicker');
                      if(inp.orientation !== undefined){
                        input.data('orientation', inp.orientation);
                      }

                      if(getValueOrDefault(inp.icon, true)){
                        
                        input =  getInputGroup(input, {right: 'fa fa-calendar'})// inputgroup;
                      }
                    break;
										case 'rangepicker':
											input.prop({
												id:setInputId(inp.name),
												name: inp.name,
												type:'text',
												disabled: inp.disabled,
												readonly: inp.readonly
											}).val(getValueOrDefault(inp.value, ''))
											input.addClass(form.attr('id') + '-datepickerrange');
											if(getValueOrDefault(inp.icon, true)){
												input =  getInputGroup(input, {right: 'fa fa-calendar'})
											}
										break;
										case 'file':
                      console.log('CALL', inp.callback)
										   var btn_text = getValueOrDefault(inp.image, false) ? 'Cargar Imágen' : 'Cargar Archivo';
											var box = $('<div class="input-group">\
																<input type="text" class="form-control form-control-sm input-ready" readonly>\
                                <input type="hidden" name="' + inp.name + '">\
																<span class="input-group-btn col-12">\
																	<button class="' + form.attr('id') + '-upload btn btn-primary btn-sm" type="button">\
																		<i class="fa fa-upload"></i>\
													         		   <span style="margin-left:5px">' + btn_text + '</span>\
																	</button>\
																</span>\
															</div>')
											preview = inp.image ? $('<img class="preview img-thumbnail pull-left">') : null;
											
											input = $('<input class="' + form.attr('id') + '-file d-none">')
											input.prop({
												id:setInputId(inp.name),
												name: 'upload_' + inp.name,
												type:'file'
											})
                      if(inp.callback !== undefined){
                        input.data('callback', inp.callback)
                      }
											if(getValueOrDefault(inp.accept, false)){
												input.prop('accept', inp.accept.join(','))
											}
											
											box.find('.input-group-btn').append(input);
											if(getValueOrDefault(inp.disabled, false)){
												box.find('button').prop('disabled', true)
											}
                      if(inp.className !== undefined){
                        box.find('button').addClass(inp.className)
                      }
											input = box;
										break;
										case 'colorpicker':
                    // <span class="input-group-addon icon-color-picker"> </span>\
											var box = $('<div class="input-group">\
			                                        <input type="text" class="form-control ' + form.attr('id') + '-picker" autocomplete="off">\
                                              <div class="input-group-append"><span class="input-group-text p-1"><i class="picker fa fa-square"></i></span></div>\
			                                    </div>')
                      box.find('i').css({fontSize: '28px'})
											box.find('input').prop({
												id:setInputId(inp.name),
												name: inp.name,
												disabled: inp.disabled,
												readonly: inp.readonly
												}).on('changeColor', function(event) {
													console.log('COLORPICKER', 'picker')
	                				$(this).closest('.input-group').find('.picker').css('color', $(this).val());
	                				callbackExe($(this))
								        }).val(getValueOrDefault(inp.value, '#000000')).trigger('changeColor')
                        
											// box.find('.picker').click(function(){

											// })

											input = box
										break;
										case 'range':
											box = $('<div class="col-12 box-range flex-row-between-center p-1">\
															<input class="range">\
															<input class="form-control form-control-sm value">\
														</div>')
											var val = getValueOrDefault(inp.value, getValueOrDefault(inp.min, 0));

											box.find('.value').prop({
                          type: 'text'
                      }).css({width:inp.width !== undefined ? inp.width + 'px' : '20%', textAlign:'center'})
                        .val(val)

                      box.find('.value').numeric({
                        negative:false,
                        decimal:false
                      })

											box.find('.range').prop({
												type: 'range',
												id:setInputId(inp.name),
												name: inp.name,
												min:getValueOrDefault(inp.min, 0),
												max:getValueOrDefault(inp.max, 1),
												step:getValueOrDefault(inp.step, 1),
												disabled: inp.disabled
											}).css({width:'70%'})
                        .val(val)
                      if(inp.callback !== undefined){
                        box.find('input').data('callback', inp.callback)
                      }

											input = box
										break;
										case 'button': case 'submit': case 'reset':
											input = $('<button><span></span></button>');
											input.prop({
												type: inp.type,
												name: inp.name,
												disabled: inp.disabled,
											});
											input.addClass('btn');
											if(inp.className !== undefined){
												input.addClass(inp.className)
											}
											if(inp.icon !== undefined){

												if(inp.icon.left !== undefined){
													var icon = $('<i></i>');
													icon.addClass('icon-left');
													icon.addClass(inp.icon.left)
													input.prepend(icon)
												}
												if(inp.icon.right !== undefined){
													var icon = $('<i></i>');
													icon.addClass('icon-right');
													icon.addClass(inp.icon.right)
													input.append(icon)
												}
											}

											input.find('span').html(inp.label);

										break;
									}

									var row = $('<div class="input-box pl-2 pr-2"></div>');

                  if(getValueOrDefault(inp.boxClassName, false)){
                    row.addClass(inp.boxClassName)
                  }

									if(inp.type == 'separator'){
										row.addClass('col-lg-12')
										row.append('<hr>')
										if(getValueOrDefault(inp.sep, false)){
											row.append('<i class="input-helper form-helper fa fa-question-circle text-blue"></i>')
										}
                  }else if(inp.type == 'info'){
                    row.addClass('col-lg-' + (inp.size !== undefined ? inp.size : 12))
                    row.append('<p class="m-0 mt-2">\
                                  <i class="fa fa-info-circle text-danger"></i>\
                                  <small>' + inp.value + '</small>\
                                </p>')
									}else{
									
										var fgroup = $('<div class="form-group" align="left"></div>');
												
										row.addClass('col-' + getValueOrDefault(inp.size, 12) + ' col-lg-' + getValueOrDefault(inp.size, 12));
										
										if(inp.type != 'button' && inp.type != 'submit' && inp.type != 'reset'){
											if(inp.label !== undefined){
												label.prop({for: inp.name}).html(inp.label);
												if(getValueOrDefault(inp.required, false)){
													label.append('<i class="fa fa-info-circle text-danger ml-1"></i>')
												}
												fgroup.append(label)
												
														
												

											}
											
											if(preview != null){
												  if(inp.scale !== undefined){
												  	var scale = inp.scale
												  	if(scale.width !== undefined){
												  		preview.css('width', scale.width)
												  	}
												  	if(scale.height !== undefined){
												  		preview.css('height', scale.height)
												  	}
												  }else{
												  	preview.css('height', '70px')
												  }
													input.find('.input-ready').hide();
													input.addClass('btn-block')
													fgroup.find('label').addClass('btn-block')
													fgroup.find('label').after(preview)
													preview.prop('src', getValueOrDefault(inp.value, window.location.origin + "/plugins/Form/no_image.png"))
													preview.show()
											}


										}
										if(getValueOrDefault(inp.align, false)){
											fgroup.css('text-align', inp.align)

										}

										if(getValueOrDefault(inp.icon, false)){
											
											switch(inp.type){
												case 'text':
												case 'numeric':
												case 'password':
												case 'select':
												case 'select2':
												case 'multiple':
												case 'datepicker':
												case 'timepicker':
												case 'datetimepicker':
												case 'rangepicker':
													input = getInputGroup(input, inp.icon)
												break;
											}
										}

										fgroup.append(input);
												
										row.append(fgroup)



										if(getValueOrDefault(opc.helper, false)){
											if(inp.info === undefined){
												if(inp.type == 'button' || inp.type == 'submit' || inp.type == 'reset'){
													row.find('button').after('<i class="input-helper form-button-helper fa fa-question-circle text-blue"></i>')
												}else{
													row.append('<i class="input-helper form-helper fa fa-question-circle text-blue"></i>')
												}
											}
										}

										if(getValueOrDefault(inp.exclude, false)){
											var e = $('<p class="exclude pull-right">\
																<small>Excluir</small>\
																<input class="exclude-input" name="' + inp.name + '_exclude" type="checkbox" style="margin-left:5px">\
															</p>')
											row.append(e)
											row.find('.form-helper').css({right: '130px'})
												
										}


									}
									row.find('.input-helper').data('input', JSON.stringify(inp)).click(function(evt){
										evt.preventDefault();
										var input = JSON.parse($(this).data('input'))
										var name = input.name.toUpperCase();
										if(input.type == 'hidden'){
											delete input.label
											
										}
										if(input.type == 'separator'){
											delete input.name
											delete input.sep
											
										}
										Swal.fire({
											title: 'Ejemplo de ' + name,
											icon: 'info',
											html: '<pre id="json-input-config"></pre>',
											didOpen: function(){
												var pre = $(Swal.getHtmlContainer()).find('#json-input-config');
												pre.css('text-align', 'left')
												pre.jsonViewer(input)
											}

										}).then((result) => {
		            						
											 $('#helper-doc').click()
														

						            })
									})

									if(getValueOrDefault(inp.margin, false)){
										row.addClass(inp.margin)
									}

									if(getValueOrDefault(inp.groupWith, false)){
										if(inp.groupWith.action == 'update'){
                      row.removeClass('pl-2').removeClass('pr-2')//.addClass('col-lg-12')
											form.find('#group-with-' + inp.groupWith.id).append(row)
										}else{
											row.prop('id', 'group-with-' + inp.groupWith.id)
											form.append(row)
										}
									}else if(getValueOrDefault(inp.box, false)){
                     form.find('#' + inp.box).append(row)

                  }else{
										form.append(row)
									}
									
								}) //fin for inputs
							} //fin inputs
						}
						
						var errors = $('<div class="errors col-lg-12 alert alert-warning">¡ATENCION!. Hay campos con errores</di>')
						errors.hide();
						form.append(errors)
						
							
						
		            $.each(opc.inputs, function(i, inp){
		               var input = getInputByName(form, inp.name);


					
		               			
		               	input.data('callback', inp.callback)
		               	input.data('type', inp.type)
		               	input.data('default', inp.default)
		               	switch(inp.type){
		               		case 'text':
    						   		case 'numeric':
    						   		case 'password':
    						   		case 'textarea':
						   			if(inp.type == 'password'){
			               			if(getValueOrDefault(inp.show, false)){
									   		 var icon = input.closest('.input-group').find('i')
									   		 icon.data('show', 'show')
									   		 icon.click(function(evt){
									   		 	evt.preventDefault()
									   		 	var e = $(this).data('show')
									   		 	var input = $(this).closest('.input-group').find('input')
									   		 	if(e == 'show'){
									   		 		$(this).data('show', 'hide')
									   		 		$(this).removeClass('fa-eye-slash').addClass('fa-eye')
									   		 		input.prop('type', 'text')
									   		 	}else{
									   		 		$(this).data('show', 'show')
									   		 		$(this).removeClass('fa-eye').addClass('fa-eye-slash')
									   		 		input.prop('type', 'password')
									   		 	}
									   		 })
									   	}
									   }
									   if(inp.type == 'numeric'){

									   	input.numeric({
									       	decimal: getValueOrDefault(inp.integer, undefined, false),
									       	decimalPlaces: getValueOrDefault(inp.places, 0),
									       	negative: getValueOrDefault(inp.positive, undefined, false)
									       
									       },
							                function () {
							                    
							                    this.value = '';
							                    this.focus();
							                }
									       );
									   }
									   if(inp.type == 'text' && getValueOrDefault(inp.mask, false)){
									   	input.inputmask(inp.mask)
									   }
									   if(getValueOrDefault(inp.events, false)){
									   	if(inp.events.length != 0){

									   		$.each(inp.events, function(i, e){
									   			switch(e){
									   				case 'keyup':
									   					input.keyup(function(evt){
									   						evt.preventDefault();
																callbackExe($(this));
															})
									   				break;
									   				case 'enter':
									   					$('input').keydown( function(e) {
									   						evt.preventDefault();
											            	var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
											           		if(key == 13) {
											               	callbackExe($(this));
											                }
											             })
									   				break;
									   				case 'change':
									   					input.change(function(evt){
									   						evt.preventDefault();
																callbackExe($(this));
															})
									   				break;
                          
									   				
									   			}
									   		})
									   	}
									   }

                    
		               		break;
		              case 'spinner':
		              					input.keyup(function(){
																	var inp = $(this),
																		callBack = inp.data('exe'),
																		data = inp.data('data'),
																		val = inp.val()
																try{
																	window[callback($(this), $(this).closest('form'))].call
																}catch(e){
																	callbackExe($(this));
																}						
																
															})
																				
															input.closest('.form-group')
																													.find('button')
																													.prop('type', 'button')
																													.mousedown(function(evt){
																															evt.preventDefault()
																															maxMin($(this))
																														}).mouseup(function(evt){
																															evt.preventDefault()
																															clearInterval(TIMER)
																														}).mouseleave(function(evt){
																															evt.preventDefault()
																															clearInterval(TIMER)
																														}).bind('touchstart', function(evt){
                                                               evt.preventDefault()
                                                               maxMin($(this))
                                                            }).bind('touchend', function(evt){
                                                              evt.preventDefault()
                                                              clearInterval(TIMER)
                                                            })

		              break;
		              case 'select':
									case 'select2':
									case 'multiple':
									case 'radio':
									case 'checkbox':
									//case 'colorpicker':
									
										input.change(function(evt){
									   	evt.preventDefault();
											callbackExe($(this));
										})
									break
									case 'switch':
                    input.bootstrapSwitch('state', input.prop('checked'))//
										input.on('switchChange.bootstrapSwitch', function(evt){
											evt.preventDefault();
											callbackExe($(this));
										})
                     //input.prop('checked')
									break
									case 'range':
										input.on('input', function(evt){
                      evt.preventDefault();
                      $(this).closest('.form-group').find('.value').val($(this).val())
                      var callback = $(this).data('callback');
                      try{
                        window[callback($(this), $(this).closest('form'))].call
                      }catch(e){
                        callbackExe($(this));
                      }
                    })
                    input.closest('.form-group').find('.value').keyup(function(evt){
                      evt.preventDefault()
                      $(this).closest('.form-group').find('.range').val($(this).val())
                      var callback = $(this).data('callback');
                      try{
                        window[callback($(this), $(this).closest('form'))].call
                      }catch(e){
                        callbackExe($(this));
                      }
                      
                    })
									break
									case 'rangepicker':
										var conf = {
											    locale: 'es-us', //LOCALE,
											    startDate: getValueOrDefault(inp.startDate, getDate('DD/MM/YYYY')),
												 endDate: getValueOrDefault(inp.endDate, getDate('DD/MM/YYYY'))
											 }
										 if(getValueOrDefault(inp.minDate, false)){
										 	conf = Object.assign(conf, {minDate: inp.minDate})
										 }
										 if(getValueOrDefault(inp.maxDate, false)){
										 	conf = Object.assign(conf, {maxDate: inp.maxDate})
										 }
										input.daterangepicker(conf);
									break;
									case 'datepicker':
										var conf = {
								                autoclose: true,
								                format: 'dd/mm/yyyy',
								                language: 'es',
								                orientation: getValueOrDefault(inp.orientation, 'bottom')
								            	}
								      if(getValueOrDefault(inp.minDate, false)){
								      	conf = Object.assign(conf, {startDate: inp.minDate})
								      }
								      if(getValueOrDefault(inp.maxDate, false)){
								      	conf = Object.assign(conf, {endDate: inp.maxDate})
								      }
										//input.datepicker(conf);
                    input.datepicker(conf)
				      
									break;
									case 'datetimepicker':
										var conf = {
								                showClear:true,
								                format: 'DD/MM/YYYY HH:mm',
								                locale: 'es-us'
								            	}
								      if(getValueOrDefault(inp.minDate, false)){
								      	conf = Object.assign(conf, {minDate: inp.minDate})
								      }
								      if(getValueOrDefault(inp.maxDate, false)){
								      	conf = Object.assign(conf, {maxDate: inp.maxDate})
								      }
										input.datetimepicker(conf);
				      
									break;
									case 'button':
										console.log('checkeo button', inp.name)
										input.click(function(evt){
									   	evt.preventDefault();
									   	console.log('entro boton')
											callbackExe($(this));
										})
									break
									case 'reset':
										input.click(function(evt){
									   	evt.preventDefault();
									   	var frm = getForm($(this))
									   		$(document).customAlert({
									   			 type: 'question',
									   			 open:'auto',
									   			 title: 'Limpiar Formulario',
									   			 text: '¿Seguro de limpiar el formulario?',
									   			 callbackConfirm:function(){
									   			 	clearForm(form)
									   			 		$(document).customAlert({
														 	 type:'info',
														 	 open:'auto',
														 	 title:'Restablecer',
														 	 text:'Formulario restablecido'
														 })
									   			 }
									   		})
									   		
										})
									break
								}
		               
		            });

		            console.log('FORM', form.attr('id'))

						
						
				      $('.' + form.attr('id') + '-timepicker').each(function(){
				           $(this).datetimepicker({
		    	                format: 'HH:mm',
		    	                widgetPositioning:{
	                                horizontal: 'auto',
	                                vertical: getValueOrDefault($(this).data('orientation'), 'bottom')
	                            },
                              icons: {
                                    time:'fa fa-clock-o',
                                    date:'fa fa-calendar',
                                    up:'fa fa-chevron-up',
                                    down:'fa fa-chevron-down',
                                    previous:'fa fa-chevron-left',
                                    next:'fa fa-chevron-right',
                                    today:'fa fa-crosshairs',
                                    clear:'fa fa-trash-o',
                                    close:'fa fa-times'
                                  }

	                     });
		   	       });

				       
				       $('.' + form.attr('id') + '-picker').colorpicker();
						 //$('.' + form.attr('id') + '-switch').bootstrapSwitch('state', false)
						 $('.' + form.attr('id') + '-file').change(function(){

							upLoadFile($(this))
						 });
						$('.' + form.attr('id') + '-upload').click(function(evt){
							  evt.preventDefault();
							   $(this).closest('.input-group-btn').find('input').click();

					   });

					   $('.' + form.attr('id') + '-select2').each(function(){
					   	  var prepend = $(this).closest('.input-group').find('.input-group-prepend'),
					   	  		append = $(this).closest('.input-group').find('.input-group-append'),
					   	  		icon = false,
					   	  		w = 0
                
					   	  if(append.length != 0){
					   	  	w += append.width()
					   	  	icon = true
					   	  }
					   	  if(prepend.length != 0){
					   	  	w += prepend.width()
					   	  	icon = true
					   	  }
					   	  
					   		$(this).select2({
							   			width: icon ? 'calc(100% - ' + w + 'px)' : '100%',
							   			dropdownParent: getValueOrDefault(opc.modal, false) ? $('.swal2-modal') : form
							   })
					   });

					   //setEvents();
					  if(opc.action){
						  if(opc.url === undefined){
								addWarning('La ruta del formulario no está definida', 'top');
								
							}
							if(opc.token === undefined){
								addWarning('No se definió el csrf token de seguridad', 'top');
								
							}
						}
						if(opc.inputs === undefined){
							addWarning('Debe existir al menos un campo de formulario', 'bottom');
						}else if(opc.inputs.length == 0){
							addWarning('Debe existir al menos un campo de formulario', 'bottom');
						}
						if(opc.inputs !== undefined){
							if(opc.inputs.length != 0){
								var repetidos = getReptidos()
								if(repetidos.length != 0){
									 $.each(repetidos, function(i, repe){
									 		addWarning('El atributo "name" del campo ' + repe + ' esta repetido', 'bottom');
									 })
								}
							}
						}
						var i_submit = getSubmit();

						if(i_submit == 0 && opc.submit){
							addWarning('Falta delcarar el Botón de Envío (Submit). En caso de no utilizar este evento, declarar la opción submit:false', 'bottom');
							
						}

						if(i_submit > 1){
							addWarning('No puede haber mas de un Botón de tipo "Submit"', 'bottom');
							
						}



					   form.submit(function(evt){
					   	
					   	var f = $(this);
					   	if(getValueOrDefault(f.data('send'), false)){
					   		return
					   	}
					   	
					      evt.preventDefault();
					   	
					   	if(!validarFormulario(f)){
					   		
					   		return;
					   	}
					   	if(!opc.action){
								callEvent(opc.before())
								return
							}
					   	enviarFormulario(f, opc.submit);
					   })
					} //fin crear form
						
					createForm();
			}); //fin return
		}

	})//fin extend

})(jQuery)

