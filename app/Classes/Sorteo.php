<?php

namespace App\Classes;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Calendar;
use App\Models\Equipo;
use App\Http\Controllers\GrupoController;
use DB;



class Sorteo{
    private $main;
    private $copa;
    private $fase;
    private $grupos;
    private $zona;
  
    function __construct($copa, $fase){
      $this->main = getMain();
      $this->copa = $copa;
      $this->fase = $fase;
      $this->grupos = [];
      $this->zona = null;
    }

    private function getNewGrupo($count){
      return $count == 4 ?
             [
                null,
                null,
                null,
                null
             ] 
             :
             [
                null,
                null
            ];


    }

    private function getEmptyGrupos($gps, $eqs){
      $grupos = [];
      for($g = 1; $g <= $gps; $g++){
        $grupos[] = $this->getNewGrupo($eqs);
      }

      return $grupos;
    }

    public function sortear(){
      switch($this->copa){
        case 'afa': return $this->sorteoAfa();
        case 'argentina' : return $this->sorteoArgentina();
        case 'sudamericana': return $this->sorteoSudamericana();
        case 'libertadores': return $this->sorteoLibertadores();
        default: return $this->sorteoRecopa();
      }
    }

    public function getZona(){
      return $this->zona;
    }

    private function getEquipo($id){
      $eq = Equipo::select('id', 'liga_id', 'clasico_id', 'name')->find($id);
      return $eq->toArray();
    }


    private function sorteoRecopa(){
      $this->grupos[] = [
                            $this->getEquipo($this->main->lib),
                            $this->getEquipo($this->main->sud)
                          ];
      return $this->grupos;
    }

    private function sorteoAfa(){
      switch($this->fase){
        case -2: return $this->sorteoAfaPreliminar();
        case -1: return $this->sorteoAfaAB();
        default: return null;
      }
    }

    private function sorteoAfaPreliminar(){
      $repeat = 0;
      $this->zona = 'A';
      $fin = false;
      $grupos = $this->getEmptyGrupos(12, 4);
      $equipos = Equipo::select(
                        'id',
                        'name',
                        'clasico_id',
                        'liga_id', 
                        'nivel'
                      )
                       ->where('liga_id', 2)
                       ->orderBy('nivel', 'desc')
                       ->orderBy('id')
                       ->get();
      
      while(!$fin){
        $repeat = 0;
        $index = 0;
        $pos = 0;
        
        while($index < $equipos->count()){
          $eq = $equipos[$index];
          $pos = $this->nextPos($grupos);
          
          $gp = rand(0, count($grupos) - 1);
          if($this->entra($grupos[$gp], $eq, $pos)){
            $grupos[$gp][$pos] = $eq;
            //dump($eq->name);
            $index++;
          }else{
            $repeat++;
          }
          
          if($index == 48){
            $fin = true;
            break;
          }else{
            if($repeat > 1000){
              break;
            }
          }
        }
      }

      //$this->show($grupos);

      return $grupos;
    }

    private function sorteoAfaAB(){
      $m = getMain();

      $eqs = (new GrupoController())->getClasificados($m->anio, $this->copa, $this->fase);
     dd('llego');
      $bombo1 = $eqs->filter(function($e){
          return $e->pos == 1;
      });

      $bombo2 = $eqs->filter(function($e){
          return $e->pos == 2;
      });

      $bombo3_1 = $eqs->filter(function($e) {
          return $e->pos == 3;
      })->take(8);

      $bombo3_2 = $eqs->filter(function($e) {
          return $e->pos == 3;
      })->slice(-4);

      $bombo3 = $bombo3_1->concat($bombo3_2);

      $bombo4 = $eqs->filter(function($e){
          return $e->pos == 4;
      });

      //dd($bombo1[0]->equipo->name);

    }

    private function nextPos($grupos){
      $p = 0;
      $count = 0;
      $size = count($grupos[0]);
      while($this->completedPos($grupos, $p) && $p < $size){
        $p++;
        if($p == 3){
          break;
        }
      }
      return $p;
    }

    private function completedPos($grupos, $p){
      $count = 0;
      foreach($grupos as $gp){
        if($gp[$p] != null){
          $count++;
        }
      }

      return count($grupos) == $count;
    }


    private function entra($gp, $eq, $pos){
      if($this->copa == 'afa'){
        $ok = true;
        if($this->fase == -2){
          $ok = !$this->tieneClasico($gp, $eq->id);
        }


        
      }

      if(isInternacional($this->copa)){
        if($this->fase == 0){
           $ok = !$this->tieneLiga($gp, $eq->liga_id); 
        }
      }

      return $ok && $gp[$pos] == null;

    }

    private function tieneClasico($gp, $eq_id){
      foreach($gp as $e){
         if($e != null){
           if($e->clasico_id == $eq_id){
            return true;
           }
         }     
      }

      return false;
    }

    private function tieneLiga($gp, $liga_id){
      foreach($gp as $e){
         if($e != null){
          //dd($e->liga_id.' == '.$liga_id);
           if($e->liga_id == $liga_id){
              return true;
           }
         }     
      }

      return false;
    }


    // *********************************SUDAMERICANA - LIBERTADORES********************************************

    private function sorteoSudamericana(){
      switch($this->fase){
        case 0: return $this->sorteoFaseGrupos('sudamericana');
        default: return null;
      }
      
    }

    private function sorteoLibertadores(){
      switch($this->fase){
        case 0: return $this->sorteoFaseGrupos('libertadores');
        default: return null;
      }
      
    }

    private function sorteoFaseGrupos($copa){
      $equipos = Equipo::select(
                        'id',
                        'name',
                        'liga_id',
                        'nivel'
                      )
                       ->where('copa', $copa)
                       ->orderBy('liga_id')
                       ->orderBy('pts', 'desc')
                       ->get();

      $repeat = 0;
      
      $fin = false;
      $grupos = $this->getEmptyGrupos($copa == 'libertadores' ? 16 : 8, 4);

      if($copa == 'libertadores'){
        $m = getMain();
        $grupos[0][0] = Equipo::select(
                        'id',
                        'name',
                        'liga_id',
                        'nivel'
                      )->find($m->lib);

        $grupos[8][0] = Equipo::select(
                        'id',
                        'name',
                        'liga_id',
                        'nivel'
                      )->find($m->sud);
      }

      $count = $this->copa == 'libertadores' ? 62 : 32;

      while(!$fin){
        $repeat = 0;
        $index = 0;
        $pos = 0;
        
        while($index < $count){
          $eq = $equipos[$index];
          $pos = $this->nextPos($grupos);
         
          $gp = rand(0, count($grupos) - 1);
          if($this->entra($grupos[$gp], $eq, $pos)){
            $grupos[$gp][$pos] = $eq;
            $index++;
            //dump($index.' - '.$eq->name);
          }else{
            $repeat++;
          }
          
          if($index == $count){
            $fin = true;
            break;
          }else{
            if($repeat > 1000){
              break;
            }
          }
        }
      }

      //$this->show($grupos);

      return $grupos;

    }


    private function show($grupos){
      foreach($grupos as $g => $gp){
        dump('***** GRUPO '.($g + 1).' *****');
        foreach($gp as $e){
          dump($e->name);
        }
        dump('---------------------');
      }
    }


  }


