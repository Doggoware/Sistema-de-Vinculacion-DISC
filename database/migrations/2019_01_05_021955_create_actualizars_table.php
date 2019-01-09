<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualizarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actualizars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('convenios');
            $table->integer('extension');
            $table->integer('aprendizajes');
            $table->integer('titulados');
            $table->integer('titulacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actualizars');
    }
}
