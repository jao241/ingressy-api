<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

#[Fillable([
    'payment_method',
    'installments',
    'fee',
    'status',
    'amount',
    'paid_at',
    'event_id',
    'user_id',
])]
class Payment extends Model
{
    use HasUuids;

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'fee' => 'decimal:2',
            'paid_at' => 'datetime',
        ];
    }

    /**
     * Relationships
     */

    // Pagamento pertence a um usuário (cliente)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Pagamento pertence a um evento
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Pagamento pode gerar um ticket (1:1)
    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
}
