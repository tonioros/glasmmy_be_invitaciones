<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->tinyInteger('cantidad_invitados');
            $table->string("access_token")->unique();
            $table->unsignedBigInteger("invitacion_id");
            $table->string("mesa_asignada")->nullable();
            $table->dateTime("fecha_limite_confirmo")->nullable();

            $table->timestamps();
            $table->foreign('invitacion_id')->references('id')->on('invitaciones');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitados');
    }
};
