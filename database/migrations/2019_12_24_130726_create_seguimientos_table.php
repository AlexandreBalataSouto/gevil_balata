<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->increments('id_seguimiento');
			$table->date('fecha_alta');
			$table->string('otras_especies')->nullable();
			$table->string('observaciones')->nullable();
			$table->string('recomendacion')->nullable();
			$table->string('descrip_metodos_control')->nullable();
			$table->date('proxima_fecha')->nullable();
			
			$table->unsignedInteger('especie_id'); 
			$table->foreign('especie_id')->references('id_especie')->on('especies');

			$table->unsignedInteger('localizacion_id');
			$table->foreign('localizacion_id')->references('id_localizacion')->on('localizaciones');
			
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
        Schema::dropIfExists('seguimientos');
    }
}
