<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';


    public function equiposDefault(){
      return $this->hasMany('App\Models\EquipoGrupo')->orderBy('order');
    }

    public function equiposPosition(){
      return $this->hasMany('App\Models\EquipoGrupo')->orderBy('pos');
    }

    public function equiposTableOrder(){
      return $this->hasMany('App\Models\EquipoGrupo')->orderBy('pts', 'desc')
                                                     ->orderBy('d', 'desc')
                                                     ->orderBy('gf', 'desc')
                                                     ->orderBy('gc')
                                                     ->orderBy('gv')
                                                     ->orderBy('g', 'desc')
                                                     ->orderBy('p');
    }
}
