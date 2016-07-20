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

// User
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

// Work
$factory->define(App\Work::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'start' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

// School
$factory->define(App\School::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'start' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

// Skill
$factory->define(App\Skill::class, function (Faker\Generator $faker) {
    return [
        'skill' => $faker->sentence,
    ];
});

// Award
$factory->define(App\Award::class, function (Faker\Generator $faker) {
    return [
        'award' => $faker->sentence,
    ];
});

// Interest
$factory->define(App\Interest::class, function (Faker\Generator $faker) {
    return [
        'activity' => $faker->sentence,
    ];
});