<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmacion extends Model
{
    use HasFactory;

    protected $table = "confirmaciones";

    protected $fillable = [
        "invitado_id",
        "invitacion_id",
        'confirmado',
        'fecha_confirmacion',
        'total_personas_conf',
    ];

    public function invitado()
    {
        return $this->hasOne(Invitado::class)->oldestOfMany();
    }

    public function invitacion()
    {
        return $this->hasOne(Invitacion::class);
    }
}
