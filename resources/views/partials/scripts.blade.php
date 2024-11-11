<style>

  @keyframes girar {
          from {
            transform: rotate(0deg);
          }
          to {
            transform: rotate(360deg);
          }
     }


  .block-ui{
     position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.8);
   z-index: 100000;
  }
  .block-ui i{
   color: white;
    font-size: 70px;
    animation-name: girar;
      animation-duration: 1s;
      animation-iteration-count: infinite;
      animation-timing-function: linear;
  }
</style>
<script>
  var COLORS = [],
      LAST_URL = null,
      PAGES = [],
      RAIN = null,
      PAPELITOS = null
  @isset($colors)
    COLORS = {!! $colors !!}
  @endisset
  function preload(show){
       
    if(show !== undefined){
      $('#preload').fadeIn(150)
    }else{
      $('#preload').fadeOut(150)
    }
  }

  function stopTimer(T){
    log('stop timer', [])
    if(T != null){
      clearInterval(T)
    }
  }

  function blockUi(container, show){
    if(show !== undefined){
      var div = $('<div class="block-ui flex-row-center-center">\
                    <i class="fa fa-spinner"></i>\
                  </div>')
      $("#"+container).append(div)
       
    }else{
      $("#"+container).find('.block-ui').remove();
    }
  }

  function darkenColor(hex, percent) {
            if (hex === undefined) {
                return '#ffffff';
            }
            if (hex == null) {
                return '#ffffff';
            }
            hex = hex.replace(/^s*#|s*$/g, "");
            if (hex.length == 3) {
                hex = hex.replace(/(.)/g, "$1$1");
            }

            var r = parseInt(hex.substr(0, 2), 16),
                g = parseInt(hex.substr(2, 2), 16),
                b = parseInt(hex.substr(4, 2), 16);

            return "#" +
                ((0 | (1 << 8) + r * (1 - percent / 100)).toString(16)).substr(1) +
                ((0 | (1 << 8) + g * (1 - percent / 100)).toString(16)).substr(1) +
                ((0 | (1 << 8) + b * (1 - percent / 100)).toString(16)).substr(1);
        }

//no usar esta
  function sendRequest(url, params, successFunction, failureFunction){
    $.post(
        url, 
        params, 
        function(data, textStatus, xhr) {
            try{
                  window.callback = function(){
                    successFunction(data)
                  }
                    window.callback()
                }catch(error){

                    console.log('ERROR CALLBACK AUTO', error)

            }
                        
    }).fail(function (data){
      preload()
        if(data.status  == 422){
          if(failureFunction !== undefined){
              try{
                  window.callback = function(){
                    failureFunction(data.responseJSON.errors)
                  }
                    window.callback()
                }catch(error){

                    console.log('ERROR CALLBACK AUTO', error)

               }
          }
          
          var content = document.createElement('div');
          content.innerHTML = processValidation(data.responseJSON.errors);
          Swal.fire({
            title: '{{ __('validation.swal.error') }}',
            text: '{{ __('validation.swal.text') }}',//content.innerHTML,
            icon: "error",
            allowOutsideClick: false
          });
        }else{

          swal('Error', '{{ __('validation.swal.message') }}'  + data.responseJSON.message, 'error');
        }
    })
  }

  function sendPostRequest(url, params, successFunction, failureFunction){
    var data = {_token: '{{ csrf_token() }}'}
    if(params != null){
      data = Object.assign(data, params)
    }
    //console.log('SEND POST REQUEST')
    $.post(
        url, 
        data, 
        function(data, textStatus, xhr) {
            try{
                  window.callback = function(){
                    successFunction(data)
                  }
                    window.callback()
                }catch(error){

                    console.log('ERROR CALLBACK AUTO', error)

            }
                        
    }).fail(function (data){
      preload()
        if(data.status  == 422){
          if(failureFunction !== undefined){
              try{
                  window.callback = function(){
                    failureFunction(data.responseJSON.errors)
                  }
                    window.callback()
                }catch(error){

                    console.log('ERROR CALLBACK AUTO', error)

               }
          }
          
          var content = document.createElement('div');
          content.innerHTML = processValidation(data.responseJSON.errors);
          Swal.fire({
            title: '{{ __('validation.swal.error') }}',
            text: '{{ __('validation.swal.text') }}',//content.innerHTML,
            icon: "error",
            allowOutsideClick: false
          });
        }else{

          swal('Error', '{{ __('validation.swal.message') }}'  + data.responseJSON.message, 'error');
        }
    })
  }

  function getSwitch(options){
    var datas = [
                    'data-toggle="switchbutton"',
                    'data-on-color="' + (options.onColor !== undefined ? options.onColor : 'success') + '"',
                    'data-off-color="' + (options.offColor !== undefined ? options.offColor : 'danger') + '"',
                    'data-on-text="' + (options.onText !== undefined ? options.onText : 'SI') + '"',
                    'data-off-text="' + (options.offText !== undefined ? options.offText : 'NO') + '"',
                    'data-state="' + options.state + '"',
                    'data-cancel="off"',
                    'data-id="' + options.id + '"'
                  ],
        className = ''
    if(options.size !== undefined){
      datas.push('data-size="' + options.size + '"')
    }

    if(options.width !== undefined){
      datas.push('data-width="' + options.width + '"')
    }

    if(options.className !== undefined){
      className = 'class="' + options.className + '"'
    }
    return '<input type="checkbox" ' + className + ' ' + datas.join(' ') + '>'
   
  }

  function setEnableTable(btn, url, title, field, callback){
    btn.bootstrapSwitch('state', btn.data('state'))
    btn.on('switchChange.bootstrapSwitch',  function(evt, state){
        evt.preventDefault()
        var btn = $(this),
            id = btn.data('id'),
            cancel = btn.data('cancel') == 'on' ? true : false

        if(cancel){
          btn.data('cancel', 'off')
          return
        }
        Swal.fire({
                     title: title,
                     text: '¿Seguro de ' + (state ? 'habilitar' : 'deshabilitar') + ' este ' + field + '?',
                     icon: "warning",
                     showCancelButton: true,
                      confirmButtonColor: "#006600",
                      confirmButtonText: "SI",
                      cancelButtonColor: "#ff0000",
                      cancelButtonText: "NO",
                      closeOnConfirm: false
                   }).then((will) => {

                      if(will.isConfirmed){
                         preload(true)
                         $.post(
                            url,
                            {
                              _token: '{{ csrf_token() }}',
                              state: state ? 1 : 0,
                              id: id
                              },
                            function(data, textStatus, xhr) {
                              preload()
                                if(data.result == 'OK'){

                                   Swal.fire('OK', data.message,'success');
                                   window[callback()].call
                                }else{
                                  
                                    Swal.fire('Error', data.message,'error');
                                }

                        }).fail(function (data){
                            preload()
                            Swal.fire('Error', 'Ocurrio un error al guardar: ' + data.responseJSON.message, 'error');
                        })
                      }else{
                         btn.data('cancel', 'on')
                         btn.bootstrapSwitch('state', !state)

                      }
          });
      });
  }

  function isDefined(value){
    return value !== undefined ? true : false
  }

  function getVal(row, field, value_default){
    return row != null ? row[field] : value_default
  }

  function getValue(value, value_default){
    return value != null ? value : value_default
  }

// ***********************************************

  function getBoolean(value){
    if(value === undefined){
      return false
    }
    return value == 1 ? true : false
  }

  function getImageSource(path, default_path){
    if(default_path === undefined){
      default_path = path
    }
    var src = path != null ? path : default_path
    return "{{ asset('resources') }}/" + src
  }

  function swalSiNo(title, text, callback, alternative){
    Swal.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#006600",
                confirmButtonText: "SI",
                cancelButtonColor: "#ff0000",
                cancelButtonText: "NO"
                //closeOnConfirm: false
              }).then((will) => {
                if(will.isConfirmed){

                  try{
                    window.callback = function(data){
                      callback()
                    }
                    window.callback()
                  }catch(error){
                    console.log('ERROR CALLBACK AUTO', error)
                  }
                }else{
                  try{
                    window.callback = function(data){
                      alternative()
                    }
                    window.callback()
                  }catch(error){
                    console.log('ERROR CALLBACK AUTO', error)
                  }
                }

              })
  }

  function swalResponse(title, response, callback){
    Swal.fire(title, response.message, response.result == 'OK' ? 'success' : 'error').then(function(){
         if(response.result == 'OK'){
            try{
                window.callback = function(data){
                  callback()
                }
                //window.callback()
            }catch(error){
              console.log('ERROR CALLBACK AUTO', error)
            }
         }
    })
  }

  function setForm(form, inputs, url, callback){
    form.form({
      token: '{{ csrf_token() }}',
      url: url,
      inputs:inputs,
      submit: url != null ? true: false,
      before: function(){
        preload(true)
      },
      success: function(data){
        try{
          window.callback = function(data){
            callback(data)
          }
          window.callback(data)
        }catch(error){
          console.log('ERROR CALLBACK AUTO', error)
        }
      },
      error: function(form, errors){
        console.log('FORM errors', errors)
        var keys = Object.keys(errors);
            
        $.each(keys, function(i, key){
          markError(form, key, errors[key])
        });
        
      }
    })
  }

  function goPage(route, params){
    var url = route
    if(params !== undefined){
      $.each(params, function(i, param){
        url = url.replace('::' + i, param)
      })
    }
     preload(true)
    window.location.href = url

  }

  function nextPage(url, params, footer){
    var p = params.join(',')
    stopTimer(RAIN)
    stopTimer(PAPELITOS)
    if(p == 'home,inicio'){
      PAGES = []
    }
    PAGES.push({
      url: url,
      params:params,
      footer:footer
    })
    if(params != null){
      url += '/' + params.join('/')
    }
    log('pages', [PAGES])
    LAST_URL = url
     preload(true)
     $('#content').load(url)
     if(footer !== undefined){
       $('#content').css({height: 'calc(100vh - 56px)'})
       $('footer').show()
     }else{
       $('#content').css({height: '100vh'})
       $('footer').hide()
     }

  }

  function goBack(footer){
        $('#content').empty()
        if(footer !== undefined){
           $('#content').css({height: 'calc(100vh - 56px)'})
           $('footer').show()
         }else{
           $('#content').css({height: '100vh'})
           $('footer').hide()
         }
         PAGES.pop()
         if(PAGES.length == 0){
          return
         }
         var prev = PAGES[PAGES.length - 1]
         nextPage(prev.url, prev.params, prev.footer)
    }

   
  function route(url, params, redirect){
    if(params != null){
      $.each(params, function(i, param){
        url = url.replace('::' + i, param)
      })
    }

    if(redirect !== undefined){
      return url
    }

    window.location.href = url
    
  }

  function sendPost(url, params, callback){
     var data = {_token: '{{ csrf_token() }}'}
     if(params.length != 0){
      $.each(params, function(i, param){
        data = Object.assign(data, {[param.name]: param.value})
      })
      //console.log('POST', data)
     }
     $.post(
      url, 
      data, 
      function(data, textStatus, xhr) {
            try{
                window[callback(data)].call
            }catch(e){
              console.log('ERROR CALLBACK SEND POST', e)
            }          
    }).fail(function (data){
        
        
    })
  }

  function getHtml(el){
    var d = $('<div></div>')
    d.append(el)
    return d.html()
  }

  function getOptionLevels(mx){
    var options = []
    for(var i = mx; i > 0; i--){
      options.push({
        text:i,
        value:i
      })
    }
    return options
  }

  
  function closeAndReload(){
    if (window.opener && typeof window.opener.listar === 'function') {
        window.opener.listar();
    }
  }


  function log(label, values, clear){
    if(clear !== undefined){
      console.clear()
    }
    console.log(label.toUpperCase(), ...values)
  }
   

   function getRgb(rgb){
     return 'rgb(' + rgb + ')'
   }

   function getMuColor(id, colores){
      var color = null
      $.each(colores, function(i, c){
        if(c.id == id){
          color = c
        }
      })
      return color
   }


   function colorSelector(parent_box, colores, name, label, value){
      var selector = $('<div class="mu-selector col-12 flex-col-start-center">\
                        <div class="form-group">\
                          <label></label>\
                          <div class="input-group">\
                            <div class="input-group-prepend">\
                              <span class="input-group-text p-1">\
                                <div class="color-mu flex-row-between-center">\
                                  <div class="color-mu-l"></div>\
                                  <div class="color-mu-r"></div>\
                                </div>\
                              </span>\
                            </div>\
                            <input class="mu-value" type="hidden">\
                            <input type="text" class="input-color form-control" readonly>\
                          </div>\
                        <ul class="mu-color-list flex-row-start-start flex-wrap m-0 p-1 bg-white filter-2"></ul>\
                    </div>'),
          color = getMuColor(value, colores)
      selector.find('.mu-value').prop('name', name)
      selector.find('label').prop('for', name).html(label)
      if(value !== undefined){
        if(value != null){
          selector.find('.mu-value').val(value)
          selector.find('.input-color').val(color.name)
          if(color.is_combinado){
              selector.find('.color-mu-l').css({background: getRgb(color.a)})
              selector.find('.color-mu-r').css({background: getRgb(color.b)})
            }else{
              selector.find('.color-mu-l, .color-mu-r').css({background: getRgb(color.rgb)})
            }
        }
      }
      selector.find('.mu-color-list').hide()
      selector.find('.mu-color-list').mouseleave(function(evt){
        evt.preventDefault()
        $(this).slideUp(150)
      })

      selector.find('.color-mu').css({background: value !== undefined ? value : 'lightgray'}).click(function(evt){
        evt.preventDefault()
        $(this).closest('.mu-selector').find('.mu-color-list').slideDown(150)
      })

      selector.find('.input-color').click(function(evt){
        evt.preventDefault()
        $('.mu-color-list').slideUp(150)
        $(this).closest('.mu-selector').find('.mu-color-list').slideDown(150)
      })

      $.each(colores, function(i, c){
        if(c.name != 'piel'){
          var li = $('<li class="li-mu-color flex-row-start-center p-1">\
                       <div class="mu-lr flex-row-between-center">\
                         <div class="mu-left"></div>\
                         <div class="mu-right"></div>\
                       </div>\
                     </li>')
          li.find('.mu-lr').prop('title', c.name)
          if(c.is_combinado){
            li.find('.mu-left').css({background: getRgb(c.a)})
            li.find('.mu-right').css({background: getRgb(c.b)})
          }else{
            li.find('.mu-left, .mu-right').css({background: getRgb(c.rgb)})
          }
          li.data('data', JSON.stringify(c)).click(function(evt){
            evt.preventDefault()
            var color = JSON.parse($(this).data('data')),
                selector = $(this).closest('.mu-selector'),
                ul = selector.find('.mu-color-list')
                
            selector.find('.mu-value').val(color.id)
            selector.find('.input-color').val(color.name)
            if(color.is_combinado){
              selector.find('.color-mu-l').css({background: getRgb(color.a)})
              selector.find('.color-mu-r').css({background: getRgb(color.b)})
            }else{
              selector.find('.color-mu-l, .color-mu-r').css({background: getRgb(color.rgb)})
            }
            ul.slideUp(150)
          })
          selector.find('.mu-color-list').append(li)
        }
      })

      $('#' + parent_box).append(selector)
   }


