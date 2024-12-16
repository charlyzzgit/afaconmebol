<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Equipo;
use App\Models\Partido;
use DB;

class PartidoController extends Controller
{   

  private function getFixture($count_equipos){
      return $count_equipos == 4 ? [
                    array(['loc' => 3, 'vis' => 0 ], ['loc' => 2, 'vis' => 1 ]),
                    array(['loc' => 0, 'vis' => 2 ], ['loc' => 1, 'vis' => 3 ]),
                    array(['loc' => 1, 'vis' => 0 ], ['loc' => 3, 'vis' => 2 ]),
                    array(['loc' => 0, 'vis' => 1 ], ['loc' => 2, 'vis' => 3 ]),
                    array(['loc' => 2, 'vis' => 0 ], ['loc' => 3, 'vis' => 1 ]),
                    array(['loc' => 0, 'vis' => 3 ], ['loc' => 1, 'vis' => 2 ])
      ] : [
            array(['loc' => 1, 'vis' => 0 ]),
            array(['loc' => 0, 'vis' => 1 ]),
          ];
   }



    public function create($grupo_id){
      $grupo = Grupo::with('equiposDefault')->find($grupo_id);
      $fix = $this->getFixture(count($grupo->equiposDefault));
      $count = count($grupo->equiposDefault);
      foreach($fix as $f => $fecha){
        foreach($fecha as $p){
          $loc = $grupo->equiposDefault[$p['loc']];
          $vis = $grupo->equiposDefault[$p['vis']];
          $partido = new Partido();
          $partido->grupo_id = $grupo->id;
          $partido->loc_id = $loc->equipo_id;
          $partido->vis_id = $vis->equipo_id;
          $partido->local = $loc->equipo;
          $partido->visitante = $vis->equipo;
          $partido->anio = $grupo->anio;
          $partido->copa = $grupo->copa;
          $partido->fase = $grupo->fase;
          $partido->fecha = $f + 1;
          $partido->zona = $grupo->zona;
          $partido->is_define = $count == 2 ? true : false;
          $partido->is_vuelta = $count == 2 && ($f + 1) == 2 || $count == 4 && ($f + 1) > 3 ? true : false;
          $partido->is_final = $grupo->fase == 5 ? true : false;
          $partido->relevancia = $loc->nivel + $vis->nivel;
          $partido->save();  
        }
      }
    }


    public function cronograma($copa, $fase, $zona = null){
      $m = getMain();
      
      if($copa == 'recopa'){
        $partidos = Partido::where('anio', $m->anio)
                         ->where('copa', $copa)
                         ->where('fase', $fase)
                         ->get();
        foreach($partidos as $p){
            $p->dia = 2;
            $p->hora = 21;
            $p->save();
          }
      }else{
        $max = $this->getCantFechas($m->anio, $copa, $fase, $zona);
        for($f = 1; $f <= $max; $f++){
          $partidos = Partido::where('anio', $m->anio)
                         ->where('copa', $copa)
                         ->where('fase', $fase)
                         ->where('fecha', $f);
          if($zona){
            $partidos = $partidos->where('zona', $zona);
          }

          if($copa == 'afa'){
              $partidos = $partidos->orderBy('relevancia', 'desc')->get();
              $dias = getHorarioAfa($partidos->count());
              foreach($partidos as $index => $p){
                $d = $dias[$index];
                $p->dia = $d['dia'];
                $p->hora = $d['hora'];
                $p->save();
              }
          }else{
            $partidos = $partidos->orderBy('id')->get();
            foreach($partidos as $index => $p){
                $grupo = Grupo::find($p->grupo_id);
                $p->dia = getDia($grupo);
                $p->hora = getHora($grupo);
                $p->save();
              }
          }
        }
      }
    }

    private function getCantFechas($anio, $copa, $fase, $zona = null){
      $partidos = Partido::where('anio', $anio)
                         ->where('copa', $copa)
                         ->where('fase', $fase);
      if($zona){
        $partidos = $partidos->where('zona', $zona);
      }

      return $partidos->groupBy('fecha')->count();

    }

