<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'liquor_percentage'
    ];

    public function drinks()
    {
        return $this->belongsToMany(Drink::class)
            ->withPivot([
                'amount'
            ]);
    }

    public function machines()
    {
        return $this->belongsToMany(Machine::class)
            ->withPivot([
                'amount',
                'position'
            ]);
    }
}
