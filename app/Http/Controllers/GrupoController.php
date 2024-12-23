<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Color;
use App\Models\EquipoGrupo;
use App\Models\Liga;
use App\Models\Equipo;
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
      $grupo->zona = $copa == 'afa' && !$zona ? 'A' : $zona;
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
              case -1:
                switch($e->pos){
                  case 1: case 2: 
                    $e->estado = $grupo->completed ? 2 : $this->clasifica($e, $grupo);
                  break;
                  case 3:
                    if($grupo->zona == 'A'){
                      $e->estado = $grupo->completed ? 1 : $this->clasifica($e, $grupo);
                    }else{
                      $e->estado = $grupo->completed ? -1 : $this->clasifica($e, $grupo);
                    }
                    
                  break;
                  default:
                    $e->estado = $grupo->completed ? -1 : $this->clasifica($e, $grupo);
                  break;
                }
              break;
              case 0: case 1:
                switch($e->pos){
                  case 1: case 2: 
                    $e->estado = $grupo->completed ? 2 : $this->clasifica($e, $grupo);
                  break;
                  
                  default:
                    $e->estado = $grupo->completed ? -1 : $this->clasifica($e, $grupo);
                  break;
                }
              break;
              default:
                $e->estado = $grupo->completed ? ($e->pos == 1 ? 2 : -1) : 0;
              break;
            }
             
            $e->save();
          }
          
        break;
        case 'argentina':
          foreach($grupo->equiposTableOrder as $order => $e){
            $e->estado = $grupo->completed ? ($e->pos == 1 ? 2 : -1) : 0;
            $e->save();
          }
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
              default:
                $e->estado = $grupo->completed ? ($e->pos == 1 ? 2 : -1) : 0;
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
              default:
                $e->estado = $grupo->completed ? ($e->pos == 1 ? 2 : -1) : 0;
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
                      ->orderBy('e', 'desc')
                      ->orderBy('p')
                      ->get();

    return $equipos;
  }

  public function getTablaGeneral($anio, $copa, $fase, $zona = null){
    
    $colors = colorGrupo(100);

    $eqs = EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC'
                ])
                ->whereHas('grupo', function($query) use ($anio, $copa, $fase, $zona) {
                $query->where('anio', $anio)
                      ->where('copa', $copa)
                      ->where('fase', $fase);
                if($zona){
                  $query = $query->where('zona', $zona);
                }
                      
            })->orderBy('pos')
              ->orderBy('pts', 'desc')
              ->orderBy('d', 'desc')
              ->orderBy('gf', 'desc')
              ->orderBy('gc')
              ->orderBy('gv')
              ->orderBy('g', 'desc')
              ->orderBy('e', 'desc')
              ->orderBy('p')
              ->get()
              ->map(function($e, $index){
                $e->pos = $index + 1;
                return $e;
              });
      
    return [
                  [
                    'anio' => $anio,
                    'a' => $colors['a'],
                    'b' => $colors['b'],
                    'copa' => $copa,
                    'equipos_position' => $eqs,
                    'fase' => $fase,
                    'grupo' => 'tabla general',
                    'zona' => $zona,
                  
                  ]

    ];
        
  }

  public function getClasificadosSudLib($copa){
    $m = getMain();
    $anio = $m->anio;
    if($copa == 'sudamericana'){
      return EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC'
                ])
                ->where(function($query) {
                    $query->where('pos', 3)
                          ->whereHas('grupo', function($q) {
                              $q->where('copa', 'libertadores');
                          })
                          ->orWhere(function($q) {
                              $q->where('pos', '<', 3)
                                ->whereHas('grupo', function($q) {
                                    $q->where('copa', 'sudamericana');
                                });
                          });
                })
                ->whereHas('grupo', function($query) use ($anio) {
                    $query->where('anio', $anio);
                })->orderBy('pos')
                ->orderBy('pts', 'desc')
                ->orderBy('d', 'desc')
                ->orderBy('gf', 'desc')
                ->orderBy('gc')
                ->orderBy('gv')
                ->orderBy('g', 'desc')
                ->orderBy('e', 'desc')
                ->orderBy('p')
                ->get();
    }

    return EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC'
                ])
                ->where('pos', '<', 3)
                ->whereHas('grupo', function($query) use ($anio, $copa) {
                $query->where('anio', $anio)
                      ->where('copa', $copa)
                      ->where('fase', 0);
                      
            })->orderBy('pos')
              ->orderBy('pts', 'desc')
              ->orderBy('d', 'desc')
              ->orderBy('gf', 'desc')
              ->orderBy('gc')
              ->orderBy('gv')
              ->orderBy('g', 'desc')
              ->orderBy('e', 'desc')
              ->orderBy('p')
              ->get();
  }

  public function getClasificados($anio, $copa, $fase, $zona = null){
    $eqs = EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC',
                      'equipo'
                ])
                ->whereHas('grupo', function($query) use ($anio, $copa, $fase, $zona) {
                $query->where('anio', $anio)
                      ->where('copa', $copa)
                      ->where('fase', $fase);
                if($zona){
                  $query = $query->where('zona', $zona);
                }
                      
            })->orderBy('pos')
              ->orderBy('pts', 'desc')
              ->orderBy('d', 'desc')
              ->orderBy('gf', 'desc')
              ->orderBy('gc')
              ->orderBy('gv')
              ->orderBy('g', 'desc')
              ->orderBy('e', 'desc')
              ->orderBy('p')
              ->get();
              // ->map(function($e, $index){
              //   $e->pos = $index + 1;

              //   return $e;
              // });

      return $eqs;
      
  }

  public function getClasificadosLlaves($anio, $copa, $fase, $zona = null){
    return EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC',
                      'equipo'
                ])
                ->whereHas('grupo', function($query) use ($anio, $copa, $fase, $zona) {
                $query->where('anio', $anio)
                      ->where('copa', $copa)
                      ->where('fase', $fase);
                if($zona){
                  $query = $query->where('zona', $zona);
                }
                      
            })
              ->where('pos', 1)
              ->join('grupos', 'equipos_grupo.grupo_id', '=', 'grupos.id') // Unir la tabla `grupos`
              ->orderBy('grupos.grupo') // Ordenar por el campo `grupo.grupo`
              ->get(['equipos_grupo.*']) // Seleccionar las columnas deseadas
              ->load([
                  'equipo.colorA',
                  'equipo.colorB',
                  'equipo.colorC',
                  'equipo'
              ]);
  }

  public function getTablaAnual($filter_ids = null){
    
    $colors = colorGrupo(1000);
    $m = getMain();
    $anio = $m->anio;
    $eqs = EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC'
                ])
                ->select(
                          'equipo_id',
                          'estado',
                          DB::raw('SUM(j) as j'),
                          DB::raw('SUM(g) as g'),
                          DB::raw('SUM(e) as e'),
                          DB::raw('SUM(p) as p'),
                          DB::raw('SUM(gf) as gf'),
                          DB::raw('SUM(gc) as gc'),
                          DB::raw('SUM(gv) as gv'),
                          DB::raw('SUM(d) as d'),
                          DB::raw('SUM(pts) as pts')
                        )
                ->whereHas('grupo', function($query) use ($anio) {
                $query->where('anio', $anio)
                      ->where('copa', 'afa')
                      ->where('fase', '<', 2);
            })->groupBy('equipo_id')
              //->orderBy('pos')
              ->orderBy('pts', 'desc')
              ->orderBy('d', 'desc')
              ->orderBy('gf', 'desc')
              ->orderBy('gc')
              ->orderBy('gv')
              ->orderBy('g', 'desc')
              ->orderBy('e', 'desc')
              ->orderBy('p')
              ->orderBy('j', 'desc');

  if($filter_ids){
    $eqs = $eqs->whereNotIn('equipo_id', $filter_ids);
    //sql($eqs);
      return $eqs->get()->pluck('equipo_id')->toArray();
    
  }
              
   $eqs = $eqs->get()
              ->map(function($e, $index){
                $e->pos = $index + 1;
                $e->estado = 0;
                return $e;
              });
      
    $grupos = json_encode([
                  [
                    'anio' => $anio,
                    'a' => $colors['a'],
                    'b' => $colors['b'],
                    'copa' => 'afa',
                    'equipos_position' => $eqs,
                    'fase' => 0,
                    'grupo' => 'tabla anual',
                    'zona' => null,
                  
                  ]

    ]);
   
     return view('home.copa', ['copa' => 'afa', 'fase' => 0, 'zona' => null, 'grupos' => $grupos]);   
  }

  public function candidatos($copa, $zona = null){
    
    $colors = colorGrupo(200);
    $m = getMain();
    $anio = $m->anio;
    $eqs = EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC'
                ])
                ->select(
                          'equipo_id',
                          'estado',
                          DB::raw('SUM(j) as j'),
                          DB::raw('SUM(g) as g'),
                          DB::raw('SUM(e) as e'),
                          DB::raw('SUM(p) as p'),
                          DB::raw('SUM(gf) as gf'),
                          DB::raw('SUM(gc) as gc'),
                          DB::raw('SUM(gv) as gv'),
                          DB::raw('SUM(d) as d'),
                          DB::raw('SUM(pts) as pts')
                        )
                ->whereHas('grupo', function($query) use ($anio, $copa, $zona) {
                $query->where('anio', $anio)
                      ->where('copa', $copa);  

                 if($zona){
                    $query->where('zona', $zona);
                 }     
            })->groupBy('equipo_id')
              ->orderBy('pos')
              ->orderBy('pts', 'desc')
              ->orderBy('d', 'desc')
              ->orderBy('gf', 'desc')
              ->orderBy('gc')
              ->orderBy('gv')
              ->orderBy('g', 'desc')
              ->orderBy('e', 'desc')
              ->orderBy('p')
              ->get()
              ->map(function($e, $index){
                $e->pos = $index + 1;
                $e->estado = 0;
                return $e;
              });

    $maxPts = $eqs->max('pts');
    $eqs = $eqs->filter(function($e) use ($maxPts) {
        return $e->pts == $maxPts;
    });
      
    $grupos = json_encode([
                  [
                    'anio' => $anio,
                    'a' => $colors['a'],
                    'b' => $colors['b'],
                    'copa' => $copa,
                    'equipos_position' => $eqs,
                    'fase' => 0,
                    'grupo' => 'candidatos',
                    'zona' => $zona,
                  
                  ]

    ]);
   
     return view('home.copa', ['copa' => $copa, 'fase' => 0, 'zona' => null, 'grupos' => $grupos]);   
  }


  public function getWaitAfaA($anio){
    $equipos = $this->getClasificados($anio, 'afa', 1, 'A');
    $eqs = [];
    for($i = 4; $i < 8; $i++){
      $eqs[] = $equipos[$i];
    }

    return $eqs;
  }

  public function llavero($copa, $zona = null){
    $m = getMain();
    $desde = 1;
    $fases = [];
    if($copa == 'afa'){
      $desde = $zona == 'A' ? 4 : 2;
    }

    for($f = $desde; $f <= 5; $f++){
      $fases[] = [
                    'fase' => $f,
                    'keys' => $this->getGrupos($m->anio, $copa, $f, $zona)->map(function($g){
                        return $g->equiposPosition->map(function($e){
                          $eq = $e->getRelation('equipo');
                          return [
                            'name' => $eq->name,
                            'directory' => $eq->directory.'escudo.png'
                          ];
                        });
                    })
                  ];
    }


    return $fases;

    
  }

  private function getCampeon($anio, $copa, $zona = null){
    return EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC'
                ])
                ->whereHas('grupo', function($query) use ($anio, $copa, $zona) {
                $query->where('completed', true)
                      ->where('anio', $anio)
                      ->where('copa', $copa)  
                      ->where('fase', 5);  

                 if($zona){
                    $query->where('zona', $zona);
                 }     
            })
              ->where('pos', 1)
              ->first();
  }


  public function estadisticas($copa, $zona = null){
    $m = getMain();
    $campeon = $this->getCampeon($m->anio, $copa, $zona);
    
    return view('home.estadisticas', compact('campeon', 'copa', 'zona'));
  }

  private function maxPartidos($campeon, $anio, $copa, $zona){
    $e = EquipoGrupo::select(
                          'equipo_id',
                          DB::raw('SUM(j) as j'),
                         
                        )
                        ->whereHas('grupo', function($query) use ($anio, $copa, $zona) {
                                    $query->where('anio', $anio)
                                          ->where('copa', $copa);  
                                    if($zona){
                                      $query = $query->where('zona', $zona);
                                    }     
                                })
                        ->where('equipo_id', $campeon->equipo_id)
                        ->groupBy('equipo_id')
                        ->first();

    return $e->j;

  }

  public function estadisticasEquipos($copa, $filter, $zona = null){
    $m = getMain();
    $anio = $m->anio;
    $campeon = $this->getCampeon($anio, $copa, $zona);
    $maxJ = $this->maxPartidos($campeon, $anio, $copa, $zona);
    
    $eqs = EquipoGrupo::with([
                      'equipo.colorA',
                      'equipo.colorB',
                      'equipo.colorC'
                ])
                ->select(
                          'equipo_id',
                          'estado',
                          DB::raw('SUM(j) as j'),
                          DB::raw('SUM(g) as g'),
                          DB::raw('SUM(e) as e'),
                          DB::raw('SUM(p) as p'),
                          DB::raw('SUM(gf) as gf'),
                          DB::raw('SUM(gc) as gc'),
                          DB::raw('SUM(gv) as gv'),
                          DB::raw('SUM(d) as d'),
                          DB::raw('SUM(pts) as pts')
                        )
                ->whereHas('grupo', function($query) use ($anio, $copa, $zona) {
                $query->where('anio', $anio)
                      ->where('copa', $copa);  
                if($zona){
                  $query = $query->where('zona', $zona);
                }     
            })
            ->groupBy('equipo_id');

    switch($filter){
      case 'posiciones':
        $eqs = $this->posicionesFinales($eqs);

      break;
      case 'mejor-equipo': 
        $eqs = $this->mejorEquipo($eqs);
      break;
      case 'mas-goleador':
        $eqs = $this->masGoleador($eqs);
      break;
      case 'mas-efectivo':
        $efs = $this->efectivo($eqs, $maxJ, true);
        $ids = array_column($efs, 'equipo_id');
        
        $eqs= $eqs->whereIn('equipo_id', $ids);

      break;
      case 'mejor-valla':
        $eqs = $this->mejorValla($eqs);
      break;
      case 'peor-valla':
        $eqs = $this->peorValla($eqs);
      break;
      case 'menos-efectivo':
        $efs = $this->efectivo($eqs, $maxJ, false);
        $ids = array_column($efs, 'equipo_id');
        
        $eqs= $eqs->whereIn('equipo_id', $ids);

      break;
      case 'menos-goleador':
        $eqs = $this->menosGoleador($eqs);
      break;
      case 'peor-equipo': 
        $eqs = $this->peorEquipo($eqs);
      break;
    }
    //sql($eqs);
    $eqs = $eqs->get()
                ->map(function($e, $index){
                  $e->pos = $index + 1;
                  $e->estado = 0;
                  
                  return $e;
              });
    if($filter == 'posiciones'){ 
      if($campeon->equipo_id == $eqs[1]->equipo_id){
            $aux = $eqs[1];
            $eqs[1] = $eqs[0];
            $eqs[0] = $aux;
      }
    }
    
    if($filter == 'mas-efectivo' || $filter == 'menos-efectivo'){
      $efectivos = [];
      foreach($eqs as $e){
        $ef = array_filter($efs, function($item) use ($e) {
                  return $item['equipo_id'] === $e->equipo_id;
              });
        if(count($ef)){
          if(!isset($ef[0])){
            continue;
          }
          $e->gxp = $ef[0]['efectividad'];
          $efectivos[] = $e;
        }
        // if (is_array($ef) && count($ef) > 0) {
        //       if (isset($ef[0]['efectividad'])) {
        //           $e->gxp = $ef[0]['efectividad'];
        //           $efectivos[] = $e;
        //       }
        //   }
      }
      $eqs = $efectivos;
      
    }
    $colors = colorGrupo(300);
    $grupos = json_encode([
                  [
                    'anio' => $anio,
                    'a' => $colors['a'],
                    'b' => $colors['b'],
                    'copa' => 'afa',
                    'equipos_position' => $eqs,
                    'fase' => 0,
                    'grupo' => 'posiciones finales',
                    'zona' => null,
                  
                  ]

    ]);
        
     return view('home.copa', ['copa' => $copa, 'fase' => 0, 'zona' => $zona, 'grupos' => $grupos, 'filter' => $filter]);   
  }


  private function posicionesFinales($eqs){
     return $eqs->orderBy('j', 'desc')
                ->orderBy('pts', 'desc')
                ->orderBy('d', 'desc')
                ->orderBy('gf', 'desc')
                ->orderBy('gc')
                ->orderBy('gv')
                ->orderBy('g', 'desc')
                ->orderBy('e', 'desc')
                ->orderBy('p');
  }

  private function mejorEquipo($eqs){
     $query = $eqs
                ->orderBy('pts', 'desc')
                ->orderBy('d', 'desc')
                ->orderBy('gf', 'desc')
                ->orderBy('gc')
                ->orderBy('gv')
                ->orderBy('g', 'desc')
                ->orderBy('e', 'desc')
                ->orderBy('p')
                ->orderBy('j', 'desc');
     $first = clone $query;
     $e = $first->first();
      return $query
                  ->having('pts', $e->pts)
                  ->orderBy('pts', 'desc')
                  ->orderBy('d', 'desc')
                  ->orderBy('gf', 'desc')
                  ->orderBy('gc')
                  ->orderBy('gv')
                  ->orderBy('g', 'desc')
                  ->orderBy('e', 'desc')
                  ->orderBy('p')
                  ->orderBy('j', 'desc');
  }

  private function masGoleador($eqs){
     $query = $eqs
                ->orderBy('gf', 'desc')
                ->orderBy('pts', 'desc')
                ->orderBy('d', 'desc')
                ->orderBy('gc')
                ->orderBy('gv')
                ->orderBy('g', 'desc')
                ->orderBy('e', 'desc')
                ->orderBy('p')
                ->orderBy('j', 'desc');
     $first = clone $query;
     $e = $first->first();
      return $query
                  ->having('gf', $e->gf)
                  ->orderBy('gf', 'desc')
                  ->orderBy('pts', 'desc')
                  ->orderBy('d', 'desc')
                  ->orderBy('gc')
                  ->orderBy('gv')
                  ->orderBy('g', 'desc')
                  ->orderBy('e', 'desc')
                  ->orderBy('p')
                  ->orderBy('j', 'desc');
  }


  private function efectividad($eq, $j){
     return round(($eq->gf / $j), 2);
  }

  private function efectivo($eqs, $max, $mas){
    $efs = [];
    $equipos = clone $eqs;
    $equipos = $equipos->get();
    foreach($equipos as $e){
      $efs[] = [
                  'equipo_id' => $e->equipo_id,
                  'efectividad' => $this->efectividad($e, $max)
                ];
    }

    $ls = count($efs) - 1;
    while($ls > 0){
      for($i = 0; $i < $ls; $i++){
        $a = $efs[$i];
        $b = $efs[$i+1];
        if($mas){
          if($a['efectividad'] < $b['efectividad']){
            $efs[$i] = $b;
            $efs[$i +1] = $a;
          }
        }else{
          if($a['efectividad'] > $b['efectividad']){
            $efs[$i] = $b;
            $efs[$i +1] = $a;
          }
        }
        
      }
      $ls--;
    }

    $eqs = [];
    $e = $efs[0]['efectividad'];
    
    foreach($efs as $ef){
      if($ef['efectividad'] == $e){
        $eqs[] = $ef;
      }
    }
    return $eqs;
  }

  private function mejorValla($eqs){
     $query = $eqs
                ->orderBy('gc')
                ->orderBy('j', 'desc');
     $first = clone $query;
     $e = $first->first();
      return $query
                  ->having('gc', $e->gc)
                  ->having('j', $e->j)
                  ->orderBy('gc')
                  ->orderBy('j', 'desc');
  }

  private function peorValla($eqs){
     $query = $eqs
                ->orderBy('gc', 'desc')
                ->orderBy('j');
     $first = clone $query;
     $e = $first->first();
      return $query
                  ->having('gc', $e->gc)
                  ->having('j', $e->j)
                  ->orderBy('gc', 'desc')
                  ->orderBy('j');
  }


  private function menosGoleador($eqs){
     $query = $eqs
                ->orderBy('gf')
                ->orderBy('pts', 'desc')
                ->orderBy('d', 'desc')
                ->orderBy('gc')
                ->orderBy('gv')
                ->orderBy('g', 'desc')
                ->orderBy('e', 'desc')
                ->orderBy('p')
                ->orderBy('j', 'desc');
     $first = clone $query;
     $e = $first->first();
      return $query
                  ->having('gf', $e->gf)
                  ->orderBy('gf')
                  ->orderBy('pts', 'desc')
                  ->orderBy('d', 'desc')
                  ->orderBy('gc')
                  ->orderBy('gv')
                  ->orderBy('g', 'desc')
                  ->orderBy('e', 'desc')
                  ->orderBy('p')
                  ->orderBy('j', 'desc');
  }


  private function peorEquipo($eqs){
     $query = $eqs
                ->orderBy('pts')
                ->orderBy('d')
                ->orderBy('gf', 'desc')
                ->orderBy('gc', 'desc')
                ->orderBy('gv')
                ->orderBy('p', 'desc')
                ->orderBy('e')
                ->orderBy('g')
                ->orderBy('j');
                
                
                
     $first = clone $query;
     $e = $first->first();
      return $query
                  ->having('pts', $e->pts)
                  ->orderBy('pts')
                  ->orderBy('d')
                  ->orderBy('gf', 'desc')
                  ->orderBy('gc', 'desc')
                  ->orderBy('gv')
                  ->orderBy('p', 'desc')
                  ->orderBy('e')
                  ->orderBy('g')
                  ->orderBy('j');
  }


  public function enCompetencia($copa, $zona = null){
    $m = getMain();
    $anio = $m->anio;
    $array_ligas = Liga::orderBy('id')->get();
    $ligas = [];
    $desde = 5;

    switch($copa){
      case 'afa':
        switch($zona){
          case 'a':
            $desde = -2;
          break;
          case 'b':
            $desde = -1;
          break;
          case 'c':
            $desde = 0;
          break;
        }
      break;
      case 'argentina':
        $desde = 1;
      break;
      case 'sudamericana': case 'libertadores':
        $desde = 0;
      break;
    }
    foreach($array_ligas as $liga){
      $data = [
                'data' => $liga,
                'fases' => []
        ];
      for($f = $desde; $f <= 5; $f++){
        if($copa == 'afa' && ($f == 2 || $f == 3)){
          continue;
        }
        
        $eqs = EquipoGrupo::with([
                                'equipo.colorA',
                                'equipo.colorB',
                                'equipo.colorC'
                          ])
                          ->whereHas('grupo', function($query) use ($anio, $copa, $f, $zona) {
                              $query->where('anio', $anio)
                                    ->where('copa', $copa)
                                    ->where('fase', $f); 
                              if($zona){
                                $query = $query->where('zona', $zona);
                              }     
                          })->whereHas('equipo', function($query) use ($liga) {
                              $query->where('liga_id', $liga->id);
                          })
                          ->get()
                          ->map(function($e){
                            return $e->load('equipo.colorA', 'equipo.colorB', 'equipo.colorC')->getRelation('equipo');
                          });
        $data['fases'][] = ['fase' => $f, 'equipos' => $eqs];
        
      }
      $ligas[] = $data;
      
    }

    $ligas = json_encode($ligas);
    return view('home.competencia', compact('copa', 'zona', 'ligas'));
  }

  private function liberaCupo($id, $cupos){
    $m = getMain();
    $copas = [
                $this->getCampeon($m->anio, 'libertadores')->equipo_id,
                $this->getCampeon($m->anio, 'sudamericana')->equipo_id
            ];

    if(in_array($id, $copas) || in_array($id, $cupos)){
      return true;
    }

    return false;

  }


  private function getEquiposByPos($anio, $copa, $fase, $pos, $zona = null){
    return EquipoGrupo::whereHas('grupo', function($query) use ($anio, $copa, $fase, $zona) {
                $query->where('completed', true)
                      ->where('anio', $anio)
                      ->where('copa', $copa)  
                      ->where('fase', $fase);  

                 if($zona){
                    $query->where('zona', $zona);
                 }     
            })
              ->where('pos', $pos)
              ->orderBy('pts')
              ->orderBy('d')
              ->orderBy('gf', 'desc')
              ->orderBy('gc', 'desc')
              ->orderBy('gv')
              ->orderBy('p', 'desc')
              ->orderBy('e')
              ->orderBy('g')
              ->get()
              ->pluck('equipo_id');
  }

  private function showClasificadosAfa($ids){
    dump('************************LIBERTADORES**************************');
    foreach($ids as $key => $id){
      if($key == 8){
        dump('************************SUDAMERICANA**************************');
      }
      $e = Equipo::find($id);
      dump($e->name);
    }
    dd('--------------------------------------------------------------------------');
  }


  public function getClasificadosNextAnio(){
    $m = getMain();
    $a_id = $this->getCampeon($m->anio, 'afa', 'A')->equipo_id;
    $b_id = $this->getCampeon($m->anio, 'afa', 'B')->equipo_id;
    $c_id = $this->getCampeon($m->anio, 'afa', 'C')->equipo_id;
    $arg_id = $this->getCampeon($m->anio, 'argentina')->equipo_id;
    $campeones = [
                    'lib' => $this->getCampeon($m->anio, 'libertadores')->equipo_id,
                    'sud' => $this->getCampeon($m->anio, 'sudamericana')->equipo_id,
                    'rec' => $this->getCampeon($m->anio, 'recopa')->equipo_id,
                    'afa_a' => $a_id,
                    'afa_b' => $b_id,
                    'afa_c' => $c_id,
                    'arg' => $arg_id
                  ];
    $cupos = [];
    $a_sub = $this->getEquiposByPos($m->anio, 'afa', 5, 2, 'A')[0];
    $b_sub = $this->getEquiposByPos($m->anio, 'afa', 5, 2, 'B')[0];
    $c_sub = $this->getEquiposByPos($m->anio, 'afa', 5, 2, 'C')[0];
    $a_semis = $this->getEquiposByPos($m->anio, 'afa', 4, 2, 'A');
    $b_semis = $this->getEquiposByPos($m->anio, 'afa', 4, 2, 'B');
    $clasificados = [
                      $a_id, 
                      $b_id, 
                      $arg_id, 
                      $c_id,
                      $a_sub,
                      $b_sub,
                      $a_semis[0],
                      $a_semis[1],
                      $c_sub,
                      $b_semis[0],
                      $b_semis[1],

                    ];

    $eqs = $this->getTablaAnual($clasificados);
    
    $clasificados = array_unique(array_merge($clasificados, $eqs));
    
    foreach($clasificados as $c){
      if(!$this->liberaCupo($c, $cupos)){
        $cupos[] = $c;
        if(count($cupos) == 12){
          break;
        }
      }
    }

    $this->showClasificadosAfa($cupos);
        
  }

  public function clasificadosAfa(){
    $m = getMain();
    $ids = $this->getEquiposByPos($m->anio, 'afa', 4, 1, 'A')->toArray();
    $eqs = [];
    if(count($ids)){
      foreach($ids as $id){
        $eqs[] = [
                    'data' => Equipo::with(['colorA', 'colorB', 'colorC'])->find($id),
                    'medio' => 'A - FINAL'
                  ];
      }
    }
    $ids = array_merge($ids, $this->getEquiposByPos($m->anio, 'afa', 4, 2, 'A')->toArray());
    if(count($ids)){
      foreach($ids as $id){
        $eqs[] = [
                    'data' => Equipo::with(['colorA', 'colorB', 'colorC'])->find($id),
                    'medio' => 'A - SEMIFINAL'
                  ];
      }
    }

    if(count($this->getEquiposByPos($m->anio, 'afa', 5, 1, 'B')->toArray())){
      $ids = $this->getEquiposByPos($m->anio, 'afa', 4, 1, 'B')->toArray();
      if(count($ids)){
        foreach($ids as $id){
          $eqs[] = [
                      'data' => Equipo::with(['colorA', 'colorB', 'colorC'])->find($id),
                      'medio' => 'B - FINAL'
                    ];
        }
      }
    }

    $arg = $this->getCampeon($m->anio, 'argentina');
    if($arg){
      $eqs[] = [
                  'data' => Equipo::with(['colorA', 'colorB', 'colorC'])->find($arg->equipo_id),
                  'medio' => 'ARGENTINA'
                ];
    }

    if(count($this->getEquiposByPos($m->anio, 'afa', 5, 1, 'B')->toArray())){
      $ids = $this->getEquiposByPos($m->anio, 'afa', 4, 2, 'B')->toArray();
      if(count($ids)){
        foreach($ids as $id){
          $eqs[] = [
                      'data' => Equipo::with(['colorA', 'colorB', 'colorC'])->find($id),
                      'medio' => 'B - SEMIFINAL'
                    ];
        }
      }
    }

    if(count($this->getEquiposByPos($m->anio, 'afa', 5, 1, 'C')->toArray())){
      $ids = $this->getEquiposByPos($m->anio, 'afa', 5, 1, 'C')->toArray();
      if(count($ids)){
        foreach($ids as $id){
          $eqs[] = [
                      'data' => Equipo::with(['colorA', 'colorB', 'colorC'])->find($id),
                      'medio' => 'C - CAMPEON'
                    ];
        }
      }

      $ids = $this->getEquiposByPos($m->anio, 'afa', 5, 2, 'C')->toArray();
      if(count($ids)){
        foreach($ids as $id){
          $eqs[] = [
                      'data' => Equipo::with(['colorA', 'colorB', 'colorC'])->find($id),
                      'medio' => 'C - SUBCAMPEON'
                    ];
        }
      }
    }
    dd($eqs);
    // fase 4: semifinalistas A => lib 
    // fase 5: no definida: finalistas B => lib, semifinalistas B => sud
    // dase 5: definida: campeon C => lib, subcampeon C => sud, campeon Argentina => lib, primero anual => sud
    return view('home.clasificados-afa');
  }
              
             
}
