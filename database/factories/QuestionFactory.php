<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Question::class, function (Faker $faker) {
    return [
        'name'             => $faker->text(),
        'questionnaire_id' => rand(1, 5),
    ];
});
