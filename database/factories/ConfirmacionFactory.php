<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Confirmacion>
 */
class ConfirmacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "invitado_id" => fake()->randomNumber(),
            "invitacion_id" => fake()->randomNumber(),
            'confirmado' => fake()->boolean(),
            'fecha_confirmacion' => fake()->dateTime(),
            'total_personas_conf' => fake()->numberBetween(1, 5),
        ];
    }
}
