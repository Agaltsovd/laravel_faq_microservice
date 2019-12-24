<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Faq;
use Faker\Generator as Faker;

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'category_id'=>$faker->numberBetween(8,12),
        'question'=>$faker->text,
        'answer'=>$faker->text,
        'is_active'=>$faker->boolean,
        'sort_weight'=>$faker->numberBetween(0,100)
    ];
});
