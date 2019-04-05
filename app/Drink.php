<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = [
        'name',
        'image',
        'price'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withPivot([
                'status'
            ]);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot([
                'amount'
            ]);
    }
}
