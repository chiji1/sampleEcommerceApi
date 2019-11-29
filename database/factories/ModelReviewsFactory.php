<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Review::class, function (Faker $faker) {
    return [
        'product_id' => function() {
            return \App\Models\Product::all()->random();
        },
        'customer_id' => function() {
            return \App\User::all()->random();
        },
        'review' => $faker->paragraph,
        'rating' => $faker->numberBetween(0,5)
    ];
});
