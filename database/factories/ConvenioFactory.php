<?php

use Faker\Generator as Faker;

$factory->define(App\Convenio::class, function (Faker $faker) {
    return [
        'nombre_empresa' => $faker->name,
        'tipo_convenio' => $faker->randomElement(['Capstone', 'A+S', 'otro']),
        'fecha_inicio' => $faker->dateTime,
        'fecha_termino' => $faker->dateTime,
        'evidencia' => $faker->name,
    ];
});
