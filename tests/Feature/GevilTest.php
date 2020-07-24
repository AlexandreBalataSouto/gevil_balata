<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GevilTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInsertarAlgo()
    {
		
		
   		$response = $this->get('/especies/create');
    	$response->assertStatus(200);
		$response->assertSee('Añadir especie');
		
		
		$this->json('POST', '/especies', ['nombre_comun' => 'PRUEBA UNIT', 'descripcion' => 'LA QUE SEA']);
		
		
		$this->assertDatabaseHas('especies', [
        'nombre_comun' => 'PRUEBA UNIT'
    	]);
		
    }
	
}
