<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';


    public function equiposDefault(){
      return $this->hasMany('EquipoGrupo')->orderBy('order');
    }

    public function equiposPosition(){
      return $this->hasMany('EquipoGrupo')->orderBy('pos');
    }
}
