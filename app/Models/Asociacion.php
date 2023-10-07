<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'frente_id',
        'candidato_id',
        'eleccion_id',
    ];
    public $timestamps = false;
}