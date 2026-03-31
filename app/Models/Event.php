<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

#[Fillable([
    'name',
    'description',
    'cover_image',
    'location',
    'max_capacity',
    'is_unlimited',
    'event_date',
    'user_id',
])]
class Event extends Model
{
    use HasUuids;

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [
            'is_unlimited' => 'boolean',
            'event_date' => 'date',
        ];
    }

    /**
     * Relationships
     */

    // Evento pertence a um organizador (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Evento possui vários ingressos
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    // Evento possui vários pagamentos
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
