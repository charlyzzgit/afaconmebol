<?php

namespace App\Classes;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\Api\AppController;
use App\Models\Partido;


class AutoPartido{
    private $partido;
    private $ida;
    private $gl;
    private $gv;
    private $gbl;
    private $gbv;
    private $golesloc;
    private $golesvis;
    private $detalle;
  
    function __construct($partido){
        $this->partido = $partido;
        $this->ida = $this->getIda();
        $this->gl = 0;
        $this->gv = 0;
        $this->gbl = $partido->is_vuelta && $partido->is_define ? $this->ida->gv : 0;
        $this->gbv = $partido->is_vuelta && $partido->is_define ? $this->ida->gl : 0;
        $this->golesloc = [];
        $this->golesvis = [];
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


    public function jugar(){
      
      $level1 = 0;
      $level2 = 0;
      $power1 = 0;
      $power2 = 0;
      //dd($this->partido);
      foreach($this->partido->grupo->posiciones as $e){
        if($this->partido->equipoLocal->id == $e->equipo_id){
           $level1 = $e->nivel;
        }
        if($this->partido->equipoVisitante->id == $e->equipo_id){
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
              'islocal' => true,
              'jugador' => $j,
              'minuto' => $minuto,
              'tiempo' => $tiempo
          ];
          $this->golesloc[] = $j;
          $position = $half;
        }

        if($position < 0){
          $this->gv++;
          $this->gbv++;
          $j = $this->getJugador();
          $this->detalle[] = [
              'islocal' => false,
              'jugador' => $j,
              'minuto' => $minuto,
              'tiempo' => $tiempo
          ];
          $this->golesvis[] = $j;
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
          $this->penales();
        }else{
          return $this->savePartido();
        }
      }else{
        return $this->savePartido();
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

    private function getWinner(){
      
      if($this->gl > $this->gv){
        return 1;
      }
      if($this->gl < $this->gv){
        return -1;
      }

      return 0;
    }

    private function savePartido($penales = null){
      $request = new Request([
          'id' => $this->partido->id,
          'gl' => $this->gl,
          'gv' => $this->gv,
          'golesloc' => implode('|', $this->golesloc),
          'golesvis' => implode('|', $this->golesvis),
          'winner' => $this->getWinner(),
          'detalle' => json_encode($this->detalle)
      ]);
      if($penales){
        $request = $request->merge($penales);
      }
      //dd($request->all());
      $res = (new AppController())->savePartido($request);
      return $res->original;
      // {"gl":"0","gv":"2","golesloc":null,"golesvis":"11|2","id":"1","winner":"-1"
    }


    


  }


  // {"islocal":false,"jugador":5,"minuto":11,"tiempo":2},
  // {"islocal":false,"jugador":3,"minuto":18,"tiempo":2}]