<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Invitacion;
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

        // Create 5 invites with different User ID (I guess)
        Invitacion::factory()->create(['user_id'=> User::all()->random()->id]);
        Invitacion::factory()->create(['user_id'=> User::all()->random()->id]);
        Invitacion::factory()->create(['user_id'=> User::all()->random()->id]);
        Invitacion::factory()->create(['user_id'=> User::all()->random()->id]);
        Invitacion::factory()->create(['user_id'=> User::all()->random()->id]);


    }
}
