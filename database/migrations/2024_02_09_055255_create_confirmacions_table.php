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
        Schema::create('confirmaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("invitado_id");
            $table->unsignedBigInteger("invitacion_id");
            $table->boolean('confirmado');
            $table->dateTime('fecha_confirmacion');
            $table->tinyInteger('total_personas_conf');

            $table->timestamps();
            $table->foreign('invitado_id')->references('id')->on('invitados');
            $table->foreign('invitacion_id')->references('id')->on('invitaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmaciones');
    }
};
