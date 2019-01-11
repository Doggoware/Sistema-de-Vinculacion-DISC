<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('titulo_actividad');
            $table->integer('cant_estudiantes')->default(1);
            $table->string('nombre_estudiante');
            $table->string('rut');
            $table->string('carrera');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('prof_guia');
            $table->integer('cant_prof_guia')->default(1);
            $table->string('empresa');
            $table->string('evidencia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titulacions');
    }
}

