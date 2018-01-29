<?php

use App\Board;
use Faker\Generator as Faker;

$factory->define(App\Card::class, function (Faker $faker) {
    return [
        'board_id' => factory(Board::class)->create()->id,
        'name' => $faker->name,
        'status' => $faker->numberBetween(0,3),
    ];
});
