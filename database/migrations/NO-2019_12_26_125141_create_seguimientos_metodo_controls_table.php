<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosMetodoControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos_metodo_controls', function (Blueprint $table) {
            $table->increments('id_seguimiento_metodo_control');
			$table->integer('seguimiento_id');
			$table->integer('metodo_control_id');
			$table->date('fecha_ini')->nullable();
			$table->date('fecha_fin')->nullable();
			$table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimientos_metodo_controls');
    }
}
