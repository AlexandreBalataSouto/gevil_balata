<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Foto;
use Faker\Generator as Faker;

$factory->define(Foto::class, function (Faker $faker) {
    return [
		'titulo' 	=> $faker->randomElement(['rabogato','vinagrera','opuntia_cilindrica','acacia_palida']),
		'descripcion' 	=> $faker->text($maxNbChars = 255),
		'especie_id'	=> $faker->numberBetween($min = 27, $max = 38),
    ];
});
