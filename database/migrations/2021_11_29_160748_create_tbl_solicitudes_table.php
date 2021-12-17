<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_solicitudes', function (Blueprint $table) {
            $table->id('ID_SOLICITUD');
            $table->string('DE_ASUNTO', 100);
            $table->integer('CO_SOLICITUD');
            $table->integer('NU_SOLICITUD');
            $table->char('ES_SOLICITUD', 1);
            $table->unsignedBigInteger('tipo_solicitud_id');
            $table->unsignedBigInteger('socio_id');
            
            $table->foreign('socio_id')->references('id_socios')->on('mae_socios');
            $table->foreign('tipo_solicitud_id')->references('id')->on('tbl_tipos_solicitudes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_solicitudes');
    }
}
