<?php

use Faker\Generator as Faker;

$factory->define(\App\Ingredient::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'liquor_percentage' => $faker->numberBetween([[0], [10]])
    ];
});
