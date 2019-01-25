<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    protected $fillable = [
        'nombre', 'descripcion','formula', 'evidencia', 'fecha', 'objetivo', 'actual'
    ];
}
