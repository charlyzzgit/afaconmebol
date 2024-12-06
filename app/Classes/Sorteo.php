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

    private function getEmptyGrupos($gps, $eqs, $with_equipos = null){
      $grupos = [];
      for($g = 1; $g <= $gps; $g++){
        $grupos[] = $with_equipos ? $this->getNewGrupo($eqs) : null;
      }

      return $grupos;
    }

    public function sortear(){

      switch($this->copa){
        case 'afa': return $this->sorteoAfa();
        case 'argentina' : return $this->sorteoArgentina();
        case 'sudamericana': return $this->sorteoSudamericana();
        case 'libertadores': return $this->sorteoLibertadores();
        default: return [$this->sorteoRecopa()];
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
        case -1: return $this->sorteoAfaFase1();
        case 0: return $this->sorteoAfaFase2();
        case 1: return $this->sorteoAfaFase3();
        case 2: return $this->sorteoAfaOctavos();
        default: return null;
      }
    }

    private function sorteoArgentina(){
      switch($this->fase){
        case 1: return $this->sorteoArgentinaDieci();
        default: return $this->sorteoOCSF();
      }
    }


    private function sorteoAfaPreliminar(){

      $repeat = 0;
      $this->zona = 'A';
      $fin = false;
      $grupos = $this->getEmptyGrupos(12, 4, true);
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

      return [$grupos];
    }

    private function sorteoAfaFase1(){
      $m = getMain();
      
      $eqs = (new GrupoController())->getClasificados($m->anio, $this->copa, -2);
      
      

      $levels = getNivelesByPts($eqs);
      $d = 0;
      $a1 = $this->getLote($eqs, $d, $d+=8, $levels);
      $a2 = $this->getLote($eqs, $d, $d+=8, $levels);
      $a2 = array_reverse($a2);
      $a3 = $this->getLote($eqs, $d, $d+=8, $levels);
      $a4 = $this->getLote($eqs, $d, $d+=8, $levels);
      $a4 = array_reverse($a4);

      $b1 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b2 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b2 = array_reverse($b2);
      $b3 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b4 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b4 = array_reverse($b4);

      // ------------------A-------------------------

      $grupos = $this->getEmptyGrupos(8, 4);
      

      foreach($a1 as $g => $e){
        $grupos[$g][] = $e;
      }

      foreach($a2 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($a3 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($a4 as $g => $e){
        $grupos[$g][] = $e;
      }
    

    

    $a = $grupos;

    

    // -------------------B-----------

    $grupos = $this->getEmptyGrupos(4, 4);

    foreach($b1 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($b2 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($b3 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($b4 as $g => $e){
        $grupos[$g][] = $e;
      }

      $b = $grupos;


      //$this->show($a);
      //$this->show($b);


      return [$a, $b];

   }


   private function sorteoAfaFase2(){
      $m = getMain();
      

      // ------------------A-------------------------

      $grupos = $this->getEmptyGrupos(4, 4);
      
      $eqs = (new GrupoController())->getClasificados($m->anio, $this->copa, -1, 'A');
      
      

      $levels = getNivelesByPts((new GrupoController())->getClasificados($m->anio, $this->copa, -1));
      $d = 0;
      $a1 = $this->getLote($eqs, $d, $d+=4, $levels);
      $a2 = $this->getLote($eqs, $d, $d+=4, $levels);
      $a2 = array_reverse($a2);
      $a3 = $this->getLote($eqs, $d, $d+=4, $levels);
      $a4 = $this->getLote($eqs, $d, $d+=4, $levels);
      $a4 = array_reverse($a4);


      foreach($a1 as $g => $e){
        $grupos[$g][] = $e;
      }

      foreach($a2 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($a3 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($a4 as $g => $e){
        $grupos[$g][] = $e;
      }

      $a = $grupos;
     
    
      // ------------------B-------------------------

      $b1 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b2 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b2 = array_reverse($b2);
      $c1 = $this->getLote($eqs, $d, $d+=4, $levels);
      $c2 = $this->getLote($eqs, $d, $d+=4, $levels);
      $c2 = array_reverse($c2);

      $eqs = (new GrupoController())->getClasificados($m->anio, $this->copa, -1, 'B');
      $d = 0;
      
      $b3 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b4 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b4 = array_reverse($b4);

      

      $grupos = $this->getEmptyGrupos(4, 4);
      

      foreach($b1 as $g => $e){
        $grupos[$g][] = $e;
      }

      foreach($b2 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($b3 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($b4 as $g => $e){
        $grupos[$g][] = $e;
      }
    
    $b = $grupos;

     // ------------------C-----------


    $c3 = $this->getLote($eqs, $d, $d+=4, $levels);
    $c4 = $this->getLote($eqs, $d, $d+=4, $levels);
    $c4 = array_reverse($b4);

  

    $grupos = $this->getEmptyGrupos(4, 4);

    foreach($c1 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($c2 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($c3 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($c4 as $g => $e){
        $grupos[$g][] = $e;
      }

      $c = $grupos;


      
      // $this->show($a);
      // $this->show($b);
      // $this->show($c);


      return [$a, $b, $c];

   }


   private function sorteoAfaFase3(){
      $m = getMain();
      

      // ------------------A-------------------------

      $grupos = $this->getEmptyGrupos(2, 4);
      
      $eqs = (new GrupoController())->getClasificados($m->anio, $this->copa, 0, 'A');
      
      

      $levels = getNivelesByPts((new GrupoController())->getClasificados($m->anio, $this->copa, -1));
      $d = 0;
      $a1 = $this->getLote($eqs, $d, $d+=2, $levels);
      $a2 = $this->getLote($eqs, $d, $d+=2, $levels);
      $a2 = array_reverse($a2);
      $a3 = $this->getLote($eqs, $d, $d+=2, $levels);
      $a4 = $this->getLote($eqs, $d, $d+=2, $levels);
      $a4 = array_reverse($a4);


      foreach($a1 as $g => $e){
        $grupos[$g][] = $e;
      }

      foreach($a2 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($a3 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($a4 as $g => $e){
        $grupos[$g][] = $e;
      }

      $a = $grupos;
     
    
      // ------------------B-------------------------

      $b1 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b2 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b2 = array_reverse($b2);
      

      $eqs = (new GrupoController())->getClasificados($m->anio, $this->copa, 0, 'B');
      $d = 0;
      
      $b3 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b4 = $this->getLote($eqs, $d, $d+=4, $levels);
      $b4 = array_reverse($b4);

      

      $grupos = $this->getEmptyGrupos(4, 4);
      

      foreach($b1 as $g => $e){
        $grupos[$g][] = $e;
      }

      foreach($b2 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($b3 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($b4 as $g => $e){
        $grupos[$g][] = $e;
      }
    
    $b = $grupos;

     // ------------------C-----------

    

    $c1 = $this->getLote($eqs, $d, $d+=4, $levels);
    $c2 = $this->getLote($eqs, $d, $d+=4, $levels);
    $c2 = array_reverse($c2);

    $eqs = (new GrupoController())->getClasificados($m->anio, $this->copa, 0, 'C');
    $d = 0;


    $c3 = $this->getLote($eqs, $d, $d+=4, $levels);
    $c4 = $this->getLote($eqs, $d, $d+=4, $levels);
    $c4 = array_reverse($b4);

  

    $grupos = $this->getEmptyGrupos(4, 4);

    foreach($c1 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($c2 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($c3 as $g => $e){
        $grupos[$g][] = $e;
      }
      foreach($c4 as $g => $e){
        $grupos[$g][] = $e;
      }

      $c = $grupos;


      
       // $this->show($a);
       // $this->show($b);
       // $this->show($c);


      return [$a, $b, $c];

   }

   private function sorteoAfaOctavos(){
      $m = getMain();
      

      // ------------------B-------------------------

      $grupos = $this->getEmptyGrupos(4, 2);
      
      $eqs = (new GrupoController())->getClasificados($m->anio, $this->copa, 1, 'B');
      
      

      $levels = getNivelesByPts((new GrupoController())->getClasificados($m->anio, $this->copa, 1));
      $d = 0;
      

       $this->show($b);
       $this->show($c);


      return [$b, $c];
   }


    private function getLote($eqs, $desde, $hasta, $levels = null){
      $equipos = [];
      for($i = $desde; $i < $hasta; $i++){
        $equipos[] = [
          'id' => $eqs[$i]->equipo_id, 
          'name' => $eqs[$i]->equipo,
          'nivel' => $levels ? getNivelByPts($eqs[$i]->pts, $levels) : $eqs[$i]->nivel
        ];
      }
      return $equipos;
    }

    

    private function filterEquipo($eqs){
      return $eqs->map(function($e){
        return ['equipo' => $e->getRelationValue('equipo')->name, 'pts' => $e->pts];
      });
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


    //***********************************ARGENTINA*****************************************************

    private function sorteoArgentinaDieci(){
      $m = getMain();
      $grupos = $this->getEmptyGrupos(16, 2);
      $levels = getNivelesByPts((new GrupoController())->getClasificados($m->anio, 'afa', -1, 'A'));

      $eqs = (new GrupoController())->getClasificados($m->anio, 'afa', -1, 'A');

      $d = 0;
      $bombo1 = $this->getLote($eqs, $d, $d+=16, $levels);
      $bombo2 = $this->getLote($eqs, $d, $d+=16, $levels);
      $loc = range(0, 15);
      $vis = range(0, 15);
      shuffle($loc);
      shuffle($vis);
      
      foreach($loc as $index => $l){
         $e = $bombo1[$l];
         $grupos[$index][] = $e;

        $e = $bombo2[$vis[$index]];
        $grupos[$index][] = $e;
      }

      //$this->show($grupos);

      return [$grupos];
    }
      


    // *********************************SUDAMERICANA - LIBERTADORES********************************************

    private function sorteoSudamericana(){
      switch($this->fase){
        case 0: return $this->sorteoFaseGrupos('sudamericana');
        case 1: return $this->fase2SudLib('sudamericana');
        default: return $this->sorteoOCSF();
      }
      
    }

    private function sorteoLibertadores(){
      switch($this->fase){
        case 0: return $this->sorteoFaseGrupos('libertadores');
        case 1: return $this->fase2SudLib('libertadores');
       default: return $this->sorteoOCSF();
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
      $grupos = $this->getEmptyGrupos($copa == 'libertadores' ? 16 : 8, 4, true);

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

      return [$grupos];

    }

    private function fase2SudLib($copa){
      $vs = [0, 31, 8, 23, 7, 24, 15, 16, 3, 28, 11, 20, 4, 27, 12, 19, 1, 30, 9, 22, 6, 25, 14, 17, 2, 29, 10, 21, 5, 26, 13, 18];
      $grupos = $this->getEmptyGrupos(16, 2);
      
      
      $eqs = (new GrupoController())->getClasificadosSudLib($copa);

      $levels = getNivelesByPts($eqs);
      $g = 0;
      for($i = 0; $i < count($vs); $i+=2){
        $e = $vs[$i];
        $grupos[$g][] = [
          'id' => $eqs[$e]->equipo_id, 
          'name' => $eqs[$e]->equipo,
          'nivel' => getNivelByPts($eqs[$e]->pts, $levels)
        ];

        $e = $vs[$i + 1];
        $grupos[$g][] = [
          'id' => $eqs[$e]->equipo_id, 
          'name' => $eqs[$e]->equipo,
          'nivel' => getNivelByPts($eqs[$e]->pts, $levels)
        ];
        $g++;
      }
       // $this->show($grupos);

      
      return [$grupos];
    }

    private function sorteoOCSF(){
      $m = getMain();
      $fase = $this->fase - 1;
      $eqs = (new GrupoController())->getClasificadosLlaves($m->anio, $this->copa, $fase);

      
      $grupos = $this->getEmptyGrupos(count($eqs)/2, 2);
      $g = 0;
      for($i = 0; $i < count($eqs); $i+=2){
        $a = $eqs[$i];
        $b = $eqs[$i + 1];
        $swap = $this->swapLocal($this->copa, $a->equipo_id, $b->equipo_id);
        $loc = $swap ? $b : $a;
        $vis = $swap ? $a : $b;
        $grupos[$g][] = [
          'id' => $loc->equipo_id, 
          'name' => $loc->equipo,
          'nivel' => $loc->nivel
        ];
        $grupos[$g++][] = [
          'id' => $vis->equipo_id, 
          'name' => $vis->equipo,
          'nivel' => $vis->nivel
        ];
      }
      
      //$this->show($grupos);
      return [$grupos];
    }



    private function swapLocal($copa, $a, $b){
      $m = getMain();
      switch($copa){
        case 'afa':

        break;
        case 'argentina':
          $eqs = (new GrupoController())->getClasificados($m->anio, 'afa', -1, 'A');
        break;
        case 'libertadores': case 'sudamericana':
          $eqs = (new GrupoController())->getClasificadosSudLib($copa);
        break;
        
      }
      $pos_a = 0;
      $pos_b = 0;
      foreach($eqs as $pos => $e){
        if($e->equipo_id == $a){
          $pos_a = $pos + 1;
        }
        if($e->equipo_id == $b){
          $pos_b = $pos + 1;
        }
      }

      return $pos_a > $pos_b;
    }



    private function show($grupos){

      foreach($grupos as $g => $gp){
        dump('***** GRUPO '.($g + 1).' *****');

        foreach($gp as $e){
          
          dump(is_array($e) ? $e['name'] : $e->name);
        }
        dump('---------------------');
      }
    }


  }


