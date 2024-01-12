<?php

namespace Database\Factories;

use App\Models\Angi;
use App\Models\Bagsh;
use App\Models\Suragch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Angi>
 */
class AngiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'angi'=>$this->faker->numberBetween(1, 12),
            'bagshId' => Bagsh::factory(),
            'SuragchId' => Suragch::factory(),
        ];
    }
}
