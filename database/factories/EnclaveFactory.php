<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enclave;
use Faker\Generator as Faker;

$factory->define(Enclave::class, function (Faker $faker) {
    return [
        'nombre_enclave' => $faker->randomElement(['Camino ','Colina ','Zona ']) . $faker->randomDigit,
		'municipio' => $faker->randomElement(['Arrecife','Haria','San Bartolome','Teguise','Tias','Tinajo','Yaiza']),
		'observacion' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
    ];
});
