<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaeSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mae_socios', function (Blueprint $table) {
            $table->id('id_socios');
            $table->unsignedBigInteger('personas_id');
            $table->string('codigo',50);
            $table->string('tipo',50);
            $table->string('categoria',8);
            $table->string('imagen');
            $table->string('es_socio',50);
            $table->string('comunidad',50);
            $table->string('distrito_id');
            $table->string('provincia_id');
            $table->string('departamento_id');
            $table->foreign('distrito_id')->references('id')->on('tbl_distritos');
            $table->foreign('provincia_id')->references('id')->on('tbl_provincias');
            $table->foreign('departamento_id')->references('id')->on('tbl_departamentos');

            $table->foreign('personas_id')->references('id_persona')->on('mae_personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mae_socios');
    }
}
