@extends('layouts.home')
@section('css')
<style>
  #loc, #vis{
    width: 50%;
    height: 100px;
  }

  #loc{
    background: linear-gradient(0deg, white 0%, white 10%, red 50%, white 90%, white 100%);
  }

  #vis{
    background: linear-gradient(0deg, blue 0%, blue 10%, gold 50%, blue 90%, blue 100%);
  }
</style>
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="col-12 flex-row-between-center p-1">
                      <div class="col-6 p-2">
                        <input id="level-loc" type="text" class="form-control" value="5">
                      </div>
                      <div class="col-6 p-2">
                        <input id="level-vis" type="text" class="form-control" value="5">
                      </div>
                    </div>
                    <div class="col-12 flex-row-center-center">
                      <b id="time">0</b>
                    </div>
                    <div class="col-12 flex-row-between-center">
                      <div id="loc" data-w="50" data-level="5"></div>
                      <div id="vis" data-w="50" data-level="5"></div>
                    </div>
                    <div class="col-12 flex-row-between-center">
                      <div class="col-6 p-2">
                        <div id="v-loc" class="alert alert-danger flex-row-center-center p-1 mb-0">0</div>
                      </div>
                      <div class="col-6 p-2">
                        <div id="v-vis" class="alert alert-primary flex-row-center-center p-1 mb-0">0</div>
                      </div>
                    </div>
                    <div class="col-12 flex-row-center-center mt-5">
                      <button id="go" class="btn btn-success">jugar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('partials.scripts')
<script>
  //alert([window.innerWidth, window.innerHeight].join(' x '))
  //384 x 724
  var MAX = 20,
      loc = $('#loc'),
      vis = $('#vis'),
      gl = 0,
      gv = 0,
      timer,
      PAUSE = true,
      time = 0,
      seconds = 0
  function rd(d, h){
    var f = 0;
    
    //h++
    while(f == 0){
      var r = Math.floor(Math.random() * h) + d;
      if(r >= d && r <= h){
        break;
      }
    }
    return r;
  }

  function getPower(eq, isloc){
    var level = parseInt(eq.data('level')),
        p = rd(0, level),
        f = rd(0, MAX),
        limit = isloc ? 5 : 5,
        result = 0
    // if(rd(0, 10) < limit){
    //   return 0
    // }
    // return p + f
    for(var i = 0; i < level; i++){
      result+= rd(0,1)
    }
    return result + rd(1, 50)
  }

  function juego(){
    var l = getPower(loc, true),
        v = getPower(vis, false),
        wl = parseInt(loc.data('w')),
        wv = parseInt(vis.data('w')),
        d = Math.abs(l - v),
        k = d/5,
        wloc,
        wvis,
        changed = false,
        gol = false
        
      if(l > v){
        if(wl + k > 100){
          wloc = 50
          wvis = 50
          gl++
          gol = true
        }else{
          wloc = wl + k
          wvis = 100  - (wl + k)
        }
        changed = true
      }
      if(l < v){
        if(wv + k > 100){
          
          wloc = 50
          wvis = 50
          gv++
          gol = true
        }else{
          wloc = 100 - (wv + k)
          wvis = (wv + k)
        }
        changed = true

      }
      if(!changed){
        return
      }
      PAUSE = true
      if(gol){
        gol = false
        $('#v-loc').html(gl)
        $('#v-vis').html(gv)
        setTimeout(function(){
          loc.data('w', wloc)
          vis.data('w', wvis)
          loc.animate({width: wloc + '%'}, 150)
          vis.animate({width: wvis + '%'}, 150, function(){
            PAUSE = false
          })
        }, 3000)
      }else{
        loc.data('w', wloc)
        vis.data('w', wvis)
        loc.animate({width: wloc + '%'}, 150)
        vis.animate({width: wvis + '%'}, 150, function(){
          PAUSE = false
        })
      }
      
      

  }

  function jugar(){
    // for(var i = 0; i <= 45; i++){
    //   for(var j = 0; j <= 30; j++){
    //     juego()
    //   }
    // }
    PAUSE = false
    time = 0
    timer = setInterval(function(){
      if(PAUSE){
        return
      }
      juego()
      seconds++
      if(seconds == 5){
        seconds = 0
        time++
        $('#time').html(time)
        if(time > 45){
          clearInterval(timer)
        }
      }
    }, 1)
  }

  function reset(){
    var levelloc = parseInt($('#level-loc').val()),
        levelvis = parseInt($('#level-vis').val())
    gl = 0
    gv = 0
    loc.data('w', 50).data('level', levelloc)
    vis.data('w', 50).data('level', levelvis)
    loc.css({width: 50 + '%'})
    vis.css({width: 50 + '%'})
  }

  $(function(){
    $('#go').click(function(){
      reset()
      jugar()
    })
  })
</script>
@stop
