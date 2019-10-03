<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING = 'pending';

    const STATUS = [
        self::PENDING,
        'creating',
        'completed',
        'cancelled'
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
