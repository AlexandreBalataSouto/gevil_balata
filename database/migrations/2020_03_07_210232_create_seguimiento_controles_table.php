<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientoControlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_controles', function (Blueprint $table) {
            $table->increments('id_seguimiento_control');
			$table->integer('seguimiento_id')->unsigned();
			$table->integer('metodo_control_id')->unsigned();
			$table->date('fecha_ini')->nullable();
			$table->date('fecha_fin')->nullable();
			$table->string('observaciones')->nullable();
            $table->timestamps();
			
			$table->foreign('seguimiento_id')->references('id_seguimiento')->on('seguimientos');
			$table->foreign('metodo_control_id')->references('id_metodo_control')->on('metodos_control');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimiento_controles');
    }
}
