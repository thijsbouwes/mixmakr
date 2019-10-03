<?php

use Faker\Generator as Faker;

$factory->define(\App\Order::class, function (Faker $faker) {
    return [
        'price'               => $faker->randomNumber(2),
        'status'              => $faker->randomElement(\App\Order::STATUS),
        'order_id'            => factory(\App\Order::class)->create()->id,
        'user_id'             => factory(\App\User::class)->create()->id,
        'payment_external_id' => $faker->randomNumber(2),
        'payment_status'      => $faker->randomElement(\App\Order::PAYMENT_STATUS)
    ];
});
