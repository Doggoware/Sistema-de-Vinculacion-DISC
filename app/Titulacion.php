<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    protected $fillable = [
        'titulo','nombre_estudiante','rut','carrera','fecha_inicio','fecha_fin','prof_guia',
        'empresa','evidencia'
    ];
}
