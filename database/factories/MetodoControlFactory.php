<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MetodoControl;
use Faker\Generator as Faker;

$factory->define(MetodoControl::class, function (Faker $faker) {
    return [
        'nombre_metodo_control' => $faker->randomElement(['Manual','Mecanico','Quimico','Biologico']),
		'descripcion' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
		'observacion' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
    ];
});
