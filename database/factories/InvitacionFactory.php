<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invitacion>
 */
class InvitacionFactory extends Factory
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
            'fecha_evento' => fake()->date(),
            'lugar_evento' => fake()->streetName(),
            'url_lugar_evento' => fake()->url(),
        ];
    }
}
