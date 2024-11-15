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
}
