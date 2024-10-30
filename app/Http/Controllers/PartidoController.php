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
      $grupo = Grupo::with('equipos_default')->find($grupo_id);
      $fix = $this->getFixture(count($grupo->equipos_default));
      foreach($fix as $f => $fecha){
        foreach($fecha as $p){
          $loc = $grupo->equipos_default[$p['loc']];
          $vis = $grupo->equipos_default[$p['vis']];
          $partido = new Partido();
          $partido->grupo_id = $grupo->id;
          $partido->loc_id = $loc->equipo_id;
          $partido->vis_id = $vis->equipo_id
          $partido->local = $loc->equipo;
          $partido->visitante = $vis->equipo;
          $partido->anio = $grupo->anio;
          $partido->copa = $grupo->copa;
          $partido->fase = $grupo->fase;
          $partido->fecha = $f + 1;
          $partido->zona = $grupo->zona;
          $partido->relevancia = $loc->nivel + $vis->nivel;
          $partido->save();  
        }
      }
    }
}
