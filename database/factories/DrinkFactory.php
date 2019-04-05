<?php

use Faker\Generator as Faker;

$factory->define(\App\Drink::class, function (Faker $faker) {
    return [
        'name'  => $faker->name,
        'image' => $faker->imageUrl(),
        'price' => $faker->randomNumber(2)
    ];
});
