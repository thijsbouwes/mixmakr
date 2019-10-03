<?php

use Faker\Generator as Faker;

$factory->define(\App\Ingredient::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'liquor_percentage' => $faker->randomNumber(2),
        'position'          => $faker->randomNumber(1),
        'amount'            => $faker->randomNumber(3)
    ];
});
