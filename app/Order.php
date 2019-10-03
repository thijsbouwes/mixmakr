<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING = 'pending';
    const CANCELLED = 'cancelled';

    const STATUS = [
        self::PENDING,
        self::CANCELLED,
        'creating',
        'completed'
    ];

    protected $fillable = [
        'price',
        'status',
        'user_id',
        'drink_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drink()
    {
        return $this->belongsTo(Drink::class);
    }
}
