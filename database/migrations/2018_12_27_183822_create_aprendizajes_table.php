<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAprendizajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprendizajes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('asignatura');
            $table->string('nombre');
            $table->integer('cantidad');
            $table->string('socio');
            $table->string('año');
            $table->integer('semestre');
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
        Schema::dropIfExists('aprendizajes');
    }
}
