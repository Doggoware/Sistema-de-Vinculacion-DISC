<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateTituladosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_titulado');
            $table->string('rut_titulado');
            $table->integer('telefono_titulado')->nullable();
            $table->string('correo_titulado')->nullable();
            $table->string('empresa_trabaja')->nullable();
            $table->integer('anio_titulacion');
            $table->string('carrera');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulados');
    }
}
