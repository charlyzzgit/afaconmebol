<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\EquipoGrupo;
class GrupoController extends Controller
{
    public function getLastFase($copa, $anio, $zona = null){
      

      $grupo = Grupo::where('anio', $anio)
                    ->where('copa', $copa);
      if($zona){
        $grupo = $grupo->where('zona', $zona);
      }
      $grupo = $grupo->groupBy('fase')
                     ->orderBy('fase', 'desc')
                     ->first();
      return $grupo ? $grupo->fase : null;
    }

    public function getNextFase($copa, $anio, $zona = null){
      
      $grupo = Grupo::where('anio', $anio)
                    ->where('copa', $copa);
      if($zona){
        $grupo = $grupo->where('zona', $zona);
      }
      $grupo = $grupo->groupBy('fase')
                     ->orderBy('fase', 'desc')
                     ->first();
      if(!$grupo){
        switch ($copa) {
          case 'afa':
            switch($zona){
              case 'A': return -2;
              case 'B': return -1;
              default: return 0;
            }
          case 'argentina': retun 1;
          case 'sudamericana': return 0;
          case 'libertadores': return 0;
          default: return 5;
          
        }
      }

      return $grupo->fase + 1;
    }
    


    public function create($g, $equipos, $copa, $fase, $zona = null){
      $m = getMain();
      $grupo = new Grupo();
      $grupo->anio = $m->anio;
      $grupo->grupo = $g;
      $grupo->copa = $copa; 
      $grupo->fase = $fase;
      $grupo->zona = $zona;
      $grupo->save();

      $this->addEquipos($grupo->id, $equipos);

      return $grupo->id;
    }


    private function addEquipos($grupo_id, $equipos){
      $grupo = Grupo::find($grupo_id);
      foreach($equipos as $n => $e){
        $eg = new EquipoGrupo();
        $e->grupo_id = $grupo_id;
        $e->equipo_id = $e['id'];
        $e->equipo = $e['name'];
        $e->order = $n + 1;
        $e->nivel = isset($e['nivel']) ? $e['nivel'] : $this->getNivel($e['liga_id']);
        $e->save();
        
      }
    }

    private function getNivel($liga_id){
      $liga = Liga::find($liga_id);
      switch($liga->name){
        case 'brasil': return 10;
        case 'argentina': return 9;
        case 'colombia': return 8;
        case 'uruguay': return 7;
        case 'paraguay': return 6;
        case 'chile': return 5;
        case 'ecuador': return 4;
        case 'bolivia': return 3;
        case 'peru': return 2;
        case 'venezuela': return 1;
        default: return 0;
      }
    }
}
