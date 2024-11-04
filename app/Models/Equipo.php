<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipos';

    public function colorA(){
      return $this->belongsTo('App\Models\Color', 'a', 'id');
    }

    public function colorB(){
      return $this->belongsTo('App\Models\Color', 'b', 'id');
    }

    public function colorC(){
      return $this->belongsTo('App\Models\Color', 'c', 'id');
    }

    public function liga(){
      return $this->belongsTo('App\Models\Liga');
    }
}
