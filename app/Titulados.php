<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Titulados extends Model
{
    protected $fillable = ['nombre_titulado',
        'rut_titulado','telefono_titulado',
        'correo_titulado','empresa_trabaja',
        'anio_titulacion','carrera'];

    protected $table = 'titulados';
}