function setGradient(obj, angle, colores, I){

  var bg = 'linear-gradient('
  bg += angle + 'deg'
  for(var i = 0; i < colores.length; i++){
    var col = colores[i]
    bg += ', rgba(' + col + ', 1) ' + I[i] + '%'
  }

  bg += ')'
  console.log('GRADIENT', bg)
  $(obj).css('background', bg)
}

// function setBgGradient(obj, colors){
//   log('GRADIENTS', [colors])
//   setGradient(obj, 180, [colors[1], colors[0], colors[0], colors[2]], [0, 20, 80, 100])
// }

function getRowColor(col_a, col_b){
  var mu = $('<div class="row-color flex-row-between-center m-auto">\
              <div class="row-color-left"></div>\
              <div class="row-color-right"></div>\
            </div>')
  mu.find('.row-color-left').css({background: getRgb(col_a)})
  mu.find('.row-color-right').css({background: getRgb(col_b !== undefined ? col_b : col_a) })

  return mu
}

function setBg(obj, col){
  if(col != null){
    $(obj).css('background', 'rgb(' + col.r + ', ' + col.g + ', ' + col.b + ')')
  }else{
    $(obj).css('background', 'transparent')
  }
  
}

function bg(obj, rgb){
  if(rgb != null){
    $(obj).css('background', 'rgb(' + rgb + ')')
  }else{
    $(obj).css('background', 'transparent')
  }
  
}

