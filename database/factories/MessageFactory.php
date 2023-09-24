<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => "+32 4" . fake()->unique()->numerify('##/##.##.##'),
            'message' => fake()->text(1000),
            'created_at' => fake()->dateTimeThisDecade()
        ];
    }
}