<?php

namespace App\Classes;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\CopaController;
use App\Models\Partido;


class AutoPartido{
    private $partido;
    private $ida;
    private $gl;
    private $gv;
    private $gbl;
    private $gbv;
    private $goleadores;
    private $detalle;
  
    function __construct($partido){
        $this->partido = $partido;
        $this->ida = $this->getIda();
        $this->gl = 0;
        $this->gv = 0;
        $this->gbl = $partido->is_vuelta && $partido->is_define ? $this->ida->gv : 0;
        $this->gbv = $partido->is_vuelta && $partido->is_define ? $this->ida->gl : 0;
        $this->goleadores = [];
        
        $this->detalle = [];
        // dump($this->ida->toArray());
        // alert($this->gbl.' ---- '.$this->gbv);
    }

    private function getIda(){
      $ida = Partido::with('grupo', 'local', 'visitante')
                  ->where('anio', $this->partido->anio)
                  ->where('copa', $this->partido->copa)
                  ->where('fase', $this->partido->fase)
                  ->where('grupo_id', $this->partido->grupo_id)
                  ->where('zona', $this->partido->zona)
                  ->where('loc_id', $this->partido->vis_id)
                  ->where('vis_id', $this->partido->loc_id)
                  ->where('is_vuelta', false)
                  ->first();
    return $ida;
    }


    private function getPower($a, $b, $islocal){
        $dif = abs($a - $b);
        $l = $a > $b ? 10 : 10 - $dif;
        $v = $b > $a ? 10 : 10 - $dif;

        return $islocal ? $l : $v;
    }



   private function frame($level){
        return rand(0, 15) + $level > 10 ? 1 : 0;
    }

    private function power($level){
        $pw = 0;
        for($i = 0; $i < 100; $i++){
            $pw += $this->frame($level);
        }
        return $pw;
    }


    private function golDe(){
       $g = rand(0, 100);
        if($g < 50){
          return 'de jugada';
        }
        if($g >= 50 && $g < 60){
          return 'de cabeza';
        }
        if($g >= 60 && $g < 70){
          return 'de penal';
        }
        if($g >= 70 && $g < 75){
          return 'de volea';
        }
        if($g >= 75 && $g < 80){
          return 'de palomita';
        }
        if($g >= 80 && $g < 85){
          return 'olimpico';
        }
        if($g >= 85 && $g < 90){
          return 'de media cancha';
        }
        if($g >= 90 && $g < 95){
          return 'de arco a arco';
        }
        
        return 'de chilena';
      
    }

    public function jugar(){
      
      $level1 = 0;
      $level2 = 0;
      $power1 = 0;
      $power2 = 0;
      //dd($this->partido);
      foreach($this->partido->grupo->equiposPosition as $e){

        if($this->partido->local->id == $e->equipo_id){
           $level1 = $e->nivel;
        }
        if($this->partido->visitante->id == $e->equipo_id){
           $level2 = $e->nivel;
        }
      }

      $power1 = $this->getPower($level1 + 2, $level2, true);
      $power2 = $this->getPower($level1 + 2, $level2, false);

      $half = 50;
      

      $position = $half;
      $minuto = 0;
      $tiempo = 1;
      for($i = 0; $i < 90; $i++){
        $l = rand(0,1);
        $v = rand(0,1);

        if($l != $v){
          if(rand(0, 30) == 30){
            if($l > $v){
              $position += $this->power($power1);
            }else{
              $position -= $this->power($power2);
            }
          }
        }

        if($position > 100){
          $this->gl++;
          $this->gbl++;
          $j = $this->getJugador();
          $this->detalle[] = [
              'equipo_id' => $this->partido->local->id,
              'jugador' => $j,
              'minuto' => $minuto,
              'tiempo' => $tiempo,
              'gol' =>  $this->golDe()
          ];
          //$this->golesloc[] = $j;
          $this->addGoleador($j, $this->partido->local->id);
          $position = $half;
        }

        if($position < 0){
          $this->gv++;
          $this->gbv++;
          $j = $this->getJugador();
           $this->detalle[] = [
              'equipo_id' => $this->partido->visitante->id,
              'jugador' => $j,
              'minuto' => $minuto,
              'tiempo' => $tiempo,
              'gol' =>  $this->golDe()
          ];
          $this->addGoleador($j, $this->partido->visitante->id);
          //$this->golesvis[] = $j;
          $position = $half;
        }
        $minuto++;
        if($minuto > 45){
          $minuto = 0;
          $tiempo = 2;
        }
      }
// ------------------------
      // $this->gl = 1;
      // $this->gv = 1;
      // $this->gbl = 1;
      // $this->gbv = 1;
// -----------------

      //alert($this->partido->local.' - '.$this->gl.' ['.$this->gbl.'] -- ['.$this->gbv.'] '.$this->gv.' - '.$this->partido->visitante);
      if($this->partido->is_vuelta && $this->partido->is_define){
        if($this->gbl == $this->gbv){
          return $this->penales();
        }else{
          return $this->savePartido();
        }
      }else{
        return $this->savePartido();
      }
      
      
      
    }

