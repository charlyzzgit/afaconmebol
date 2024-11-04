<?php

namespace App\Classes;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Calendar;
use DB;
use App\Http\Controllers\PartidoController;



class Admin{
   
    private $calendar;
    private $nextCalendar;
    private $main;
  
    function __construct(){
      $this->calendar = Calendar::where('procesado', 0)->orderBy('id')->first();
      $this->main = Main::first();
    }

    public function processed(){
      $this->calendar->procesado = true;
      $this->calendar->save();
    }


    public function getData(){
      $c = json_decode($this->calendar->copas);
      $namecopa = count($c) ? $c[0] : null;
      return [
                'action' => $this->calendar->action,
                'anio' => $this->main->anio,
                'copas' => json_decode($this->calendar->copas),
                'namecopa' => $namecopa,
                'colorcopa' => $this->getColorCopa(),
                'imagecopa' => $this->getImageCopa(),
                'fase' => $this->calendar->fase,
                'namefase' => $this->getNameFase(),
                'fecha' => $this->calendar->fecha,
                'namefecha' => $this->getNameFecha(),
                'iniciada' => $this->calendar->iniciada ? true : false,
                'procesada' => $this->calendar->procesado ? true : false,
                'mes' =>$this->calendar->mes,
                'semana' => $this->calendar->semana,
                'partido' => (new PartidoController())->nextPartido($this->main->anio, $namecopa, $this->calendar->fase, $this->calendar->fecha, null) //zona = getZona(copa)

      ];
    }

    private function getNameFase(){
      $fase = $this->calendar->fase;
      $c = json_decode($this->calendar->copas);
      if(!count($c)){
        return null;
      }
      $copa = $c[0];
      switch($fase){
        case -2: return 'fase preliminar';
        case -1: return '1ª fase';
        case 0:
         switch($copa){
            case 'afa': return '2ª fase';
            default: return 'fase de grupos';
         }
        case 1:
          switch($copa){
            case 'afa': return '3ª fase';
            default: return 'dieciseisavos de final';
         }
        case 2: return 'octavos de final';
        case 3: return 'cuartos de final';
        case 4: return 'semifinales';
        default: return 'final';
      }
    }

    private function getColorCopa(){
      $c = json_decode($this->calendar->copas);
      $copa = $c[0];
      if(!count($c)){
        return ['a' => null, 'b' => null];
      }
      switch($copa){
        case 'afa': return ['a' => 'azuloscuro', 'b' => 'azul' ];
        case 'argentina': return ['a' => 'celeste', 'b' => 'cielo' ];
        case 'sudamericana': return ['a' => 'azul', 'b' => 'celeste' ];
        case 'libertadores': return ['a' => 'rojo', 'b' => 'naranja' ];
        default: return ['a' => 'verde', 'b' => 'verdeclaro' ];
      }
    }

    private function getNameFecha(){
      
      $fase = $this->calendar->fase;
      $fecha = $this->calendar->fecha;

      if($fase < 1){
        return $fecha.'ª fecha';
      }

      return $fecha == 1 ? 'partido de ida' : 'partido de vuelta';
    }

    private function getImageCopa(){
      $c = json_decode($this->calendar->copas);
      $copa = $c[0];
      if(!count($c)){
        return 'default/conmebol.png';
      }

      switch($copa){
        case 'afa': return 'default/escudo_afa.png';
        case 'argentina': return 'default/argentina.png';
        case 'sudamericana': return 'default/sudamericana.png';
        case 'libertadores': return 'default/libertadores.png';
        default: return 'default/recopa.png';
      }
    }

}