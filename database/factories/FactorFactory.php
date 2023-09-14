<?php

namespace Database\Factories;

use App\Models\Vulnerability;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factor>
 */
class FactorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vulnerability = Vulnerability::factory()->create();

        return [
            'name' => $this->faker->unique()->word,
            'value' => $this->faker->randomFloat(2, 0, 100),
            'vulnerability_id' => $vulnerability->id,
        ];
    }
}
