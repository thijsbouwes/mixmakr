<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'date_of_birth'     => $faker->date(),
        'email'             => $faker->unique()->safeEmail,
        'password'          => \Illuminate\Support\Facades\Hash::make('Welcome123'), // password
        'remember_token'    => Str::random(10),
    ];
});
