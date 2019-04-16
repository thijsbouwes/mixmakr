<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS = [
        'waiting_for_payment',
        'pending',
        'creating',
        'completed',
        'cancelled'
    ];

    protected $fillable = [
        'price',
        'status',
        'machine_id',
        'user_id',
        'payment_external_id'
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
                'status',
                'quantity',
                'quantity_complete'
            ]);
    }
}
