<?php

use Faker\Generator as Faker;

$factory->define(App\Titulados::class, function (Faker $faker) {
    return [
        'nombre_titulado' => $faker->string,
        'rut_titulado' => $faker->string,
        'telefono_titulado' => $faker->integer,
        'correo_titulado' => $faker->string,
        'empresa_trabaja' => $faker->string,
        'año_titulacion' => $faker->integer,
        'carrera' => $faker->string,
    ];
});
