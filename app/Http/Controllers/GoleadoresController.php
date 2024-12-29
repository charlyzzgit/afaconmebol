<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goleador;
use App\Models\Partido;
use App\Models\Equipo;
use DB;

class GoleadoresController extends Controller
{
    public function saveGoleadores($data){
      $p = Partido::find($data->id);
      if(!$data->goleadores){
        return;
      }
      $rows = $data->goleadores;

      foreach ($rows as $row){
        $goleador = Goleador::where('anio', $p->anio)
                            ->where('copa', $p->copa)
                            ->where('equipo_id', $row['equipo_id'])
                            ->where('numero', $row['jugador']);
        if($p->zona){
          $goleador = $goleador->where('zona', $p->zona);
        }

        $goleador =  $goleador->first();

        if(!$goleador){
          $eq = Equipo::find($row['equipo_id']);
          $goleador = new Goleador();
          $goleador->anio = $p->anio;
          $goleador->copa = $p->copa;
          $goleador->equipo_id = $eq->id;
          $goleador->equipo = $eq->name;
          $goleador->zona = $p->zona;
          $goleador->numero = $row['jugador'];
          $goleador->goles = $row['goles'];
        }else{
          $goleador->goles += $row['goles'];
        }

        $goleador->save();
                           
      }


    }

    public function index($copa, $zona = null){
      $m = getMain();
      
      $goleadores = Goleador::where('copa', $copa);
                                  
      if($zona){
        $goleadores = $goleadores->where('zona', $zona);
      }


      
      $goleadores = $goleadores->groupBy('equipo_id')
                               ->orderBy('goles', 'desc')
                               ->orderBy('updated_at', 'desc')
                               ->get()
                               ->map(function($g){
                                 $g->total = $g->sum('goles');
                                 $g->equipo = Equipo::with(['colorA', 'colorB', 'colorC'])->find($g->equipo_id);
                                 return $g;
                               });
     

      return view('home.goleadores', compact('goleadores', 'copa', 'zona'));

    }


    public function estadisticas($copa, $zona = null){
      $m = getMain();
      
      $goleadores = Goleador::where('anio', $m->anio)->where('copa', $copa);
                                  
      if($zona){
        $goleadores = $goleadores->where('zona', $zona);
      }


      
      $query = $goleadores->groupBy('equipo_id')
                               ->orderBy('goles', 'desc')
                               ->orderBy('updated_at', 'desc');
      $first = clone $query;

      $g = $first->first();

      $goleadores = $query->having('goles', $g->goles)
            ->groupBy('equipo_id')
            ->orderBy('goles', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(function($g){
                                 $g->total = $g->sum('goles');
                                 $g->equipo = Equipo::with(['colorA', 'colorB', 'colorC'])->find($g->equipo_id);
                                 return $g;
                               });
      $estadisticas = true;

      return view('home.goleadores', compact('goleadores', 'copa', 'zona', 'estadisticas'));

    }

    public function estadisticasHistorial($anio, $copa, $zona = null){
      
      
      $goleadores = Goleador::where('anio', $anio)->where('copa', $copa);
                                  
      if($zona){
        $goleadores = $goleadores->where('zona', $zona);
      }


      
      $query = $goleadores->groupBy('equipo_id')
                               ->orderBy('goles', 'desc')
                               ->orderBy('updated_at', 'desc');
      $first = clone $query;

      $g = $first->first();

      $goleadores = $query->having('goles', $g->goles)
            ->groupBy('equipo_id')
            ->orderBy('goles', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(function($g){
                                 $g->total = $g->sum('goles');
                                 $g->equipo = Equipo::with(['colorA', 'colorB', 'colorC'])->find($g->equipo_id);
                                 return $g;
                               });
      $estadisticas = true;

      return view('home.goleadores', compact('anio', 'goleadores', 'copa', 'zona', 'estadisticas'));

    }
}
