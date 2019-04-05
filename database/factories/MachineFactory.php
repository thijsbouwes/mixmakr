<?php

use Faker\Generator as Faker;

$factory->define(\App\Machine::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'city'        => $faker->city,
        'address'     => $faker->address,
        'postal_code' => $faker->postcode
    ];
});
