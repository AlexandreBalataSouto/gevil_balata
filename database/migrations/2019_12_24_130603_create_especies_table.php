<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->increments('id_especie');
			$table->string('nombre_comun');
			$table->string('nombre_cientifico')->nullable();
			$table->mediumText('descripcion')->nullable();
			$table->string('familia')->nullable();
			$table->string('origen')->nullable();
			$table->string('estatus_legal')->nullable();
			$table->mediumText('detalle_estatus_legal')->nullable();
			$table->string('riesgo')->nullable();
			$table->mediumText('distribucion')->nullable();
			$table->mediumText('zonas_sensibles')->nullable();
			$table->mediumText('metodos_control')->nullable();
			$table->date('ini_periodo_trabajo')->nullable();
			$table->date('fin_periodo_trabajo')->nullable();
			$table->longText('ref_biblio')->nullable();
			
			//$table->unsignedInteger('familia_id'); 
			//$table->foreign('familia_id')->references('id_familia')->on('familias');
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
        Schema::dropIfExists('especies');
    }
}
