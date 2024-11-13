<script>
 var PAUSE  = false
	function Juego(el, partido, camvis){
	  this.max = 20
     this.el = el
     this.gl = 0,
     this.gv = 0
     this.timer = null
     this.pause = true
     this.tiempo = 1
     this.alargue = false
     this.penales = false
     this.time = 0
     this.seconds = 0
     this.partido = partido
     this.loc = partido.local
     this.vis = partido.visitante
     this.width = window.innerWidth
     this.gloc = getEl(el, 'gl')
     this.gvis = getEl(el, 'gv')
     this.pl = getEl(el, 'pa')
     this.pv = getEl(el, 'pb')
     this.vel = 1000
     this.balon = getEl(el, 'micro-balon')
     this.duelo = getEl(el, 'duelo', true)
     this.center = parseInt(this.duelo.css('left').split('px')[0])
     this.goal = getEl(el, 'gol', true)
     this.cronometro = getEl(el, 'cronometro')
     this.lbltiempo = getEl(el, 'time')
     this.endTime = false
     this.gol = false
     this.arco = 20
     this.maxRight = 355
     this.minLeft = 15
     this.maxTime = 0
     this.aditionalTime = getEl(el, 'add')
     this.half = getEl(el, 'half-time', true)
     this.golOf = 0
     this.camvis = camvis
     this.cesped = getEl(el, 'cesped', true)
     this.timeDuration = 45
     this.winner = 0
     this.firstTimeList = getEl(el, 'goles-pt')
     this.secondTimeList = getEl(el, 'goles-st')


     
     this.localia = function(isloc){
     	 if(isloc){
     	 	 return loc.liga_id == vis.liga_id ? 1 : 2
     	 }
     	 return 0
     }
     
    this.correr = function(){
    	var c = 0
    	for(var i = 0; i < 4; i++){
    		c+=rdm(0,1)*20
    	}
    	return c
    }

	  this.getPower = function(eq, isloc){
	    var level = eq.nivel + this.localia(isloc),
	        result = 0
	    log('correr', [this.correr()])
	    return rdm(0, level) + this.correr()
	    // for(var i = 0; i < level; i++){
	    // 	var p = rdm(0, level),
	    //       f = rdm(0, this.max)
	      
	    //    if(p > f){
	    //    	result+=p
	    //    }
	      
	    // }
	   	
	   	// return result
	  }

	  this.game = function(){
	  	if(this.endTime){
	  		log('end', [this.endTime])
	  		
	  		return
	  	}
	  	log('balon', [this.balon.offset().left])
	  	//this.gol = false
	    var parent = this,
	        l = this.getPower(loc, true),
	        v = this.getPower(vis, false)
	        
	        changed = false,
	        
	        left = parseInt(this.el.css('left').split('px')[0]) + this.el.width()/2
	        //log('width', [this.el.css('left').split('px')[0], this.el.width()/2])
	      if(l > v){
	      	left+=l
	      	PAUSE = true
	        if(parent.balon.offset().left > parent.maxRight){
	        	
	          
	          this.gl++
	          this.gol = true
	          this.golOf = 1
	          this.goal.animate({left: '-400px'}, 0)
            parent.endAnimation()
	          //this.duelo.animate({left: (parent.width/2 - parent.duelo.width()/2) + 'px'}, parent.vel, parent.endAnimation.bind(this))
	        }else{
	        	
	          this.duelo.animate({left: (left + l) + 'px'}, parent.vel, parent.endAnimation.bind(this))
	        }
	        changed = true
	      }
	      if(l < v){
	      	left-=v
	      	PAUSE = true
	        if(parent.balon.offset().left < parent.minLeft){
	          
	          
	          this.gv++
	          this.gol = true
	          this.golOf = -1
	          this.goal.animate({left: '400px'}, 0)
            parent.endAnimation()
	          //this.duelo.animate({left: (parent.width/2 - parent.duelo.width()/2) + 'px'}, parent.vel, parent.endAnimation.bind(this))
	        }else{
	        	
	          this.duelo.animate({left: (left - v) + 'px'}, parent.vel, parent.endAnimation.bind(this))
	        }
	        changed = true

	      }
	      //log('pelota', [this.balon.offset().left])
	      
	      // if(!changed){
	      //   return
	      // }
	      //this.pause = true
	      // if(gol){
	      //   this.gol = false
	      //   this.gloc.html(this.gl)
	      // 	this.gvis.html(this.gv)
	      // 	PAUSE = true
	      // 	this.duelo.animate({left: parent.center + 'px'}, 2000, parent.endAnimation)
	      // 	this.goal.animate({left:0, opacity:1}, 150)
	      //   setTimeout(function(){
	      //       PAUSE = false
	      //       parent.goal.animate({opacity:0}, 150)
	      //   }, 3000)
	      // }else{
	       
	      // }
	      
	      

  }

  this.endAnimation = function(){
  	var parent = this
  	if(parent.gol){
  		log('gol', [])
  		parent.gol = false
	    parent.gloc.html(this.gl)
	    parent.gvis.html(this.gv)
	    parent.setGol()
	    parent.papelitos()
	    parent.goal.animate({left:0, opacity:1}, 150)
	    if(parent.tiempo == 1){
	    	parent.firstTimeList.append(parent.getLiGol())
	    }else{
	    	parent.secondTimeList.append(parent.getLiGol())
	    }
      setTimeout(function(){
        parent.duelo.animate({left: parent.center + 'px'}, 2000)
      }, 2000)
	    setTimeout(function(){
	            PAUSE = false
              parent.golOf = 0
	            parent.goal.animate({opacity:0}, 150)
	     }, 3000)
  	}else{
  		PAUSE = false
  	}
  	//log('end', [PAUSE])
  	
  }

  this.setGol = function(){
  	var box = getEl(this.goal, 'inner'),
  	    esc = getEl(this.goal, 'gol-esc'),
  			lbl = getEl(this.goal, 'gol-lbl'),
  			jug = getEl(this.goal, 'gol-jug')
  	if(this.golOf == 1){
  		lbl.html('gol de ' + loc.name)
      setCristalBorder(box, this.loc.color_a, this.loc.color_b, 2)
  		setText(lbl, this.loc.color_b, this.loc.color_a, .1)
  		setImageEquipo(esc, this.loc, 'escudo')
  		setImageEquipo(jug, this.loc, 'local')
  	}

  	if(this.golOf == -1){
  		lbl.html('gol de ' + vis.name)
  		setCristalBorder(box, this.vis.color_a, this.vis.color_b, 2)
  		setText(lbl, this.vis.color_b, this.vis.color_a, .1)
  		setImageEquipo(esc, this.vis, 'escudo')
  		setImageEquipo(jug, this.vis, this.camvis)
  	}
  	
  }

  this.setTiempo = function(){
    var supl = this.alargue ? ' s' : ''
    this.lbltiempo.html(this.tiempo + '° tiempo' + supl)
  }

  this.halfTime = function(){
    var parent = this,
    j = getEl(parent.el, 'jug-campo')
    j.fadeOut(150, function(){
    	parent.half.fadeTo(150, 1)
    })
    parent.duelo.animate({left: parent.center + 'px'}, 2000)
    setTimeout(function(){
    	parent.half.fadeTo(150, 0, function(){
    		j.fadeIn(150)
    	})
      
      parent.endTime = false
      parent.tiempo = 2
      parent.jugar()
    }, 2000)
  }

  this.papelito = function(){
    var p = $('<div class="papelito"></papelito>'),
        eq = this.golOf == 1 ? this.loc : this.vis,
        l = rdm(0, this.cesped.width()),
        t = rdm(0, this.cesped.height()),
        r = rdm(0, 10),
        col = r < 5 ? eq.color_a : (r >= 5 && r < 8 ? eq.color_b : eq.color_c)
    p.css({
      position:'absolute',
      top:t + 'px',
      left:l + 'px',
      zIndex:10000000,
      width:'2px',
      height:'2px',
      background:getRgb(col.rgb)
    })

    return p
  }


  this.papelitos = function(){
    for(var i = 0; i < 100; i++){
      this.cesped.append(this.papelito())
    }
  }

 


  this.golDe = function(){
  	var g = rdm(0, 100)
  	if(g < 50){
  		return 'jugada'
  	}
  	if(g >= 50 && g < 60){
  		return 'cabeza'
  	}
  	if(g >= 60 && g < 70){
  		return 'volea'
  	}
  	if(g >= 70 && g < 75){
  		return 'palomita'
  	}
  	if(g >= 75 && g < 80){
  		return 'olimpico'
  	}
  	if(g >= 80 && g < 85){
  		return 'media cancha'
  	}
  	if(g >= 85 && g < 90){
  		return 'media cancha'
  	}
  	if(g >= 90 && g < 95){
  		return 'arco a arco'
  	}
  	
  	return 'chilena'
  	
  }

  this.getJugadorN = function(){
  	var j = rdm(0, 10)
  	switch(j){
  	case 0: return 9
  	case 1: return 9
  	case 2: return 9
  	case 3: return 9
  	case 4: return this.getPunta() 
  	case 5: return this.getPunta()
  	case 6: return this.getPunta()
  	case 7: return this.getMedio()
  	case 8: return this.getMedio()
  	case 9: return this.getDefensor()
  	default: 1
  	}
  }

  this.getPunta = function(){
  	return rdm(0, 1) == 1 ? 7 : 11
  }

  this.getMedio = function(){
  	var m = rdm(0, 2)
  	switch(m){
  	case 0: return 5
  	case 1: return 8
  	default: return 10
  	}
  }

  this.getDefensor = function(){
  	var m = rdm(0, 3)
  	switch(m){
	  	case 0: return 2
	  	case 1: return 6
	  	case 2: return 3
	  	default: return 4
  	}
  }

  this.getLiGol = function(){
  	var li = $('<li class="li-gol col-12 flex-row-start-center p-1 mb-1">\
  							<img class="gol-escudo" height="10">\
  							<b class="detalle"></b>\
  					 </li>'),
  	    eq = this.golOf > 0 ? this.loc : this.vis,
 				esc = getEl(li, 'gol-escudo'),
 				lbl = getEl(li, 'detalle')

  	setImageEquipo(esc, eq, 'escudo')
  	lbl.html(this.time + "'" + ' - Nº ' + this.getJugadorN() + ' de ' + this.golDe())

  	setEquipoUI(li, eq)
  	setText(lbl, eq.color_b, eq.color_a, .1)

  	return li
  }

  this.finPartido = function(){
    var l = getEl(this.el, 'local', true),
        v = getEl(this.el, 'visitante', true),
        winner = getEl(this.el, 'winner', true),
        eloc = getEl(winner, 'w-left'),
        evis = getEl(winner, 'w-right'),
        lbl = getEl(winner, 'w-name')
    switch(this.winner){
      case 1: 
        setImageEquipo(l, this.loc, 'local')
        setImageEquipo(v, this.loc, 'local')
        setCristalBorder(winner, this.loc.color_a, this.loc.color_b, 2)
        setImageEquipo(eloc, this.loc, 'escudo')
        setImageEquipo(evis, this.loc, 'escudo')
        lbl.html('gano ' + this.loc.name)
        setText(lbl, this.loc.color_b, this.loc.color_a, .1)
      break
      case -1:
        setImageEquipo(l, this.vis, this.camvis)
        setImageEquipo(v, this.vis, this.camvis)
        setCristalBorder(winner, this.vis.color_a, this.vis.color_b, 2)
        setImageEquipo(eloc, this.vis, 'escudo')
        setImageEquipo(evis, this.vis, 'escudo')
        lbl.html('gano ' + this.vis.name)
        setText(lbl, this.vis.color_b, this.vis.color_a, .1)
      break
      default:
        l.hide()
        v.hide()
        setCristalBorder(winner, this.loc.color_a, this.loc.color_b, 2)
        setImageEquipo(eloc, this.loc, 'escudo')
        setImageEquipo(evis, this.vis, 'escudo')
        lbl.html('empate')
        setText(lbl, this.loc.color_b, this.loc.color_a, .1)
      break
    }

     winner.fadeTo(150, 1)
  }

  this.jugar = function(){
  	log('center', [this.center])
    var parent = this,
        add = rdm(0, 10)
    PAUSE = false
    parent.time = 0
    parent.aditionalTime.html(add)
    parent.aditionalTime.hide()
    parent.maxTime = 45 + add
    parent.setTiempo()
    if(parent.timer != null){
    	clearInterval(parent.timer)
    }
    parent.timer = setInterval(function(){
    	//log('pause', [PAUSE])
      if(!PAUSE){
      
	      parent.game()
	    }
	      parent.seconds++
	      if(parent.seconds == 5){
	        parent.seconds = 0
	        parent.time++
	        parent.cronometro.html(parent.time)
	        if(parent.time > parent.timeDuration){
            parent.aditionalTime.show()
          }
	        if(parent.time > parent.maxTime){
	        	//log('fin', [parent.time])
	        	parent.endTime = true
	        	parent.duelo.stop(true, false)
	          clearInterval(parent.timer)
            if(parent.tiempo == 1){
              
              parent.halfTime()
            }else{
              if(parent.partido.is_define && parent.partido.is_vuelta){

              }else{
                if(parent.gl > parent.gv){
                  parent.winner = 1
                }

                if(parent.gl < parent.gv){
                  parent.winner = -1
                }
                parent.finPartido()
              }
            }
	        }
	      }
	    
    }, 100)
  }
}

  // function reset(){
  //   var levelloc = parseInt($('#level-loc').val()),
  //       levelvis = parseInt($('#level-vis').val())
  //   gl = 0
  //   gv = 0
  //   loc.data('w', 50).data('level', levelloc)
  //   vis.data('w', 50).data('level', levelvis)
  //   loc.css({width: 50 + '%'})
  //   vis.css({width: 50 + '%'})
  // }

</script>