    private function addGoleador($j, $eq_id){
      $e = false;
      foreach($this->goleadores as &$g){
        
        if($g['jugador'] == $j && $g['equipo_id'] == $eq_id){
          $g['goles']++;
          $e = true;
        }
      }

      if(!$e){
        $this->goleadores[] = [
                                'jugador' => $j,
                                'equipo_id' => $eq_id,
                                'goles' => 1
                              ];
      }
    }

    private function penales(){
      $p = 0;
      $count_a = 0;
      $count_b = 0;
      $pa = 0;
      $pb = 0;
      while($p <= 5){
        if(!$this->tieneChances($pa, $count_a, $pb)){
          break;
        }
        $pa += rand(0,1);
        $count_a++;
        if(!$this->tieneChances($pb, $count_b, $pa)){
          break;
        }
        $pb += rand(0,1);
        $count_b++;
        $p++;
      }

      while($pa == $pb){
        $pa += rand(0,1);
        $pb += rand(0,1);
      }

      return $this->savePartido(['pa' => $pa, 'pb' => $pb]);
    }

    private function tieneChances($convertidos, $ejecutados, $rival){
      $faltantes = 5 - $ejecutados;
      return ($convertidos + $faltantes >= $rival) ? true : false;
    }

    private function getJugador(){
      $puesto = rand(1, 11);
      $desde;
      if($puesto == 1){
          $desde = 0;
      }else if($puesto > 1 && $puesto < 6){
          $desde = 1;
      }else{
          $desde = 7;
      }
      return rand($desde, 11);
    }

    private function getWinner($penales){
      if($penales){
        return $penales['pa'] > $penales['pb'] ? $this->partido->loc_id : $this->partido->vis_id;
      }
      
      if($this->gl > $this->gv){
        return $this->partido->loc_id;
      }
      if($this->gl < $this->gv){
        return $this->partido->vis_id;
      }

      return 0;
    }

    private function savePartido($penales = null){
      $request = new Request([
        'id' => $this->partido->id,
        'anio' => $this->partido->anio,
        'copa' => $this->partido->copa, 
        'fase' => $this->partido->fase, 
        'fecha' => $this->partido->fecha, 
        'zona' => $this->partido->zona,
        'gl' => $this->gl,
        'gv' => $this->gv,
        'winner_id' => $this->getWinner($penales),
        'goleadores' =>  $this->goleadores,
        'detalle' => json_encode($this->detalle)
      ]);

      if($penales){
        $request = $request->merge($penales);
      }
      

     
      //dd($request->all());
      $res = (new CopaController())->savePartido($request);
      return $res->original;
      // {"gl":"0","gv":"2","golesloc":null,"golesvis":"11|2","id":"1","winner":"-1"
    }


    


  }


  // {"islocal":false,"jugador":5,"minuto":11,"tiempo":2},
  // {"islocal":false,"jugador":3,"minuto":18,"tiempo":2}]