<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aprendizaje extends Model
{
    protected $fillable = [
        'asignatura', 'nombre', 'cantidad', 'socio', 'año', 'semestre', 'evidencia'
    ];
}
