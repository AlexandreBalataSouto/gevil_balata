<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Localizacion;
use App\Enclave;
use Faker\Generator as Faker;

$factory->define(Localizacion::class, function (Faker $faker) {
		
    return [
        'coord_utm' => $faker->numerify('#### ####'),
		'fecha_alta' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'altura' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 3),
		'confirmada' => $faker->randomElement([1,0]),
		'observacion' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
		'enclave_id' => Enclave::all()->random()->id_enclave,
    ];
});
