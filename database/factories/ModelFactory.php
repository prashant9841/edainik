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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->name,
        'slug' => $faker->slug(10),
        'content' => $faker->paragraph(3),
        'status' => random_int(0, 1),
        'verified' => random_int(0, 1),
        'user_id' => 1,
        'category_id' => random_int(1, 6),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->name,
		'slug' => $faker->slug(2),
    ];
});