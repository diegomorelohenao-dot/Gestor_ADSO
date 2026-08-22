<?php

namespace Database\Factories;

use App\Models\Aprendiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Aprendiz>
 */
class AprendizFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'documento' => (string) $this->faker->unique()->numerify('##########'),
            'correo' => $this->faker->unique()->safeEmail(),
            'ficha_id' => $this->faker->optional()->numberBetween(100000, 999999),
        ];
    }
}
