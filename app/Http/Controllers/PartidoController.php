<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Partido;

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
          $partido->is_define = $count == 2 && ($f + 1) == 2 ? true : false;
          $partido->is_vuelta = $count == 2 && ($f + 1) == 2 || $count == 4 && ($f + 1) > 3 ? true : false;
          $partido->is_final = $grupo->fase == 5 ? true : false;
          $partido->relevancia = $loc->nivel + $vis->nivel;
          $partido->save();  
        }
      }
    }


    public function cronograma($copa, $fase, $zona = null){
      $m = getMain();
      $partidos = Partido::where('anio', $m->anio)
                         ->where('copa', $copa)
                         ->where('fase', $fase);
      if($zona){
        $partidos = $partidos->where('zona', $zona);
      }

      $partidos = $partidos->get();
      switch($copa){
        case 'recopa':
          foreach($partidos as $p){
            $p->dia = 2;
            $p->hora = 21;
            $p->save();
          }
        break;
      }
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
}
