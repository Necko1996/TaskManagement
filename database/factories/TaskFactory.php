<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'status' => $faker->numberBetween(0, 2),
        'priority' => $faker->numberBetween(0, 2),
    ];
});