function bgCristal(obj, col){
  $(obj).css('background', 'rgba(' + col.r + ', ' + col.g + ', ' + col.b + ', .5)')
}

function setCristalDuo(obj, cola, colb){

  var rgbaA = [cola.r, cola.g, cola.b, .5],
    rgbaB = [colb.r, colb.g, colb.b, .5]
  $(obj).css('background', 'linear-gradient(0deg, rgba(' + rgbaA.join(', ') + '), rgba(' + rgbaB.join(', ') + '))')
}

function toRGBA(rgb, alpha){
  var chanels = rgb.split(',')
  chanels.push(alpha)
  return chanels.join(',')
}

function setCristalRGB(obj, cola, colb){

  var rgbaA = toRGBA(cola.rgb, .5),
      rgbaB = colb !== undefined ? toRGBA(colb.rgb, .5) : null
  if(rgbaB != null){
    $(obj).css('background', 'linear-gradient(0deg, rgba(' + rgbaA + '), rgba(' + rgbaB + '))')
  }else{
    $(obj).css('background', 'rgba(' + rgbaA + ')')
  }
  
}

function setBackDuo(obj, cola, colb){

  var rgbaA = [cola.r, cola.g, cola.b, 1],
    rgbaB = [colb.r, colb.g, colb.b, 1]
  $(obj).css('background', 'linear-gradient(0deg, rgba(' + rgbaA.join(', ') + '), rgba(' + rgbaB.join(', ') + '))')
}


