<?php

use Faker\Generator as Faker;

$factory->define(App\Todo::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'user_id' => factory(App\User::class)->create()->id
    ];
});
