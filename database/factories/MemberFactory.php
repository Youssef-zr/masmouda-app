<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rand_key = array_rand(political_parties());
        return [
            "name" => fake()->name(),
            "phone" => fake()->phoneNumber(),
            "email" => fake()->email(),
            "adress" => fake()->address(),
            "cin_number" => "GM".fake()->randomNumber(4),
            "rib_number" => fake()->randomNumber(6) . '000000000000000000',
            "bank_name" => fake()->company(),
            "month" => random_int(1, 12),
            "political_party" =>  political_parties()[$rand_key],
            "role_id" => random_int(1, max: 10),
            "permissions" => [
                "permission 1 | الصلاحية الاولى",
            ],
        ];
    }
}
