<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usert extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'codsis',
        'cargo',
        'numberp',
        'facultad',
        'carrera',
    ];

}
