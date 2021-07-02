<?php

use Illuminate\Support\Str;

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku' => $faker->numberBetween(0,100000),
        'name' => join(' ', $faker->words(5)),
        'slug' => Str::slug(join(' ', $faker->words(5))),
        'description' => $faker->text(200),
        'price_user' => $faker->randomFloat(2,0,1000),
        'price_3_opt' => $faker->randomFloat(2,0,1000),
        'price_8_opt' => $faker->randomFloat(2,0,1000),
        'price_dealer' => $faker->randomFloat(2,0,1000),
        'price_vip' => $faker->randomFloat(2,0,1000),
        'category_id' => $faker->numberBetween(0,5),
        'stock' => $faker->numberBetween(0,1500),
        'feature' => $faker->boolean(30),
        'views' => $faker->numberBetween(0,1500),
        'sales_count' => $faker->numberBetween(0,1000),
    ];
});
