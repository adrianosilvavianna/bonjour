<?php

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


$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Domains\Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->randomDigit,
        'gender' => $faker->randomElement([0,1]),
        'phone' => $faker->phoneNumber,
        'photo_address' => $faker->realText(50),
        'about' => $faker->realText(100),
        'user_id' => factory(App\User::class)->create()->id
    ];
});

$factory->define(App\Domains\Vehicle::class, function (Faker $faker) {
    return [
        'model' => $faker->name,
        'brand' => $faker->name,
        'color' => $faker->colorName,
        'plaque' => $faker->realText(15),
        'year' => $faker->year,
        'num_passenger' => $faker->randomDigit(),
        'user_id' => factory(App\Domains\Profile::class)->create()->User->id
    ];
});