    public function nextPartido($anio, $copa, $fase, $fecha, $zona = null){
      $p = Partido::with([
                            'grupo',
                            'local.colorA',
                            'local.colorB',
                            'local.colorC',
                            'local.liga',
                            'visitante.colorA',
                            'visitante.colorB',
                            'visitante.colorC'
                        ])
                        ->where('anio', $anio)
                        ->where('copa', $copa)
                        ->where('fase', $fase)
                        ->where('fecha', $fecha);
      if($zona){
        $p = $p->where('zona', $zona);
      }

      $p = $p->where('is_jugado', false)
             ->orderBy('dia')
             ->orderBy('hora')
             ->first();
      return $p;
    }

  public function getIda($partido_id){
    $vuelta = Partido::find($partido_id);
   
    $ida = Partido::where('grupo_id', $vuelta->grupo_id)
                  ->where('is_vuelta', false)
                  ->where('loc_id', $vuelta->vis_id)
                  ->where('vis_id', $vuelta->loc_id)
                  ->first();
    return $ida;
  }


  public function index($copa_zona, $fase, $grupo_id = null){
    $m = getMain();
    $copa = copaZona($copa_zona, 0);
    $zona = copaZona($copa_zona, 1);

    $partidos = Partido::with([
                                'grupo',
                                'local.colorA',
                                'local.colorB',
                                'local.colorC',
                                'local.liga',
                                'local.camiseta',
                                'local.alternativa',
                                'visitante.colorA',
                                'visitante.colorB',
                                'visitante.colorC',
                                'visitante.camiseta',
                                'visitante.alternativa'
                              ])
                              ->where('anio', $m->anio)
                              ->where('copa', $copa)
                              ->where('fase', $fase);

    if($zona){
      $partidos = $partidos->where('zona', $zona);
    }

    $partidos = $partidos->orderBy('fecha')
                         ->orderBy('dia')
                         ->orderBy('hora')
                         ->get()
                         ->map(function($row){
                            $colors = colorGrupo($row->grupo->grupo);
                            $row->a = $colors['a'];
                            $row->b = $colors['b'];
                            $row->detalle = $row->detalle ? json_decode($row->detalle) : [];
                            return $row;
                         });

                        
    return view('home.partidos', compact('copa', 'fase', 'zona', 'partidos'));
  }

  public function estadio($partido_id){
    $partido = Partido::with([
                                'grupo',
                                'local.colorA',
                                'local.colorB',
                                'local.colorC',
                                'local.liga',
                                'local.camiseta',
                                'local.alternativa',
                                'visitante.colorA',
                                'visitante.colorB',
                                'visitante.colorC',
                                'visitante.camiseta',
                                'visitante.alternativa'
                              ])
                              ->find($partido_id);
    return view('home.estadio', compact('partido'));
  }

  public function updatePartido($data){
    $partido = Partido::find($data->id);

    $partido->gl = $data->gl;
    $partido->gv = $data->gv;
    if($data->pa && $data->pb){
      $partido->pa = $data->pa;
      $partido->pb = $data->pb;
    }
    $partido->is_jugado = true;
    $partido->detalle = json_encode($data->detalle);
    $partido->winner_id = $data->winner_id;

    $partido->d = abs($data->gl - $data->gv);
    $partido->s = $data->gl + $data->gv;

    $partido->save();
  }

  public function partidosEquipoGrupo($equipo_id, $grupo_id){
    $grupo = Grupo::find($grupo_id);
    $equipo = Equipo::with([
                            'colorA',
                            'colorB',
                            'colorC'
                          ])
                          ->find($equipo_id);

    $partidos = Partido::with([
                                'grupo',
                                'local.colorA',
                                'local.colorB',
                                'local.colorC',
                                'local.liga',
                                'local.camiseta',
                                'local.alternativa',
                                'visitante.colorA',
                                'visitante.colorB',
                                'visitante.colorC',
                                'visitante.camiseta',
                                'visitante.alternativa'
                              ])
                              ->where('grupo_id', $grupo_id)
                              ->where(function($q) use($equipo_id){
                                  $q->where('loc_id', $equipo_id)
                                    ->orWhere('vis_id', $equipo_id);
                              });
                              

    

    $partidos = $partidos->orderBy('fecha')
                         ->orderBy('dia')
                         ->orderBy('hora')
                         ->get()
                         ->map(function($row){
                            $colors = colorGrupo($row->grupo->grupo);
                            $row->a = $colors['a'];
                            $row->b = $colors['b'];
                            return $row;
                         });


    return view('home.partidos', ['equipo' => $equipo, 'copa' => $grupo->copa, 'fase' => $grupo->fase, 'zona' => $grupo->zona, 'partidos' => $partidos]);
  }


