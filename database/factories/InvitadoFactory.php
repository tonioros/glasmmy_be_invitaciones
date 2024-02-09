<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invitado>
 */
class InvitadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'cantidad_invitados' => fake()->numberBetween(1, 10),
            "access_token" => Str::random(32),
            "invitacion_id" => fake()->uuid(),
            "mesa_asignada" => fake()->numberBetween(1, 10),
            "fecha_limite_confirmo" => fake()->dateTime(),
        ];
    }
}