function parseRGB(rgb){
  var chanels = rgb.split(',')
  return {
    r:chanels[0],
    g:chanels[1],
    b:chanels[2]
  }
}
// function setGradient(obj, angle, colores, I){
//   log('colores', [colores], true)
//   var bg = 'linear-gradient('
//   bg += angle + 'deg'
//   for(var i = 0; i < colores.length; i++){
//     var col = parseRGB(colores[i])
//     //log('color', [colores], true)
//     bg += ', rgba(' + col.r + ', ' + col.g + ', ' + col.b + ', 1) ' + I[i] + '%'
//   }

//   bg += ')'
  
//   $(obj).css('background', bg)
// }

function radialGradient(obj, a, b){
   var bg = 'radial-gradient(circle,'
    a = parseColor(a)
    b = parseColor(b)
  if(a == null || b == null){
    return
  }
  bg += 'rgba(' + b.rgb + ' , 1) 0%, rgba(' + a.rgb + ' , 1) 80%)'

  $(obj).css('background', bg)
}

function textColor(obj, a, b, borde){
  $(obj).css('text-fill-color', getRgb(parseColor(a).rgb));
  $(obj).css('text-stroke-color', getRgb(parseColor(b).rgb));
  $(obj).css('text-stroke-width', borde + 'px');
}

