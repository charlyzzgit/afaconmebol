<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goleador extends Model
{
    use HasFactory;
    protected $table = 'goleadores';

    public function equipoData(){
        return $this->belongsTo('App\Models\Equipo');
    }
}
