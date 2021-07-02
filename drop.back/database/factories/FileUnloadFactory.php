<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FileUnload;
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

$factory->define(FileUnload::class, function (Faker $faker) {
  return [
    'title' => $faker->title,
    'file_url' => $faker->url,
    'file_name' => $faker->sentence,
    'description' => $faker->sentence,
    'date_unloaded' => $faker->date(),
  ];
});