function setText(obj, a, b, borde){
  $(obj).css('text-fill-color', getRgb(a.rgb));

  $(obj).css('text-fill-color', getRgb(a.rgb));
  $(obj).css('text-stroke-color', getRgb(b.rgb));
  $(obj).css('text-stroke-width', borde + 'px');
}

function multiText(els, a, b, border){
  $.each(els, function(i, el){
    setText(el, a, b, border)
  })
}

function parseALT(eq, apply, compare, alternative){
  if(eq['color_' + apply].rgb == eq['color_' + compare].rgb){
    return eq['color_' + alternative]
  }
  return eq['color_' + apply]
}

function colBorde(obj, col){
  if(col != null){
    $(obj).css('border-color', getRgb(parseColor(col).rgb));
  }else{
    $(obj).css('border-color', 'transparent');
  }
}

function borderColor(el, rgb, stroke){
  var stk = stroke !== undefined ? stroke + 'px ' : 'thin '
  el.css({border: 'solid ' + stk + 'rgb(' + rgb + ')'})
}

function getImg(eq, name){
  return 'img/equipos/' + eq.dir + '/' + name + '.png'
}

function setImg(img, eq, name){
  $(img).attr('src', 'img/equipos/' + eq.dir + '/' + name + '.png').error(function(){
    $(this).attr('src', 'img/equipos/' + eq.dir + '/' + name + '.jpg').error(function(){
      $(this).attr('src', 'img/equipos/' + eq.dir + '/' + name + '.gif').error(function(){
        //logs('Error al Cargar Imagen ' + name + ' de ' + eq.name)
        $(this).attr('src', 'img/equipos/' + name + '.png')
      })
    })
  })
}

