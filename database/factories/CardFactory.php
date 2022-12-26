<?php

namespace Database\Factories;

use App\Models\Board;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
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
            'name' => $this->faker->name,
            'status' => $this->faker->numberBetween(0, 3),
        ];
    }
}
