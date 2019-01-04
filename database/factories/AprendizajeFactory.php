<?php

use Faker\Generator as Faker;

$factory->define(App\aprendizaje::class, function (Faker $faker) {
    return [
        'asignatura' => $faker->name,
        'nombre' => $faker->name,
        'cantidad' => $faker->randomNumber($nbDigits = 999),
        'socio' => $faker->name,
        'año' => $faker->year,
        'semestre' => $faker->randomNumber($nbDigits = 2),
        'evidencia' => $faker->name,
    ];
});