function setImage(obj, dir, image){
  
  obj.prop('src', dir + '/' + image)
}

function setEquipoUI(el, eq, stroke){
  var a = eq.color_a.rgb,
      b = eq.color_b.rgb,
      c = eq.color_c.rgb,
      stk = stroke !== undefined ? stroke : .2

  setGradient(el, 180, [b, a, a, c], [0, 20, 80, 100])
  if(b == c){
    c = a
  }
  textColorUI(el.find('.name'), b, c, stk)
  textColorUI(el.find('.pts'), b, c, stk)
  colBordeUI(el, b)
}

function textColorUI(obj, a, b, borde){
  $(obj).css('text-fill-color', getRgb(a))
  $(obj).css('text-stroke-color', getRgb(b))
  $(obj).css('text-stroke-width', borde + 'px')

}

function colBordeUI(obj, col){
  if(col != null){
    $(obj).css('border-color', getRgb(col));
  }else{
    $(obj).css('border-color', 'transparent');
  }
}

function setImageEquipo(img, eq, shape){
  var src = eq.directory + shape + '.png'
  img.prop('src', ASSET + src)
}

function setBgGradientEq(obj, eq){
  setGradient(obj, 180, [eq.loc_b, eq.loc_a, eq.loc_a, eq.loc_c], [0, 20, 80, 100])
  
  //radialGradient(div.find('.puntos'), a, b)
}

function setBgGradient(obj, a, b, c){

  setGradient(obj, 180, [b, a, a, c], [0, 20, 80, 100])
  
  //radialGradient(div.find('.puntos'), a, b)
}

function setName(obj, eq, stroke){
  if(eq.loc_b == eq.loc_c){
    textColor(obj, eq.loc_b, eq.loc_a, stroke)
  }else{
    textColor(obj, eq.loc_b, eq.loc_c, stroke)
  }
}



