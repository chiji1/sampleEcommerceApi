<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'detail' => $faker->paragraph,
        'price' =>$faker->numberBetween(1000, 50000),
        'stock' => $faker->randomNumber(2),
        'discount' => $faker->numberBetween(2, 30)
    ];
});
