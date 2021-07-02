<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
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

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => random_int(1, 10),
        'title' => $faker->words(3, true),
        'slug' => $faker->slug,
        'price' => random_int(1, 10),
        'new' => $faker->boolean(),
        'popular' => $faker->boolean(),
        'status' => $faker->boolean(),
        'description' => $faker->sentence(),
        //'image' => $faker->sentence()
    ];
});