function setCristal(obj, a, b){


  if(b === undefined){
    bgCristal(obj, parseColor(a))
  }else{
    setCristalDuo(obj, parseColor(a), parseColor(b))
  }
}

function parseColor(color){
  var cl = null
  $.each(COLORS, function(i, c){
    if(c.name == color){
      var rgb = c.rgb.split(',')
      cl = c
      cl = Object.assign(cl, {r: rgb[0],g: rgb[1],b: rgb[2] })
    }
  })
  return cl
}


function getBtnFooter(color, src, icon, callback){
  var btn = $('<div></div>')
  btn.css({
    width:'50px',
    height: '50px',
    //borderRadius:'100%',
    cursor:'pointer',
    color: getRgb(parseColor(color).rgb),
    fontSize: '25px'
    //background: getRgb(parseColor(color).rgb)
  }).addClass('flex-row-center-center ml-1 mr-1')
  if(src !== null){
    var img = $('<img>')
    img.prop({height: '30', src: ASSET + src})
    btn.append(img)
  }

  if(icon != null){
    var i = $('<i></i>')
    i.addClass(icon)
    btn.append(i)
  }

  btn.data('click', JSON.stringify(callback)).click(function(evt){
    evt.preventDefault()
    try{
      callback()
    }catch(e){
      log('callback', [e], true)
    }
  })

  return btn

}

function setBar(bar, icon, title, color, text){
  bar.find('.icon').prop('src', ASSET + icon)
  bar.find('.title').html(title)
  if(text !== undefined){
    bar.find('.subtitle').html(text)
  }else{
    bar.find('.subtitle').hide()
  }
  setCristal(bar, color)
  textColor(bar.find('.title, .subtitle'), 'blanco', color, .2)

}


function getColorGrupo(g){
  var data = {
    a:null,
    b:null
  }
}

function rdm(d, h){
  return Math.floor(Math.random() * (h - d + 1)) + d;
    // var f = 0;
    
    // //h++
    // while(f == 0){
    //   var r = Math.floor(Math.random() * h) + d;
    //   if(r >= d && r <= h){
    //     break;
    //   }
    // }
    // return r;
}


function getEl(parent, reference, id){
  var prefix = id !== undefined ? '#' : '.'
  return parent.find(prefix + reference)
}

function setImageCopa(img, copa){
  img.prop('src', ASSET + 'default/' + copa + '.png')
}

function setImageFlag(img, src){
  img.prop('src', ASSET + src)
}


function getNameFase(copa, fase, zona){
  switch(fase){
    case -2: return 'fase preliminar';
    case -1: return '1ª fase';
    case 0:
    switch(copa){
        case 'afa': return '2ª fase';
        default: return 'fase de grupos';
    }
    case 1:
      switch(copa){
        case 'afa': return '3ª fase';
        default: return 'dieciseisavos de final';
    }
    case 2: return 'octavos de final';
    case 3: return 'cuartos de final';
    case 4: return 'semifinales';
    case 5: return 'final';
    default: return 'a definir';
  }
}

function getNameFecha(fase, fecha){
  if(fase < 1){
    return fecha + 'ª fecha';
  }

  return fecha == 1 ? 'partido de ida' : 'partido de vuelta';
}

function getColorCopa(copa){
  switch(copa){
    case 'afa': return 'azuloscuro'
    case 'argentina': return 'celeste'
    case 'sudamericana': return 'azul'
    case 'libertadores': return 'rojo'
    default: return 'verde' 
  }
}

function grupoKey(isdefine){
  return isdefine ? 'llave' : 'grupo'
}

