<?php

namespace Database\Factories;

use App\Models\Angi;
use App\Models\Bagsh;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bagsh>
 */
class BagshFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'angi_id' => Angi::factory(),
            'name' => $this->faker->name(),
            'register' => $this->faker->text(),
            'password' => $this->faker->password(),
        ];
    }
}
