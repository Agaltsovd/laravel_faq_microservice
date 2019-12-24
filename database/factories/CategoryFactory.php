<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //'id' => $faker->num
        'name' => $faker->name,
        'is_active' => $faker->boolean,
        'sort_weight' => $faker->numberBetween(1, 100),
        'icon_url' => $faker->url,
    ];
});