  public function estadisticas($copa_zona, $filter, $equipo_id = null){
    $m = getMain();
    $copa = copaZona($copa_zona, 0);
    $zona = copaZona($copa_zona, 1);
    $fase = 500;

    $partidos = Partido::with([
                                'grupo',
                                'local.colorA',
                                'local.colorB',
                                'local.colorC',
                                'local.liga',
                                'local.camiseta',
                                'local.alternativa',
                                'visitante.colorA',
                                'visitante.colorB',
                                'visitante.colorC',
                                'visitante.camiseta',
                                'visitante.alternativa'
                              ])
                              ->where('anio', $m->anio)
                              ->where('copa', $copa);



    if($zona){
      $partidos = $partidos->where('zona', $zona);
    }

    $partidos = $this->filterPartidos($partidos, $filter, $equipo_id);
//sql($partidos);
    $partidos = $partidos->get()
                         ->map(function($row){
                            $colors = colorGrupo($row->grupo->grupo);
                            $row->a = $colors['a'];
                            $row->b = $colors['b'];
                            $row->detalle = $row->detalle ? json_decode($row->detalle) : [];
                            return $row;
                         });
    $equipo = Equipo::with([
                  'colorA',
                  'colorB',
                  'colorC',
                  'liga'
                ])
                 ->find($equipo_id);
                        
    return view('home.partidos', compact('copa', 'fase', 'zona', 'partidos', 'filter', 'equipo'));
  }

  private function filterPartidos($partidos, $filter, $equipo_id = null){

    switch($filter){
      case 'campania':
        $partidos = $partidos->where(function($q) use($equipo_id){
          $q->where('loc_id', $equipo_id)
            ->orWhere('vis_id', $equipo_id);
        });

      break;
      case 'mejor-partido':
        
        $s = 5;
        while($s > 0){
          $p = clone $partidos;
          $p->where('s', '>=', $s)
            ->where('d', '<=', 2)
            ->orderBy('s', 'desc')
            ->orderBy('d');
          if($p->count()){
            $partidos = $p;
            break;
          }else{
            $s--;
          }
        }

        //sql($partidos);
      case 'maxima-goleada':
        $query = $partidos->orderBy('d', 'desc')
                          ->orderBy('s');
        $first = clone $query;
        $p = $first->first();
         $query->having('d', $p->d)     
               ->orderBy('d', 'desc')
               ->orderBy('s')  
               ->orderBy('dia', 'desc')
               ->orderBy('hora', 'desc');
      break;
      case 'mas-goles':
        $query = $partidos->orderBy('s', 'desc')
                          ->orderBy('d');
        $first = clone $query;
        $p = $first->first();
         $query->having('s', $p->s)     
               ->orderBy('s', 'desc')
               ->orderBy('d')  
               ->orderBy('dia', 'desc')
               ->orderBy('hora', 'desc');
      break;
      case 'peor-partido':
        $query = $partidos->orderBy('s')
                          ->orderBy('d');
        $first = clone $query;
        $p = $first->first();
         $query->having('s', $p->s)     
               ->orderBy('s')
               ->orderBy('d')  
               ->orderBy('dia', 'desc')
               ->orderBy('hora', 'desc');
      break;
      case 'all':

      break;
      default:
        $partidos = $partidos->where('fase', -10);
      break;


      $partidos = $partidos->orderBy('fase')
                           ->orderBy('fecha')
                           ->orderBy('dia')
                           ->orderBy('hora');
    }
    
    return $partidos;
  }
}
