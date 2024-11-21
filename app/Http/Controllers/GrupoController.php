<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Color;
use App\Models\EquipoGrupo;
use App\Models\Liga;
use App\Models\Partido;
use DB;
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

    public function getNextFase($copa, $zona = null){
      $m = getMain();
      $grupo = Grupo::where('anio', $m->anio)
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
          case 'argentina': return 1;
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
      $order = 1;
      foreach($equipos as $e){
        $eg = new EquipoGrupo();
        $eg->grupo_id = $grupo_id;
        $eg->equipo_id = $e['id'];
        $eg->equipo = $e['name'];
        $eg->order = $order++;
        $eg->nivel = isset($e['nivel']) ? $e['nivel'] : $this->getNivel($e['liga_id']);
        $eg->save();
        
      }
    }

    private function getNivel($liga_id){
      $liga = Liga::find($liga_id);
      if(!$liga){
        throw new \Exception('No se econtro la liga con id: '.$liga_id);
        
      }
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

    private function orderByTabla(){

    }


    

    public function getGrupos($anio, $copa, $fase, $zona = null){
      
      $grupos = Grupo::with([
                            'equiposPosition.equipo.colorA',
                            'equiposPosition.equipo.colorB',
                            'equiposPosition.equipo.colorC',
                            'equiposPosition.equipo.liga'
                        ])
                        ->where('anio', $anio)
                        ->where('copa', $copa)
                        ->where('fase', $fase);
      if($zona){
        $grupos = $grupos->where('zona', $zona);
      }

      $grupos = $grupos->get()->map(function($row){
        $colors = colorGrupo($row->grupo);
        $row->a = $colors['a'];
        $row->b = $colors['b'];
        return $row;
      });


      return $grupos;
    }

    public function updateGrupo($data){
      $p = Partido::find($data->id);
      
      $loc = EquipoGrupo::where('equipo_id', $p->loc_id)->where('grupo_id', $p->grupo_id)->first();
      $vis = EquipoGrupo::where('equipo_id', $p->vis_id)->where('grupo_id', $p->grupo_id)->first();
      
      $loc->j++;
      $vis->j++;
      if($data->gl > $data->gv){
        $loc->g++;
        $vis->p++;
        $loc->pts += 3;
      }else if($data->gl < $data->gv){
        $vis->g++;
        $loc->p++;
        $vis->pts += 3;
      }else{
        $loc->e++;
        $vis->e++;

        $loc->pts++;
        $vis->pts++;
      }

      $loc->gf += $data->gl;
      $loc->gc += $data->gv;
      $loc->d = $loc->gf - $loc->gc;

      $vis->gf += $data->gv;
      $vis->gc += $data->gl;
      $vis->gv += $data->gv;
      $vis->d = $vis->gf - $vis->gc;

      if($data->pa && $data->pb){
        $loc->penales = $data->winner_id == $loc->equipo_id ? 1 : 0;
        $vis->penales = $data->winner_id == $vis->equipo_id ? 1 : 0;
      }


      $loc->save();
      $vis->save();

      $egCount = EquipoGrupo::where('grupo_id', $p->grupo_id);
      $egSum = clone $egCount;

      $count = $egCount->count();

      $egSum = $egSum->select(DB::raw('SUM(j) as jugados'))->first();

      $grupo = Grupo::with('equiposTableOrder')->find($p->grupo_id);

      if($count == 4){
        $grupo->completed = $egSum->jugados == 24 ? true : false;
      }else{
        $grupo->completed = $egSum->jugados == 4 ? true : false;
      }

      foreach($grupo->equiposTableOrder as $order => $e){
         $e->pos = $order + 1;
         $e->save();
      }

      

      $grupo->save();

      if($grupo->fase == 5){
        $m = getMain();
        $eq_id = $grupo->equiposTableOrder[0]->equipo_id;
        switch($grupo->copa){
          case 'afa':
            switch($grupo->zona){
              case 'A':
                $m->afa_a = $eq_id;
              break;
              case 'B':
                $m->afa_b = $eq_id;
              break;
              default:
                $m->afa_c = $eq_id;
              break;
            }
          break;
          case 'argentina':
            $m->arg = $eq_id;
          break;
          case 'sudamericana':
            $m->sud = $eq_id;
          break;
          case 'libertadores':
            $m->lib = $eq_id;
          break;
          default:
            $m->rec = $eq_id;
          break;
        }
        $m->save();
      }

      $this->setEstadoClasificacion($grupo->id);
    }

    private function setEstadoClasificacion($grupo_id){
      $grupo = Grupo::with('equiposTableOrder')->find($grupo_id);
      $grupos_id = Grupo::where('anio', $grupo->anio)
                        ->where('copa', $grupo->copa)
                        ->where('fase', $grupo->fase);
      
      switch($grupo->copa){
        case 'afa':

        break;
        case 'argentina':

        break;
        default:
          foreach($grupo->equiposTableOrder as $order => $e){
             $e->estado = $grupo->completed ? ($e->pos == 1 ? 2 : -1) : 0;
             $e->save();
          }
        break;
      }
    }
}
