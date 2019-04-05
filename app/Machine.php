<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = [
        'name',
        'city',
        'address',
        'postal_code'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot([
                'amount',
                'position'
            ]);
    }
}
