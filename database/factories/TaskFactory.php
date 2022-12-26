<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'board_id' => Board::factory()->make()->id,
            'card_id' => Card::factory()->make()->id,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'priority' => $this->faker->numberBetween(0, 2),
        ];
    }
}
