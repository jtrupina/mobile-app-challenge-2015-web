<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/* --USER MODEL-- */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('123456'),
        'city' => $faker->city,
        'country' => $faker->country,
        'gender' => 'm',
        'birth_date' => $faker->date(),
        'role' => 1,
        'remember_token' => str_random(10),
    ];
});

/* --REQUEST MODEL--*/
$factory->define(App\Request::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => 'jtrupina@gmail.com',
        'description' => $faker->text(150),
        'status' => 1,
    ];
});

/* --GROUP MODEL--*/
$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(3),
        'description' => $faker->text(150),
    ];
});
