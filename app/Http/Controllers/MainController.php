<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LigaController;
use App\Models\Calendar;

class MainController extends Controller
{
   public function backup(){
        set_time_limit(0);
        $system = new System();
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
      return $request->restore ? $this->restore() : $this->backup();
    }

  private function nextCalendar(){
      $calendar = Calendar::where('procesado', 0)->first();
      if ($calendar) {
          $calendar->update(['procesado' => true]);
      }
  }

  public function newTemporada(Request $request){
    return processTransaction(function() use($request){
        (new LigaController())->autoLigas();
        
        $main = getMain();
        $main->anio++;
        $main->save();
        $this->nextCalendar();
    }, 'Temporada iniciada', 'error al iniciar');
  }
}
