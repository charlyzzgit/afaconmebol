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
    if($fase == '::'){
      $fase = (new GrupoController())->getLastFase($copa, $m->anio, $zona);
    }
    
    $grupos = (new GrupoController())->getGrupos($m->anio, $copa, $fase, $zona);
    return view('home.copa', compact('copa', 'fase', 'zona', 'grupos'));
   }

   public function newFase(Request $request){
     return processTransaction(function() use($request){
       if($request->fin){
         (new Admin())->processed();
       }else{
         $copa = $request->copa;
         $fase = (new GrupoController())->getNextFase($copa);
         $s = new Sorteo($copa, $fase);
         $grupos = $s->sortear();
         foreach ($grupos as $g => $grupo) {
            $grupo_id = (new GrupoController())->create($g + 1, $grupo, $copa, $fase);
            (new PartidoController())->create($grupo_id);
         }
         (new PartidoController())->cronograma($copa, $fase);
       }

     }, 'Copa '. $request->copa.' sorteada', 'Error de sorteo');

   }

   public function savePartido(Request $request){
     return processTransaction(function() use($request){
       (new GrupoController())->updateGrupo($request);
       (new PartidoController())->updatePartido($request);
       (new GoleadoresController())->saveGoleadores($request);
       
       $p = (new PartidoController())->nextPartido($request->anio, $request->copa, $request->fase, $request->fecha, $request->zona);
       if(!$p){
         (new Admin())->processed();
       }
     }, 'Grupo, partido, goleadores actualizados', 'Error a guardar');
   }
}
