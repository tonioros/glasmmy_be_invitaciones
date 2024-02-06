<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitacion extends Model
{
    use HasFactory;

    protected $table = 'invitaciones';

    protected $fillable = [
        'nombre',
        'fecha_evento',
        'lugar_evento',
        'url_lugar_evento',
        'user_id',
    ];

    /**
     * Get the user that owns the invite
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
