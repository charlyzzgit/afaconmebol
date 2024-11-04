<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;
    protected $table = 'partidos';


    public function local(){
        return $this->belongsTo('App\Models\Equipo', 'loc_id');
    }

    public function visitante(){
        return $this->belongsTo('App\Models\Equipo', 'vis_id');
    }

    public function grupo(){
        return $this->belongsTo('App\Models\Grupo');
    }
}
