<?php

namespace App\Classes;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Calendar;
use DB;



class Admin{
   
    private $calendar;
    private $nextCalendar;
    private $main;
  
    function __construct(){
      $this->calendar = Calendar::where('procesado', 0)->orderBy('id')->first();
      $this->main = Main::first();
    }


    public function getData(){
      return [
                'action' => $this->calendar->action,
                'anio' => $this->main->anio,
                'copas' => json_decode($this->calendar->copas),
                'fase' => $this->calendar->fase,
                'fecha' => $this->calendar->fecha,
                'mes' =>$this->calendar->mes,
                'semana' => $this->calendar->semana,
                'partido' => null

      ];
    }

}