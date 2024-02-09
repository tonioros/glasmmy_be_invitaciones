<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    use HasFactory;

    protected $table = 'invitados';
    protected $fillable = [
        'nombre',
        'cantidad_invitados',
        "access_token",
        "invitacion_id",
        "mesa_asignada",
        "fecha_limite_confirmo",
    ];

    protected $hidden = ["access_token"];
}
