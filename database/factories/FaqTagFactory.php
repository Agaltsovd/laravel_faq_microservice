<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FaqsTags;
use Faker\Generator as Faker;

$factory->define(FaqsTags::class, function (Faker $faker) {
    return [
        'faq_id'=>$faker->numberBetween(4,14),
        'tag_id'=>$faker->numberBetween(1,70),
    ];
});
