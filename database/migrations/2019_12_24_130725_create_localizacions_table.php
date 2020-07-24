<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localizaciones', function (Blueprint $table) {
            $table->increments('id_localizacion');
			$table->string('coord_utm');
			$table->date('fecha_alta')->nullable();
			$table->string('altura')->nullable();
			$table->boolean('confirmada')->nullable();
			$table->string('observacion')->nullable();
			
			$table->unsignedInteger('enclave_id'); 
			$table->foreign('enclave_id')->references('id_enclave')->on('enclaves');
			/*
			$table->unsignedInteger('avistador_id');
			$table->foreign('avistador_id')->references('id_avistador')->on('avistadores');
			*/
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
        Schema::dropIfExists('localizaciones');
    }
}
