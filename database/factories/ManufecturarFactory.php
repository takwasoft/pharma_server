<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Manufacturer::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'details' => $faker->paragraph,
    ];
});