function getTableCell(text, isheader, first){
 // log('cell', [text])
  var cell = $('<div class="table-cell p-1"></div>')
  if(first === undefined){
    cell.css({borderLeft: 'solid thin ' + getRgb(text.b.rgb) })
  }
  
    if(isheader){
      cell.addClass('flex-row-center-center')
      if(text.column == 'estado'){
        var icon = $('<img>')
        icon.css({height: '20px'}).prop('src', ASSET + 'default/logo.png')
        cell.append(icon)
      }else{
        cell.html(text.column)
      }
      
    }else{
      cell.addClass('flex-row-center-center')
      cell.html(text.value)
    }
  

  
  setText(cell, text.a, text.b, .5)
  cell.css({width: '10%'})
  return cell
}

function getTableRow(items, rgb, isheader){
    var row = $('<div class="col-12 flex-row-start-center"></div>')
    $.each(items, function(i, it){
      
      if(i == 0){
        row.append(getTableCell(it, isheader, true))
      }else{
        row.append(getTableCell(it, isheader))
      }
      
    })

    if(isheader){
      row.css({borderBottom: 'solid thin ' + getRgb(rgb)})
    }

    return row
}

function getTableItem(eg, column){
  var it =  {
              a:eg.equipo.color_b,
              b:eg.equipo.color_c,
              value: eg[column],
              column: column
            }

  // if(it.a.name == it.b.name){
  //   it.b = eg.equipo.color_a
  // }

  return it
}

function getTable(eq){
  var table = $('<div class="equipo-table col-12 flex-col-start-center mt-1"></div>'),
      items = []
  table.css({border: 'solid thin ' + getRgb(eq.equipo.color_b.rgb)})
  items.push(getTableItem(eq, 'j'))
  items.push(getTableItem(eq, 'g'))
  items.push(getTableItem(eq, 'e'))
  items.push(getTableItem(eq, 'p'))
  items.push(getTableItem(eq, 'gf'))
  items.push(getTableItem(eq, 'gc'))
  items.push(getTableItem(eq, 'd'))
  items.push(getTableItem(eq, 'pts'))
  items.push(getTableItem(eq, 'pos'))
  items.push(getTableItem(eq, 'estado'))

  table.append(getTableRow(items, eq.equipo.color_b.rgb, true))


  table.append(getTableRow(items, eq.equipo.color_b.rgb, false))

  return table
}

function getDia(d){
  switch(d){
    case 1: return 'martes'
    case 2: return 'miercoles'
    case 3: return 'jueves'
    case 4: return 'viernes'
    case 5: return 'sabado'
    case 6: return 'domingo'
    default: return 'lunes'
  }
}

function equalColor(a, b){
  if(a.id == b.id){
    return true
  }
  return false
}

function similColor(a, b){
  var similares = JSON.parse(a.similares)
  return similares.includes(b.id)
}

function cambiar(loc, vis){
  if(equalColor(loc.camiseta, vis.camiseta)){
    log('cambio', ['equal'])
    return true
  }

  if(similColor(loc.camiseta, vis.camiseta)){
    if(equalColor(loc.camiseta, vis.alternativa)){
      log('cambio', ['equal-alt'])
      return false
    }

    if(similColor(loc.camiseta, vis.alternativa)){
      log('cambio', ['simil-alt'])
      return false
    }

  }
  log('cambio', ['distinta'])

  return true
  
}

function getBuzo(a, b){
  var arqueros = [
      'rojo',
      'azul',
      'verde',
      'amarilo',
      'naranja',
      'celeste',
      'verdeclaro',
      'violeta',
      'blanco',
      'gris',
      'negro',
    ],
  ok = false,
  aq = null

  while(!ok){
    try{
      aq = arqueros[rdm(0, arqueros.length - 1)]
      var c = parseColor(aq)
      if(!equalColor(c, a) && !equalColor(c, b) && !similColor(c, a) && !similColor(c, b)){
        ok = true
      }   
    }catch(e){} 
  }

   return aq + '.png'
}

function setBuzo(img, src){
  img.prop('src', ASSET + 'arqueros/' + src)
}




  
</script>