<?php

use Faker\Generator as Faker;

$factory->define(App\extension::class, function (Faker $faker) {
    return [
        'titulo' => $faker->name,
        'nombre' => $faker->name,
        'fecha' => $faker->dateTime,
        'lugar' => $faker->address,
        'cantidad' => $faker->randomNumber($nbDigits = 24),
        'tipo_convenio' => $faker->name,
        'organizador' => $faker->name,
        'tipo_convenio' => $faker->name,
        'evidencia' => $faker->name,
    ];
});
