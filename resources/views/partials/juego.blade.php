<script>
 var PAUSE  = false
	function Juego(el, loc, vis){
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
     this.loc = loc 
     this.vis = vis
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
	    //parent.pause = true
	    
	    parent.goal.animate({left:0, opacity:1}, 150)
      setTimeout(function(){
        parent.duelo.animate({left: parent.center + 'px'}, 2000)
      }, 2000)
	    setTimeout(function(){
	            PAUSE = false
              
	            parent.goal.animate({opacity:0}, 150)
	     }, 3000)
  	}else{
  		PAUSE = false
  	}
  	//log('end', [PAUSE])
  	
  }

  this.setTiempo = function(){
    var supl = this.alargue ? ' s' : ''
    this.lbltiempo.html(this.tiempo + '° tiempo' + supl)
  }

  this.halfTime = function(){
    var parent = this,
    j = getEl(parent.el, 'jugador')
    j.fadeOut(150)
    parent.duelo.animate({left: parent.center + 'px'}, 2000)
    setTimeout(function(){
      j.fadeIn(150)
      parent.endTime = false
      parent.tiempo = 2
      parent.jugar()
    }, 2000)
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
	        if(parent.time > 45){
            parent.aditionalTime.show()
          }
	        if(parent.time > parent.maxTime){
	        	//log('fin', [parent.time])
	        	parent.endTime = true
	        	parent.duelo.stop(true, false)
	          clearInterval(parent.timer)
            if(parent.tiempo == 1){
              
              parent.halfTime()
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