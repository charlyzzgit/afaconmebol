<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Liga;
use App\Models\Equipo;

class LigaController extends Controller
{
    
    public function index(){
      $ligas = Liga::with('colorA', 'colorB', 'colorC')->get();
      return view('home.ligas', compact('ligas'));
    }

     public function equipos($liga_id){
      $total = Equipo::where('liga_id', $liga_id)->sum('pts');
      $lib = [];
      $sud = [];
      $equipos = Equipo::with('colorA', 'colorB', 'colorC')
                       ->where('liga_id', $liga_id);
      if($total){
        $equipos = $equipos->orderBy('pts', 'desc');
        $lib = Equipo::with('colorA', 'colorB', 'colorC')
                      ->where('liga_id', $liga_id)
                      ->where('copa', 'libertadores')
                      ->orderBy('pos_clasificacion')
                      ->get();
        $sud = Equipo::with('colorA', 'colorB', 'colorC')
                      ->where('liga_id', $liga_id)
                      ->where('copa', 'sudamericana')
                      ->orderBy('pos_clasificacion')
                      ->get();
      }
                      
      $equipos = $equipos->orderBy('nivel', 'desc')->get();
      $liga = Liga::with('colorA')->find($liga_id);
      return view('home.equipos', compact('liga', 'equipos', 'lib', 'sud'));
    }

    public function ptsFecha($nivel){
      for($n = 0; $n < $nivel; $n++){
        $r = rand(0, 1);
        if($r){
          return rand(0, 1) ? 3 : 1;
        }
      }
      return 0;
   }

   public function getPtsTemporada($nivel){
    $pts = 0;
      for($i = 0; $i < 96; $i++){
          $pts+= $this->ptsFecha($nivel);
      }
      return $pts;
   }


   public function autoLigas(){
     
      
      $ligas = Liga::with('equipos')->get();
        foreach($ligas as $liga){
          foreach($liga->equipos as $e){
              $eq = Equipo::find($e->id);
              if($liga->id == 2){
                // $pts = (new GrupoController())->getPtsTemporada($eq->id);
                // $eq->pts = $pts != -1 ? $pts : $this->getPtsTemporada($e->nivel);
                 $eq->pts = $this->getPtsTemporada($e->nivel);
              }else{
                $eq->pts = $this->getPtsTemporada($e->nivel);
              }

              
              
              
              $eq->copa = null;
              $eq->save();
          }
        }

       
        $ligas = Liga::with('equiposByPuntos')->where('id', '<>', 2)->get();
        $plazas_lib = getPlazas('libertadores');
        $plazas_sud = getPlazas('sudamericana');
        //dd($plazas_lib, $plazas_sud);
        foreach($ligas as $liga){
          $count = 0;
          foreach($liga->equiposByPuntos as $eq){
            if(isCampeon($eq->id, 'libertadores') || isCampeon($eq->id, 'sudamericana')){
              continue;
            }
            if($count < $plazas_lib[$liga->name]){
              $eq->copa = 'libertadores';
              $eq->pos_clasificacion = $count + 1;
            }else if($count >= $plazas_lib[$liga->name] && $count < $plazas_lib[$liga->name] + $plazas_sud[$liga->name]){
              $eq->copa = 'sudamericana';
              $eq->pos_clasificacion = $count + 1;
            }else{
              $eq->copa = null;
              $eq->pos_clasificacion = 100;
            }
            $eq->save();
            $count++;
          }
        }
        //usar cupos
        $clasi = getClasificadosAfa();
        $equipos = Equipo::where('liga_id', 2)->get();
        $pos = 1;
        $id_clasis = [];
        foreach($clasi['lib'] as $c){
          foreach($equipos as $e){
            if($e->id == $c->equipo_id){
              $e->copa = 'libertadores';
              $e->pos_clasificacion = $pos++;
              $e->save();
              $id_clasis[] = $e->id;
            }
          }
        }

        foreach($clasi['sud'] as $c){
          foreach($equipos as $e){
            if($e->id == $c->equipo_id){
              $e->copa = 'sudamericana';
              $e->pos_clasificacion = $pos++;
              $e->save();
              $id_clasis[] = $e->id;
            }
          }
        }
        foreach($equipos as $e){
          if(!in_array($e->id, $id_clasis)){
            $e->copa = null;
            $eq->pos_clasificacion = 100;
            $e->save();
          }
          
        }

      }


      public function autoFecha(){
        $ligas = Liga::with('equipos')->where('id', '<>', 2)->get();
        foreach($ligas as $liga){
          foreach($liga->equipos as $e){
              $eq = Equipo::find($e->id);
              $eq->pts = $this->getPtsTemporada($e->nivel);
              $eq->save();
          }
        }
      }
        
}
