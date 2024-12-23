<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\GoleadoresController;
use App\Classes\Sorteo;
use App\Classes\Admin;

class CopaController extends Controller
{
    //


   public function index($copa_zona, $fase, $grupo_id = null){
    $m = getMain();
    $copa = copaZona($copa_zona, 0);
    $zona = copaZona($copa_zona, 1);
    $keys = null;
    // if($zona){
    //   $zona = strtoupper($zona);
    // }
    //dd($grupo_id);
    if($grupo_id == 'general'){

      $grupos = json_encode((new GrupoController())->getTablaGeneral($m->anio, $copa, $fase, $zona));

    }else if($grupo_id == 'anual'){

      $grupos = json_encode((new GrupoController())->getTablaAnual());
    }else{
      if($fase == '::'){
        $fase = (new GrupoController())->getLastFase($copa, $m->anio, $zona);
      }
      
      $grupos = (new GrupoController())->getGrupos($m->anio, $copa, $fase, $zona);

      //dd($m->anio, $copa, $fase, $zona);
      $we =  null;
      if($copa == 'afa' && $fase >= 2 && $zona == 'b'){
        $we = json_encode((new GrupoController())->getWaitAfaA($m->anio));
      }
      $keys = json_encode((new GrupoController())->llavero($copa, $zona));
    }
    return view('home.copa', compact('copa', 'fase', 'zona', 'grupos', 'we', 'keys'));
   }



   public function newFase(Request $request){
     return processTransaction(function() use($request){
       if($request->fin){
         (new Admin())->processed();
       }else{
         $copa = $request->copa;
         $fase = (new GrupoController())->getNextFase($copa);
         
         $s = new Sorteo($copa, $fase);
         $sorted = $s->sortear();
         foreach($sorted as $z => $grupos){
          $zona = null;
           if(count($sorted) > 1){
              switch($z){
                case 0:
                  $zona = count($sorted) == 3 ? 'A' : ($fase == -1 ? 'A' : 'B');
                break;
                case 1:
                  $zona = count($sorted) == 3 ? 'B' : ($fase == -1 ? 'B' : 'C');
                break;
                default:
                  $zona = count($sorted) == 3 ? 'C' : null;
                break;
              }
           }
           foreach ($grupos as $g => $grupo) {
              $grupo_id = (new GrupoController())->create($g + 1, $grupo, $copa, $fase, $zona);
              (new PartidoController())->create($grupo_id);
           }
           (new PartidoController())->cronograma($copa, $fase);
         }
       }

     }, 'Copa '. $request->copa.' sorteada', 'Error de sorteo');

   }

   public function savePartido(Request $request){
     return processTransaction(function() use($request){
       (new GrupoController())->updateGrupo($request);
       (new PartidoController())->updatePartido($request);
       (new GoleadoresController())->saveGoleadores($request);
       
       $p = (new PartidoController())->nextPartido($request->anio, $request->copa, $request->fase, $request->fecha);
       if(!$p){
         //dump(implode(' - ', [$request->anio, $request->copa, $request->fase, $request->fecha]));
         (new Admin())->processed();

       }
     }, 'copa: '.$request->copa.' - fase: '.$request->fase.' - fecha: '.$request->fecha.' - zona: '.$request->zona, 'Error a guardar');
   }
}
