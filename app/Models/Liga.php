<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;
    protected $table = 'ligas';


    public function colorA(){
      return $this->belongsTo('App\Models\Color', 'a', 'id');
    }

    public function colorB(){
      return $this->belongsTo('App\Models\Color', 'b', 'id');
    }

    public function colorC(){
      return $this->belongsTo('App\Models\Color', 'c', 'id');
    }

    public function equipos(){
      return $this->hasMany('App\Models\Equipo')->orderBy('id');
    }

    public function equiposByPuntos(){
      return $this->hasMany('App\Models\Equipo')->orderBy('pts', 'desc')->orderBy('id');
    }

    public function equiposByCopas(){
      return $this->hasMany('App\Models\Equipo')->orderBy('pos_clasificacion');//->orderBy('pts', 'desc')->orderBy('id');
    }

    public function libertadores(){
      $m = getMain();
      return $this->hasMany('App\Models\Equipo')
      ->where('copa', 'libertadores')
      ->where('id', '<>', $m->lib)
      ->where('id', '<>', $m->sud)
      ->orderBy('pos_clasificacion');//->orderBy('pts', 'desc')->orderBy('id');
    }

    public function sudamericana(){
      return $this->hasMany('App\Models\Equipo')->where('copa', 'sudamericana')->orderBy('pos_clasificacion');//->orderBy('pts', 'desc')->orderBy('id');
    }

}
