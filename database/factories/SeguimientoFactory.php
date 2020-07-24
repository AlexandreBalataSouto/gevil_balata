<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seguimiento;
use App\Especie;
use App\Localizacion;
use Faker\Generator as Faker;

$factory->define(Seguimiento::class, function (Faker $faker) {
    return [
        'fecha_alta' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'otras_especies' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
		'observaciones' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
		'recomendacion' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
		'descrip_metodos_control' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
		'proxima_fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'especie_id' => Especie::all()->random()->id_especie,
		'localizacion_id' => Localizacion::all()->random()->id_localizacion,
		
    ];
});
