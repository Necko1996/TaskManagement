<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Board::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'name' => $faker->name,
    ];
});
