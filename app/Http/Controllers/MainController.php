<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\GrupoController;
use App\Models\Calendar;
use App\Classes\System;
use Carbon\Carbon;

class MainController extends Controller
{
   public function backup(){
        set_time_limit(0);
        $system = new System();
        if(!$system->setBackup('autopartido')) return getResponse(false, 'Error Backup Autopartido');
        if(!$system->setBackup('calendar')) return getResponse(false, 'Error Backup Calendario');
        if(!$system->setBackup('cupos_afa')) return getResponse(false, 'Error Backup Cupos Afa');
        if(!$system->setBackup('ligas')) return getResponse(false, 'Error Backup Ligas');
        if(!$system->setBackup('equipos')) return getResponse(false, 'Error Backup Equipos');
        if(!$system->setBackup('grupos')) return getResponse(false, 'Error Backup Equipos Grupos');
        if(!$system->setBackup('equipos_grupo')) return getResponse(false, 'Error Backup Grupos');
        if(!$system->setBackup('partidos')) return getResponse(false, 'Error Backup Partidos');
        if(!$system->setBackup('goleadores')) return getResponse(false, 'Error Backup Goleadores');
        if(!$system->setBackup('main')) return getResponse(false, 'Error Backup Main');
        return getResponse(true, 'Backup con exito');
    }

    public function restore(){
      set_time_limit(0);

        $system = new System();
        if(!$system->getBackup('autopartido')) return getResponse(false, 'Error Restore Autopartido');
        if(!$system->getBackup('calendar')) return getResponse(false, 'Error Restore Calendario');
        if(!$system->getBackup('cupos_afa')) return getResponse(false, 'Error Restore Cupos Afa');
        if(!$system->getBackup('ligas')) return getResponse(false, 'Error Restore Ligas');
        if(!$system->getBackup('equipos')) return getResponse(false, 'Error Restore Equipos');
        if(!$system->getBackup('grupos')) return getResponse(false, 'Error Restore Equipos Grupos');
        if(!$system->getBackup('equipos_grupo')) return getResponse(false, 'Error Restore Grupos');
        if(!$system->getBackup('partidos')) return getResponse(false, 'Error Restore Partidos');
        if(!$system->getBackup('goleadores')) return getResponse(false, 'Error Restore Goleadores');
        if(!$system->getBackup('main')) return getResponse(false, 'Error Restore Main');
        return getResponse(true, 'Restauración exitosa');
    }

  public function setSystem(Request $request){
      return $request->action == 'restore' ? $this->restore() : $this->backup();
    }

  private function nextCalendar(){
      $calendar = Calendar::where('procesado', 0)->first();
      if ($calendar) {
          $calendar->update(['procesado' => true]);
      }
  }

  public function finTemporada(Request $request){
    return processTransaction(function() use($request){
        
        Calendar::query()->update(['iniciada' => false, 'procesado' => false]);
        (new GrupoController())->setClasificadosNextAnio();
        (new LigaController())->autoLigas();
        
    }, 'Temporada finalizada', 'error al finalizar');
     
  }

  public function newTemporada(Request $request){
    return processTransaction(function() use($request){
        //(new LigaController())->autoLigas();//sacar
        (new LigaController())->swapPts();
        $main = getMain();
        $main->anio++;
        $main->save();
        $this->nextCalendar();
    }, 'Temporada iniciada', 'error al iniciar');
  }

  

  public function initFecha(Request $request){
    return processTransaction(function() use($request){
        $calendar = Calendar::where('procesado', 0)->first();
        $calendar->iniciada = true;
        $calendar->save();
        $copas = json_decode($calendar->copas);
        $copa = count($copas) ? $copas[0] : null;
        if($copa == 'afa' && $calendar->fase < 2){
          (new LigaController())->autoFecha();
          Log::channel('afa')->info(Carbon::now()->format('d/m/Y H:i:s'));
        }
    }, 'Fecha iniciada', 'error al iniciar');


  }

  private function addMes(&$meses, $row){
    $e = false;
    foreach($meses as &$mes){
      if($mes['name'] == $row->mes){
        $this->addSemana($mes['semanas'], $row);
        $e = true;
      }
    }

    if(!$e){
      $meses[] = [
                    'name' => $row->mes,
                    'semanas' => [
                                    [
                                    'num' => $row->semana,
                                    'dias' => [$row]
                                    ]
                                  ]

                  ];
    }
  }

  private function addSemana(&$semanas, $row){
    $e = false;
    foreach($semanas as &$semana){
      if($semana['num'] == $row->semana){
        $semana['dias'][] = $row;
        $e = true;
      }
    }

    if(!$e){
      $semanas[] = [
                    'num' => $row->semana,
                    'dias' => [$row]
                    ];
    }
  }

  public function calendar(){
    $rows = Calendar::orderBy('id')->get();
    $meses = [];
    foreach($rows as $row){
      $this->addMes($meses, $row);
    }
    $meses = json_encode($meses);
    return view('home.calendar', compact('meses'));
  }
}
