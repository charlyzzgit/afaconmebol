<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoPartido extends Model
{
    use HasFactory;
    protected $table = 'autopartido';
    protected $fillable = ['processed'];
}
