<?php

namespace App\Classes;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Calendar;
use App\Models\Equipo;
use DB;



class Sorteo{
    private $main;
    private $copa;
    private $fase;
    private $grupos;
  
    function __construct($copa, $fase){
      $this->main = getMain();
      $this->copa = $copa;
      $this->fase = $fase;
      $this->grupos = [];
    }

    public function sortear(){
      switch($this->copa){
        case 'afa': return $this->sorteoAfa();
        case 'argentina' : return $this->sorteoArgentina();
        case 'sudamericana': return $this->sorteoSudamericana();
        case 'libertadores': return $this->sorteoLibertadores();
        default: return $this->sorteoRecopa();
      }
    }

    private function getEquipo($id){
      return Equipo::select('id', 'liga_id', 'clasico_id', 'name')->find($id);
    }


    private function sorteoRecopa(){
      $this->grupos[] = $this->getEquipo($this->main->lib);
      $this->grupos[] = $this->getEquipo($this->main->sud);
      return $this->grupos;
    }
  }