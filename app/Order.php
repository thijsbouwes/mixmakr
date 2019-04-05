<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS = [
        'waiting_for_payment',
        'creating',
        'completed'
    ];

    const PAYMENT_STATUS = [
        'pending',
        'accepted',
        'cancelled'
    ];

    protected $fillable = [
        'price',
        'status',
        'user_id',
        'payment_external_id',
        'payment_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function drinks()
    {
        return $this->belongsToMany(Drink::class)
            ->withPivot([
                'status'
            ]);
    }
}
