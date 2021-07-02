<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Carbon\Carbon;

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

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->words(3, true),
        'description' => $faker->sentence(),
        'slug' => $faker->slug,
        'status' => $faker->boolean(),
        //'image' => $faker->sentence()
    ];
});
