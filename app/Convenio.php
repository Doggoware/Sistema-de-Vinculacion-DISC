<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{


    protected $fillable = [
        'nombre_empresa', 'tipo_convenio', 'fecha_inicio', 'fecha_termino', 'evidencia',
    ];
}
