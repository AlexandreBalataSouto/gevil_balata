<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Especie;
use Faker\Generator as Faker;

$factory->define(Especie::class, function (Faker $faker) {
    return [
		'nombre_comun' 	=> $faker->randomElement(['Rabogato','Vinagrera','Cospí de mar','Magarza comun','Acacia palida','Cactus crestado','Opuntia cilindrica','Amuelle verde','Amuelle australiano','Amuelle','Tunera india']),
		'nombre_cientifico'=>$faker->text($maxNbChars = 20),
		'familia'		=> $faker->text($maxNbChars = 20),
		'descripcion' 	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'origen'		=> $faker->text($maxNbChars = 200),
		'estatus_legal' => $faker->randomElement(['invasora','potencialmente invasora','bajo vigilancia']),
		'detalle_estatus_legal'=> $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
		'riesgo'		=> $faker->randomElement(['alto','medio','bajo']),
		'distribucion' 	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'zonas_sensibles' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'metodos_control' => $faker->paragraph($nbSentences = 4, $variableNbSentences = true),
		'ini_periodo_trabajo' => $faker->date,
		'fin_periodo_trabajo' => $faker->date,
		'ref_biblio' 	=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		
    ];
});
