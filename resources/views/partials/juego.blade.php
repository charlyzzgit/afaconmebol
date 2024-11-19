<script>
 var PAUSE  = false
	function Juego(el, partido, camvis, aloc, avis){
	  this.max = 20
     this.el = el
     this.gl = 0
     this.gv = 0
     this.ploc = null
     this.pvis = null
     
     this.pause = true
     this.tiempo = 1
     this.alargue = false
     this.penales = false
     this.time = 0
     this.seconds = 0
     this.partido = partido
     this.loc = partido.local
     this.vis = partido.visitante
     this.aloc = aloc
     this.avis = avis
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
     this.goleadores = []
     this.exit = getEl(el, 'exit', true)
     this.detalles = []
     this.define = partido.is_vuelta && partido.is_define
     this.global_loc = this.define ? MAIN.ida.gv : 0
     this.global_vis = this.define ? MAIN.ida.gl : 0
     this.clasifica = getEl(el, 'clasifica', true)
     this.penalesLoc = 0
     this.penalesVis = 0
     this.jugadaloc = getEl(el, 'jugada-local', true)
     this.jugadavis = getEl(el, 'jugada-visitante', true)

     this.sndgol ='snd-gol'
     this.sndpelota ='snd-pelota'
     this.sndpito ='snd-pito'
     this.sndpalo ='snd-palo'
     this.snduuu ='snd-uuu'
     this.sndpitofinal ='snd-pito-final'
     this.mute = false


     this.mutear = function(){
        this.mute = true
     }

     this.sonar = function(audio_id, volume, loop){
      
        var audio = $('#' + audio_id)
        if(this.mute){
          audio.prop('volume', 0)
        }else{
          audio.prop('volume', volume/10)
        }
        
        if(loop !== undefined){
          audio.prop('loop', true)
        }
        audio[0].play()
      }
     
     this.localia = function(isloc){
     	 if(isloc){
     	 	 return loc.liga_id == vis.liga_id ? 1 : 2
     	 }
     	 return 0
     }
     
    this.correr = function(){
    	var c = 0
    	for(var i = 0; i < 10; i++){
    		c+=rdm(0,1)*10 //rdm(10, 20)
    	}
    	return c
    }

	  this.getPower = function(eq, isloc){
	    var level = eq.nivel + this.localia(isloc),
	        result = 0
	   // log('correr', [this.correr()])
	    return rdm(0, level) + this.correr()
	    
	  }

	  this.game = function(){
	  	if(this.endTime){
	  		//log('end', [this.endTime])
	  		
	  		return
	  	}

      var parent = this,
          l = this.getPower(loc, true),
          v = rdm(0, 1) != 0 ? this.getPower(vis, false) : 0,
          left = parseInt(this.el.css('left').split('px')[0]) + this.el.width()/2,
          increment = 0

      if(l > v){
          left+=l
          increment = left + l
      }else{
        left-=v
        increment = left - v
      }
      this.sonar(this.sndpelota, 8)
      this.duelo.animate({left: increment + 'px'}, parent.vel, parent.endAnimation.bind(this))

  }

  this.isGol = function(){
    var r = rdm(0, 10)
    return r > 5 ? true : false
  }

  this.endAnimation = function(){
  	var parent = this
    if(parent.balon.offset().left > parent.maxRight){
    	if(parent.isGol()){
	      this.gl++
	      if(this.define){
	        this.global_loc++
	      }
	      this.gol = true
	      this.golOf = 1
	      this.goal.animate({left: '-400px'}, 0)
	      PAUSE = true
	      this.setJugada(true, true)
	    }else{
	    	this.setJugada(true)
	    }
    }
    if(parent.balon.offset().left < parent.minLeft){
    	if(parent.isGol()){
	      this.gv++
	      if(this.define){
	        this.global_vis++
	      }
	      this.gol = true
	      this.golOf = -1
	      this.goal.animate({left: '400px'}, 0)
	      PAUSE = true
	      this.setJugada(false, true)
	    }else{
	    	this.setJugada(false)
	    }
    }
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
        parent.firstTimeList.animate({scrollTop: 2000}, 150)
	    }else{
	    	parent.secondTimeList.append(parent.getLiGol())
        parent.secondTimeList.animate({scrollTop: 2000}, 150)
	    }
      if(this.define){
        this.clasificaNext()
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

  this.setJugada = function(isLocal, isGol){
  	var j = isLocal ? this.jugadaloc : this.jugadavis,
  			r = rdm(1, 10),
  			lbl = ''
  	getEl(j, 'jugada-gol').hide()
  	if(isGol !== undefined){
  		getEl(j, 'jugada-gol').show()
  		getEl(j, 'lbl').html('gol')
      this.sonar(this.sndgol, 8)
  	}else{
  		if(r <= 5){
  			lbl = 'arquero'
        this.sonar(this.snduuu, 8)
  		}else if(r > 5 && r <= 7){
  			lbl = 'palo'
        this.sonar(this.sndpalo, 8)
  		}else if(r > 7 && r <= 9){
  			lbl = 'travesaño'
        this.sonar(this.sndpalo, 8)
  		}else{
  			lbl = 'en la linea'
        this.sonar(this.snduuu, 8)
  		}

  		getEl(j, 'lbl').html(lbl)
  	}
  	j.fadeIn(150)
  	setTimeout(function(){
  		j.fadeOut(150)
  	}, 1000)
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

  this.halfTime = function(alargue){
    var parent = this,
    		j = getEl(parent.el, 'jug-campo')
    this.sonar(parent.sndpito, 8)
    if(alargue !== undefined){
    	parent.half.find('b').html('alargue')
    }else{
    	if(parent.alargue){
    		parent.half.find('b').html('entretiempo alargue')
    	}
    	
    }
    j.fadeOut(150, function(){
    	parent.half.fadeTo(150, 1)
    })
    parent.duelo.animate({left: parent.center + 'px'}, 2000)
    setTimeout(function(){
    	parent.half.fadeTo(150, 0, function(){
    		j.fadeIn(150)
    	})
      
      parent.endTime = false
      parent.tiempo = alargue !== undefined ? 1 : 2
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

  this.getGotaPapel = function(){
    const $raindrop = $('<div class="papelito"></papelito>'),
          r = rdm(0, 10),
          eq = this.winner == 1 ? this.loc : this.vis,
          col = r < 5 ? eq.color_a : (r >= 5 && r < 8 ? eq.color_b : eq.color_c)
  
    // Posición horizontal aleatoria
    $raindrop.css({
      position:'absolute',
      top:'-10vh',
      left: rdm(0,100) + 'vw',
      zIndex:10000000,
      width:'2px',
      height:'2px',
      background:getRgb(col.rgb)
      //animation: 'fall linear'
    })
    
    // // Duración y velocidad aleatoria para la caída
    // const duration = Math.random() * 3 + 2;
    // //$raindrop.css('animation-duration', `${duration}s`);
    // $raindrop.animate({top: rdm(60, 100) + 'vh'}, duration)

    return $raindrop
  }

 this.lloverPapelitos = function(I){
    for(var i = 0; i < I; i++){
      var papelito = this.getGotaPapel()
      
      // Añadir el div al body
      this.el.append(papelito);

       
      //const duration = Math.random() * 3 + 2;
     
      papelito.animate({top: rdm(0, 100) + 'vh'}, rdm(1000,3000))
        log('pap', papelito)
        // // Remover el div cuando termine la animación
        // papelito.on('animationend', function() {
        //   $(this).remove();
        // });
    }
  }

  this.rainPapelitos = function(I){
    var parent = this
    PAPELITOS = setInterval(function(){
        parent.lloverPapelitos(I)}, 1);
  }

 


  this.golDe = function(){
  	var g = rdm(0, 100)
  	if(g < 50){
  		return 'de jugada'
  	}
  	if(g >= 50 && g < 70){
  		return 'de cabeza'
  	}
  	if(g >= 70 && g < 75){
  		return 'de volea'
  	}
  	if(g >= 75 && g < 80){
  		return 'de palomita'
  	}
  	if(g >= 80 && g < 85){
  		return 'olimpico'
  	}
  	if(g >= 85 && g < 90){
  		return 'de media cancha'
  	}
  	if(g >= 90 && g < 95){
  		return 'de arco a arco'
  	}
  	
  	return 'de chilena'
  	
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
  	default: return 1
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

  this.addGoleador = function(j, eq_id){
    var parent = this,
        e = false
    $.each(parent.goleadores, function(i, g){
      
      if(g.jugador == j && g.equipo_id == eq_id){
        parent.goleadores[i].goles++
        e = true
      }
    })

    if(!e){
      this.goleadores.push({
                            jugador: j,
                            equipo_id: eq_id,
                            goles: 1
                          })
    }
  }

  this.getLiGol = function(){
  	var li = $('<li class="li-gol col-12 flex-row-start-center p-1 mb-1">\
  							<img class="gol-escudo" height="10">\
  							<b class="detalle"></b>\
  					 </li>'),
  	    eq = this.golOf > 0 ? this.loc : this.vis,
 				esc = getEl(li, 'gol-escudo'),
 				lbl = getEl(li, 'detalle'),
        jug = this.getJugadorN(),
        detalle = this.time + "'" + ' - Nº ' + jug + ' - ' + this.golDe()
    this.detalles.push(detalle)
  	setImageEquipo(esc, eq, 'escudo')
  	lbl.html(detalle)
    this.addGoleador(jug, eq.id)
  	setEquipoUI(li, eq)
  	setText(lbl, eq.color_b, bcColor(eq), .1)

  	return li
  }

  this.nextLevel = function(eq){
    if(!this.define){
      return 'gano ' + eq
    }
    var copa = this.partido.copa
    switch(this.partido.fase){
      case -2: return eq + ' clasifico a 1° fase'
      case -1: return eq + ' clasifico a 2° fase'
      case 0: return eq + ' clasifico a ' + (copa != 'afa' ? 'diesieisavos de final' : '2° fase')
      case 1: return eq + ' clasifico a octavos de final'
      case 2: return eq + ' clasifico a cuartos de final'
      case 3: return eq + ' clasifico a semifinales'
      case 4: return eq + ' clasifico a la final'
      default: return eq + ' campeon'
    }
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
        lbl.html(this.nextLevel(this.loc.name))
        setText(lbl, this.loc.color_b, this.loc.color_a, .1)
        
      break
      case -1:
        setImageEquipo(l, this.vis, this.camvis)
        setImageEquipo(v, this.vis, this.camvis)
        setCristalBorder(winner, this.vis.color_a, this.vis.color_b, 2)
        setImageEquipo(eloc, this.vis, 'escudo')
        setImageEquipo(evis, this.vis, 'escudo')
        lbl.html(this.nextLevel(this.vis.name))
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

     this.exit.fadeIn(150)
     if(this.define && this.partido.is_final){
        this.setFestejo()// llevar loc y vis a 10 left y right
     }else{
      if(this.winner != 0){
       this.rainPapelitos(this.winner == 1 ? 10 : 5)
      }
     }
     this.sonar(this.sndpitofinal, 8)
  }

  this.clasificaNext = function(){
  	if(this.global_loc > this.global_vis){
  		setCristalBorder(this.clasifica, this.loc.color_a, this.loc.color_b, 1)
      setImageEquipo(this.clasifica.find('img'), this.loc, 'escudo')
  	}else if(this.global_loc < this.global_vis){
  		setCristalBorder(this.clasifica, this.vis.color_a, this.vis.color_b, 1)
      setImageEquipo(this.clasifica.find('img'), this.vis, 'escudo')
  	}else{
  		setCristalBorder(this.clasifica, parseColor('gris'), parseColor('gris'), 1)
  		this.clasifica.find('img').prop('src', ASSET + 'default/juez.png')
  	}
    getEl(fondo, 'gbl-loc').html('[' + this.global_loc + ']')
    getEl(fondo, 'gbl-vis').html('[' + this.global_vis + ']')
  }

  this.definicionPenales = function(){
  	this.clasifica.fadeOut(150)
  	var parent = this, 
  			pnls = getEl(this.el, 'penales', true),
  			
  			A = getEl(pnls, 'arquero', true),
  			B = getEl(pnls, 'pelota', true),
  			J = getEl(pnls, 'shooter', true)

    parent.ploc = 0
    parent.pvis = 0

  	pnls.animate({top: '350px'}, 150)
  	getEl(this.el, 'reloj').hide()
		setCristalBorder(getEl(this.el, 'juez'), this.loc.color_a, this.loc.color_b, 1)
  	getEl(this.el, 'juez').fadeIn(150)

  	this.pl.fadeIn(150)
  	this.pv.fadeIn(150)

  	this.swapPenal(true)

  	// J.click(function(){
  		
  	// 	B.animate({left: '50%', transform: 'translateX(-50%)', top: '250px'}, 0)
  	// 	A.animate({left: '50%', transform: 'translateX(-50%)'}, 0)
  	// 	setTimeout(function(){
  	// 		parent.patear()
  	// 		parent.atajar()
  	// 	}, 1000)
  	// })

  	// B.draggable({ 
  	// 	drag: function(event, ui) { 
  	// 		var T = getEl(parent.el, 'travesanio', true),
  	// 		    PL = getEl(parent.el, 'palo-left', true),
  	// 		    PR = getEl(parent.el, 'palo-right', true)
  		
  	// 	//console.log(ui.position.left + B.width()/2, ui.position.top + B.height()/2); 
  	// 	log('pelota', [parent.getPosition(B, 'left'), parent.getPosition(B, 'top')], true); 

  	//  } 
  	// });

  	// A.draggable({ 
  	// 	drag: function(event, ui) { 
  	// 		//console.clear()
  	// 	console.log(parent.getPosition(B, 'left'), parent.getPosition(B, 'top')); 
  	//  } 
  	// });

  	//travesaño  15 y 38
  	//arco top > 28 < 38
  	//arco left > 62   < 334
  	//palo l 38 y 62
  	//palo r 334 y 358

  	//min left 26
  	//max left 370
  	// min top 10
  	//max top 90
  }

  this.swapPenal = function(isLocal){
  	var parent = this,
  	    pnls = getEl(this.el, 'penales', true),
  	    A = getEl(pnls, 'arquero', true),
  			B = getEl(pnls, 'pelota', true),
  			J = getEl(pnls, 'shooter', true)

  		
  	if(isLocal){
  		getEl(A, 'buzo').prop('src', this.avis.prop('src'))
  		setImageEquipo(getEl(A, 'jug'), this.vis, this.camvis)
  		setImageEquipo(J, this.loc, 'local')
  	}else{
  		getEl(A, 'buzo').prop('src', this.aloc.prop('src'))
  		setImageEquipo(getEl(A, 'jug'), this.loc, 'local')
  		setImageEquipo(J, this.vis, this.camvis)
  	}
  	
  	B.animate({left: '50%', transform: 'translateX(-50%)', top: '250px'}, 0)
  	A.animate({left: '50%', transform: 'translateX(-50%)'}, 0)
  	setTimeout(function(){
  		parent.patear(isLocal)
  	  parent.atajar()
  	}, 2000)
  	
  }

  this.getPosition = function(el, prop){
  	return el.css(prop).split('px')[0]
  }
  this.intersect = function($elem1, $elem2) {

    // Obtener las posiciones y dimensiones del primer elemento
		    var pos1 = $elem1.offset();
		    var ancho1 = $elem1.outerWidth();
		    var alto1 = $elem1.outerHeight();
		    
		    // Obtener las posiciones y dimensiones del segundo elemento
		    var pos2 = $elem2.offset();
		    var ancho2 = $elem2.outerWidth();
		    var alto2 = $elem2.outerHeight();
		    
		    // Verificar si se intersectan
		    return !(
		        pos1.top + alto1 < pos2.top || // El primer elemento está por encima
		        pos1.top > pos2.top + alto2 || // El primer elemento está por debajo
		        pos1.left + ancho1 < pos2.left || // El primer elemento está a la izquierda
		        pos1.left > pos2.left + ancho2 // El primer elemento está a la derecha
		    );
  }

  this.patear = function(isLocal){
  	var parent = this,
  			balon = getEl(this.el, 'pelota', true),
  			arquero = getEl(this.el, 'arquero', true),
  			T = getEl(parent.el, 'travesanio', true),
  			PL = getEl(parent.el, 'palo-left', true),
  			PR = getEl(parent.el, 'palo-right', true),
  			min_left = 50,
  			max_left = 342 - balon.width(),
  			min_top = 10,
  			max_top = 98 - balon.height(),
  			atroden = rdm(0, 10) > 3 ? true : false,
  			left = atroden ? rdm(min_left, max_left) : rdm(26, 370),
  			top = atroden ? rdm(min_top, max_top) : rdm(10, 80),
  			pres = getEl(parent.el, 'penal-result', true)
  			
    this.sonar(this.sndpelota, 8)
  	balon.animate({left:(left + balon.width()/2) + 'px', top: (top - balon.height()/2) + 'px'}, 250, function(){
  		var result = 'afuera'

  		if(parent.intersect(balon, T)){
  			result = 'travesaño'
  			parent.rebote()
  		}else if(parent.intersect(balon, PL) || parent.intersect(balon, PR)){
  			result = 'palo'
  			parent.rebote()
  		}else if(parent.intersect(balon, arquero)){
  			result = 'atajado'
  			parent.rebote()
  		}else{
  			var l = parent.getPosition(balon, 'left'),
  			    t = parent.getPosition(balon, 'top'),
  			    left = 50,
  			    mleft = 342 - balon.width(),
  			    top = 10
  			    mtop = 98 - balon.height()
  				// l: 50 342- w
  				// t: 28 98- h
  			    if(l > left && l < mleft && t > top && t < mtop){
  			    	result = 'gol'
  			    }
  		}

  		//log('penal', [result, t], true)
  		//travesaño  15 y 38
	  	//arco top > 28 < 38
	  	//arco left > 62   < 334
	  	//palo l 38 y 62
	  	//palo r 334 y 358

	  	

	  	
	  	if(isLocal){
	  		parent.penalesLoc++
	  	}else{
	  		parent.penalesVis++
	  	}
	  	parent.setPenalResult(result, isLocal)

	  	if(!parent.finPenales()){
	  		setTimeout(function(){
	  			pres.fadeOut(150, function(){
	  				parent.swapPenal(!isLocal)
	  			})
	  			
	  		}, 2000)

	  		if(parent.penalesLoc > 5 && parent.penalesLoc == parent.penalesVis){
	  			setTimeout(function(){
	  					$('.pen-x').removeAttr('src')
	  			}, 1000)
	  		}
	  		
	  	}else{
	  		setTimeout(function(){
	  			var w = parent.ploc > parent.pvis ? true : false,
	  				  lbl = w ? parent.loc.name : parent.vis.name

	  			parent.setPenalResult('gano ' + lbl, w, true)
	  			parent.scorer('winner', w)
	  			setTimeout(function(){
	  				getEl(parent.el, 'penales', true).animate({top: '800px'}, 150)
	  				parent.winner = w ? 1 : -1
	  				parent.finPartido()
	  			})
	  		}, 2000)
	  	}
  	})

  }

  this.rebote = function(){
  	var B = getEl(this.el, 'pelota', true)

  	B.animate({top: '250px'}, 150)
  }

  this.setPenalResult = function(result, isLocal, finpenales){
  	var R = getEl(this.el, 'penal-result', true),
  			box = getEl(R, 'content'),
  			e = getEl(R, 'pen-escudo'),
  			lbl = getEl(R, 'result')
  	if(isLocal){
  		R.animate({left:'-100%'}, 0, function(){
  			R.fadeIn(0)
  		})
  		setText(lbl, this.loc.color_b, bcColor(this.loc), .1)
  		setImageEquipo(e, this.loc, 'escudo')
  		setCristalBorder(box, this.loc.color_a, this.loc.color_b, 1)
  		if(result == 'gol'){
  			this.ploc++
  		}
  	}else{
  		R.animate({left:'100%'}, 0, function(){
  			R.fadeIn(0)
  		})
  		setText(lbl, this.vis.color_b, bcColor(this.vis), .1)
  		setImageEquipo(e, this.vis, 'escudo')
  		setCristalBorder(box, this.vis.color_a, this.vis.color_b, 1)
  		if(result == 'gol'){
  			this.pvis++
  		}
  	}
  	if(finpenales === undefined){
  		this.scorer(result, isLocal)
  	}
  	
  	//log('result', [result, this.ploc, this.pvis], true)
  	if(result == 'gol'){
  		this.pl.html('(' + this.ploc + ')')
  		this.pv.html('(' + this.pvis + ')')
  	}
  	lbl.html(result)
  	R.animate({left: 0}, 150)

  }

  this.scorer = function(result, isLocal){
  	var row = getEl(this.el, isLocal ? 'row-loc' : 'row-vis'),
  			c = isLocal ? (this.penalesLoc <= 5 ? '.pen-' + this.penalesLoc : '.pen-x') : (this.penalesVis <= 5 ? '.pen-' + this.penalesVis : '.pen-x'),
  			cell = row.find(c),
  			img = null

  	if(result == 'winner'){
  		setImageCopa(row.find('.p-winner'), this.partido.copa)
  		return
  	}

  	switch(result){
	  	case 'gol': 
	  		img = 'logo.png'
        this.sonar(this.sndgol, 8)
	  	break
	  	case 'atajado': 
	  		img = 'atajado.png'
        this.sonar(this.snduuu, 8)
	  	break
	  	case 'travesaño': 
	  		img = 'travesanio.png'
        this.sonar(this.sndpalo, 8)
	  	break
	  	case 'palo': 
	  		img = 'palo.png'
        this.sonar(this.sndpalo, 8)
	  	break
	  	case 'afuera': 
	  		img = 'eli.png'
        this.sonar(this.snduuu, 8)
	  	break

  	}
  	log('penal', [cell])
  	cell.prop('src', ASSET + 'default/' + img)
  }

  this.atajar = function(){
  	var left = rdm(36, 294),
  			arquero = getEl(this.el, 'arquero', true)

  	arquero.animate({left:(left + arquero.width()/2) + 'px'}, 250)


  }


  this.finPenales = function(){
  	if(this.penalesLoc < 5 && this.penalesVis < 5){
	  	if(this.ploc < this.pvis){
	  		var d = 5 - this.penalesLoc
	  		if(this.ploc + d < this.pvis){
	  			return true
	  		}
	  	}
	  	if(this.pvis < this.ploc){
	  		var d = 5 - this.penalesVis
	  		if(this.pvis + d < this.ploc){
	  			return true
	  		}
	  	}
	  }else{
	  	if(this.penalesLoc == this.penalesVis && this.pvis != this.ploc){
	  		return true
	  	}
	  }
  	return false
  }

  

  this.setFestejo = function(){
    var local = getEl(this.el, 'local', true),
        visitante = getEl(this.el, 'visitante', true),
        capitan = getEl(this.el, 'capitan', true),
        flagLeft = getEl(this.el, 'flag-festejo-left', true),
        flagRight = getEl(this.el, 'flag-festejo-right', true),
        trofeo = getEl(this.el, 'trofeo', true)
        box = getEl(this.el, 'box-trofeo', true)
    local.animate({left:'10px'}, 150)
    visitante.animate({right:'10px'}, 150),
    ligaSide = rdm(0, 1)

    if(this.winner == 1){
      setImageEquipo(capitan, this.loc, 'local')
      if(ligaSide == 0){
        setImageFlag(flagLeft, this.loc.liga.bandera)
        setImageEquipo(flagRight, this.loc, 'bandera')
      }else{
        setImageFlag(flagRight, this.loc.liga.bandera)
        setImageEquipo(flagLeft, this.loc, 'bandera')
      }
    }

    if(this.winner == -1){
      setImageEquipo(capitan, this.vis, this.camvis)
      if(ligaSide == 0){
        setImageFlag(flagLeft, this.vis.liga.bandera)
        setImageEquipo(flagRight, this.vis, 'bandera')
      }else{
        setImageFlag(flagRight, this.vis.liga.bandera)
        setImageEquipo(flagLeft, this.vis, 'bandera')
      }
    }

    if(this.partido.is_final && this.partido.is_final){

    	setImageCopa(trofeo, this.partido.copa)

    	capitan.fadeIn(150)
      flagLeft.fadeIn(150)
      flagRight.fadeIn(150)
      this.showArquero()
    	box.fadeIn(150)
    	this.clasifica.fadeOut(150)
    	this.rainPapelitos(20)
    }
  }

  this.showArquero = function(){
  	var n = rdm(1, 100),
  			aq
  	if(n > 40){
  		if(n < 60){
  			aq = getEl(this.el, 'buzo-left', true)
  		}else if(n >= 60 && n < 80){
  			aq = getEl(this.el, 'buzo-center', true)
  		}else{
  			aq = getEl(this.el, 'buzo-right', true)
  		}

  		aq.prop('src', this.winner == 1 ? this.aloc.prop('src') : this.avis.prop('src'))
  		aq.fadeIn(150)
  	}
  }

  this.getResult = function(){
    return {
      id:this.partido.id,
      anio: this.partido.anio, 
      copa: this.partido.copa, 
      fase: this.partido.fase, 
      fecha: this.partido.fecha, 
      zona: this.partido.zona,
      gl:this.gl,
      gv: this.gv,
      pa: this.ploc,
      pb: this.pvis,
      winner_id: this.winner == 1 ? this.loc.id : (this.winner == -1 ? this.vis.id : null),
      goleadores: this.goleadores,
      detalle: this.detalles
    }
  }

  this.jugar = function(){
    // var parent = this
    // this.winner = 1
    // setInterval(function(){
    //   parent.lloverPapelitos(20)
    // }, 10)
    
    // return
    this.sonar(this.sndpito, 8)
  	log('center', [this.center])
    var parent = this,
        add = parent.alargue ? rdm(0, 2) : rdm(0, 10),
        T = parent.alargue ? 15 : 45
    PAUSE = false
    parent.time = 0
    parent.aditionalTime.html(add)
    parent.aditionalTime.hide()
    parent.maxTime = T + add
    parent.setTiempo()
    if(TIMER_PARTIDO != null){
    	clearInterval(TIMER_PARTIDO)
    }
    TIMER_PARTIDO = setInterval(function(){
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
	          clearInterval(TIMER_PARTIDO)
            if(parent.tiempo == 1){
              
              parent.halfTime()
            }else{
              if(parent.partido.is_define && parent.partido.is_vuelta){
                if(parent.global_loc > parent.global_vis){
                  parent.winner = 1
                  parent.finPartido()
                }else if(parent.global_loc < parent.global_vis){
                  parent.winner = -1
                  parent.finPartido()
                }else{
                	if(parent.alargue){
                		parent.half.find('b').html('penales')
                		parent.half.fadeTo(150, 1)
                		setTimeout(function(){
                			parent.definicionPenales()
                		}, 2000)
                		
                	}else{
                		if(parent.partido.is_final){
	                		parent.alargue = true

	                		parent.halfTime(true)
	                	}else{
											parent.half.find('b').html('penales')
	                		parent.half.fadeTo(150, 1)
	                		setTimeout(function(){
	                			parent.definicionPenales()
	                		}, 2000)
	                	}
                	}
                	
                  
                }
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