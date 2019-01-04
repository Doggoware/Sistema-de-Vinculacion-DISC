<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class extension extends Model
{
    protected $fillable = [
        'titulo', 'nombre','fecha', 'lugar', 'cantidad', 'organizador', 'tipo_convenio', 'evidencia', 'fotos'
    ];
}
