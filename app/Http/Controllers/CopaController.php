<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\PartidoController;
use App\Classes\Sorteo;
use App\Classes\Admin;

class CopaController extends Controller
{
    //


   public function index($copa){
     return view('home.copa');
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
}
