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
            return -2;
            // switch($zona){
            //   case 'A': return -2;
            //   case 'B': return -1;
            //   default: return -2;
            // }
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
      $grupo = Grupo::with('equiposPosition')->find($grupo_id);
      
      
      switch($grupo->copa){
        case 'afa':
          if($grupo->fase == -2){
            $grupos = Grupo::with('equiposPosition')
                            ->where('anio', $grupo->anio)
                            ->where('copa', $grupo->copa)
                            ->where('fase', $grupo->fase)
                            ->where('id', '<>', $grupo->id)
                            ->get();
          }
          foreach($grupo->equiposTableOrder as $order => $e){
            switch($grupo->fase){
              case -2:
                switch($e->pos){
                  case 1: case 2: 
                    $e->estado = $grupo->completed ? 2 : $this->clasifica($e, $grupo);
                  break;
                  case 3:
                    $e->estado = $grupo->completed ? $this->clasificaGral($e) : $this->clasifica($e, $grupo);
                  break;
                  default:
                    $e->estado = $grupo->completed ? -1 : $this->clasifica($e, $grupo);
                  break;
                }
              break;
            }
             
            $e->save();
          }
          
        break;
        case 'argentina':

        break;
        case 'sudamericana':
          foreach($grupo->equiposTableOrder as $order => $e){
            switch($grupo->fase){
              case 0:
                switch($e->pos){
                  case 1: case 2: 
                    $e->estado = $grupo->completed ? 2 : $this->clasifica($e, $grupo);
                  break;
                  default:
                    $e->estado = $grupo->completed ? -1 : $this->clasifica($e, $grupo);
                  break;
                  
                }
              break;
            }
             
            $e->save();
          }
        break;
        case 'libertadores':
          foreach($grupo->equiposTableOrder as $order => $e){
            switch($grupo->fase){
              case 0:
                switch($e->pos){
                  case 1: case 2: 
                    $e->estado = $grupo->completed ? 2 : $this->clasifica($e, $grupo);
                  break;
                  case 3:
                    $e->estado = $grupo->completed ? 1 : $this->clasifica($e, $grupo);
                  break;
                  default:
                    $e->estado = $grupo->completed ? -1 : $this->clasifica($e, $grupo);
                  break;
                }
              break;
            }
             
            $e->save();
          }
        break;
        default:
          foreach($grupo->equiposTableOrder as $order => $e){
             $e->estado = $grupo->completed ? ($e->pos == 1 ? 2 : -1) : 0;
             $e->save();
          }
        break;
      }
    }


  private function clasifica($e, $grupo){
    $superados = 0;
    $me_superan = 0;
    foreach($grupo->equiposPosition as $eq){
      if($eq->id == $e->id){
        continue;
      }
      if($this->supera($e, $eq)){
        $superados++;
      }

      if($this->supera($eq, $e)){
        $me_superan++;
      }
    }

    //dump($e->equipo, $superados, $me_superan);

    if($superados >= 2){
      return 2;
    }

    if($superados == 1){
      if($me_superan < 2){
        return 0;
      }

      return 1;
    }

    if($me_superan > 1){
      if($me_superan == 2){
        return 0;
      }

      if($me_superan == 2){
        return -1;
      }
    }

    return 0;
  }

  private function supera($e, $eq){
    return $e->pts > ((6 - $eq->j)*3 + $eq->pts);
  }

  private function clasificaGral($e){
    $grupo = Grupo::find($e->grupo_id);
    $eqs = $this->getTablaGeneralFase($grupo->copa, $grupo->fase, $grupo->zona);
    $pos = 0;
    foreach($eqs as $eq){
      if($eq->pos == 3){
        $pos++;
        if($e->equipo_id == $eq->equipo_id){
          break;
        }
      }
    }
    return $pos <= 8 ? 1 : -1;
  }

  private function getTablaGeneralFase($copa, $fase, $zona = null){
    $m = getMain();
    $equipos = EquipoGrupo::with('grupo', 'equipo')
                          ->whereHas('grupo', function ($query) use ($copa, $fase, $zona) {
                              $query->where('fase', $fase)
                                    ->where('copa', $copa);
                              if (!is_null($zona)) {
                                  $query->where('zona', 'Norte');
                              }


                          });
    
                        
    $equipos = $equipos->orderBy('pos')
                       ->orderBy('pts', 'desc')
                      ->orderBy('d', 'desc')
                      ->orderBy('gf', 'desc')
                      ->orderBy('gc')
                      ->orderBy('gv')
                      ->orderBy('g', 'desc')
                      ->orderBy('p')
                      ->get();

    return $equipos;
  }

  public function tablaGeneral($copa, $fase, $zona = null){
    $m = getMain();
    $grupos = Grupo::with([
                              'equiposPosition.equipo.colorA',
                              'equiposPosition.equipo.colorB',
                              'equiposPosition.equipo.colorC',
                              'equiposPosition.equipo.liga'
                          ])
                          ->where('anio', $m->anio)
                          ->where('copa', $copa)
                          ->where('fase', $fase);
      
      if ($zona) {
          $grupos = $grupos->where('zona', $zona);
      }

      $grupos = $grupos->get();

    // Unifica las posiciones de todos los grupos en una tabla general
    $tablaGeneral = collect();

    foreach ($grupos as $grupo) {
        $colors = colorGrupo($grupo->grupo);
        $grupo->a = $colors['a'];
        $grupo->b = $colors['b'];

        // Combina las posiciones de los equipos en la tabla general
        $tablaGeneral = $tablaGeneral->merge($grupo->equiposPosition);
        // $tablaGeneral = $tablaGeneral->merge($grupo->equiposPosition->map(function($eg) use ($grupo) {
        //     return [
        //         'grupo' => $grupo->grupo,
        //         'equipo' => $eg->equipo->nombre,
        //         'colorA' => $eg->equipo->colorA,
        //         'colorB' => $eg->equipo->colorB,
        //         'colorC' => $eg->equipo->,
        //         'liga' => $eg->equipo->liga,
        //         'j' => $eg->pj,
        //         'g' => $eg->pg,
        //         'e' => $eg->pe,
        //         'p' => $eg->pp,
        //         'gf' => $eg->gf,
        //         'gc' => $eg->gc,
        //         'd' => $eg->d,
        //     ];
        // }));
    }

    // Opcional: Ordena la tabla general por puntos, diferencia de goles y goles a favor
        $tablaGeneral = $tablaGeneral->sort(function ($a, $b) {
            // Orden descendente por puntos
            if ($a['puntos'] != $b['puntos']) {
                return $b['puntos'] <=> $a['puntos'];
            }
            // Orden ascendente por diferencia de goles
            if ($a['dif'] != $b['dif']) {
                return $a['dif'] <=> $b['dif'];
            }
            // Orden descendente por goles a favor
            return $b['gf'] <=> $a['gf'];
        })->values();


    return $tablaGeneral;
  }
}
