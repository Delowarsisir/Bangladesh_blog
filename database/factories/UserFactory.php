<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '12345678', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Models\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->realText(),
        'category_description' => $faker->realText(),

    ];
});

$factory->define(\App\Models\Blog::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1, 10),
        'blog_title' => $faker->realText(),
        'blog_short_description' => $faker->realText(),
        'blog_long_description' => $faker->realText(),
        'blog_image' => $faker->imageUrl(),

    ];
});
