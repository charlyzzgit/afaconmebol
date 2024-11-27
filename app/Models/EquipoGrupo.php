<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoGrupo extends Model
{
    use HasFactory;
    protected $table = 'equipos_grupo';

    public function equipo(){
        return $this->belongsTo('App\Models\Equipo');
    }

    public function grupo(){
        return $this->belongsTo('App\Models\Grupo');
    }
}
