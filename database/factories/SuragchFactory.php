<?php

namespace Database\Factories;

use App\Models\Angi;
use App\Models\Suragch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suragch>
 */
class SuragchFactory extends Factory
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
