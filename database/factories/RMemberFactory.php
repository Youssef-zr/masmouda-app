<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RMember>
 */
class RMemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "name_ar" => $this->faker->word,
            "name_fr" => $this->faker->word,
            "salary" => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
        ];
    }
}
