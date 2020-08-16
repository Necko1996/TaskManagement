<?php

use App\Board;
use App\Card;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'board_id' => factory(Board::class)->create()->id,
        'card_id' => factory(Card::class)->create()->id,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'priority' => $faker->numberBetween(0, 2),
    ];
});
