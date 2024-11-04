<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Color;
use App\Models\EquipoGrupo;
use App\Models\Liga;
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


    private function colorGrupo($gp){
      switch($gp){
        case 1: return [ 'a' => Color::where('name', 'rojo')->first(), 'b' => Color::where('name', 'naranja')->first()];
        case 2: return [ 'a' => Color::where('name', 'azul')->first(), 'b' => Color::where('name', 'celeste')->first()];
        case 3: return [ 'a' => Color::where('name', 'verde')->first(), 'b' => Color::where('name', 'verdeclaro')->first()];
        case 4: return [ 'a' => Color::where('name', 'amarillo')->first(), 'b' => Color::where('name', 'crema')->first()];
        case 5: return [ 'a' => Color::where('name', 'naranja')->first(), 'b' => Color::where('name', 'amarillo')->first()];
        case 6: return [ 'a' => Color::where('name', 'celeste')->first(), 'b' => Color::where('name', 'cielo')->first()];
        case 7: return [ 'a' => Color::where('name', 'verdeclaro')->first(), 'b' => Color::where('name', 'amarillo')->first()];
        case 8: return [ 'a' => Color::where('name', 'crema')->first(), 'b' => Color::where('name', 'marronclaro')->first()];
        case 9: return [ 'a' => Color::where('name', 'bordo')->first(), 'b' => Color::where('name', 'rojo')->first()];
        case 10: return [ 'a' => Color::where('name', 'azuloscuro')->first(), 'b' => Color::where('name', 'azul')->first()];
        case 11: return [ 'a' => Color::where('name', 'verdeoscuro')->first(), 'b' => Color::where('name', 'verde')->first()];
        case 12: return [ 'a' => Color::where('name', 'marronclaro')->first(), 'b' => Color::where('name', 'amarillo')->first()];
        case 13: return [ 'a' => Color::where('name', 'grana')->first(), 'b' => Color::where('name', 'rosa')->first()];
        case 14: return [ 'a' => Color::where('name', 'violeta')->first(), 'b' => Color::where('name', 'violetaclaro')->first()];
        case 15: return [ 'a' => Color::where('name', 'turquesa')->first(), 'b' => Color::where('name', 'celeste')->first()];
        case 16: return [ 'a' => Color::where('name', 'marron')->first(), 'b' => Color::where('name', 'marronclaro')->first()];
        default: return ['a' => null, 'b' => null];
      }
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
        $colors = $this->colorGrupo($row->grupo);
        $row->a = $colors['a'];
        $row->b = $colors['b'];
        return $row;
      });


      return $grupos;
    }
}
