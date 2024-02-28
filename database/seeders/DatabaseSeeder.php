<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Confirmacion;
use App\Models\Invitacion;
use App\Models\Invitado;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        $allUsers = User::all();
        // Create 5 invites with different User ID (I guess)
        Invitacion::factory()->create(['user_id' => $allUsers->random()->id]);
        Invitacion::factory()->create(['user_id' => $allUsers->random()->id]);
        Invitacion::factory()->create(['user_id' => $allUsers->random()->id]);
        Invitacion::factory()->create(['user_id' => $allUsers->random()->id]);
        Invitacion::factory()->create(['user_id' => $allUsers->random()->id]);

        $allInvitaciones = Invitacion::all();
        // Create 10 without attenders using before created Invites
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id, 'nombre' => null]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id, 'nombre' => null]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id, 'nombre' => null]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id, 'nombre' => null]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id, 'nombre' => null]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id, 'nombre' => null]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id, 'nombre' => null]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id, 'nombre' => null]);
        // Create 3 Invites with attender assigned
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id]);
        Invitado::factory()->create(['invitacion_id' => $allInvitaciones->random()->id]);

        $allInvitado = Invitado::all();
        Confirmacion::factory()->create(['invitado_id' => $allInvitado->random()->id]);
        Confirmacion::factory()->create(['invitado_id' => $allInvitado->random()->id]);
        Confirmacion::factory()->create(['invitado_id' => $allInvitado->random()->id]);
        Confirmacion::factory()->create(['invitado_id' => $allInvitado->random()->id]);
        Confirmacion::factory()->create(['invitado_id' => $allInvitado->random()->id]);

    }
}
