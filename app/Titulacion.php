<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    protected $fillable = [
        'titulo_actividad','cant_estudiantes','nombre_estudiante','rut','carrera','fecha_inicio','fecha_fin','prof_guia','cant_prof_guia',
        'empresa','evidencia'
    ];
}