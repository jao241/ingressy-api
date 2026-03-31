<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'status',
    'qr_code',
    'user_id',
    'event_id',
    'payment_id',
])]
class Ticket extends Model
{
    use HasUuids, SoftDeletes;

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Relationships
     */

    // Ticket pertence a um usuário (cliente)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Ticket pertence a um evento
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Ticket pertence a um pagamento
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
