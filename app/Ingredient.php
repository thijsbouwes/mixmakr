<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    const SODA = 'soda';
    const LIQUOR = 'liquor';

    protected $appends = [
        'type'
    ];

    protected $fillable = [
        'name',
        'liquor_percentage',
        'position',
        'amount'
    ];

    public function drinks()
    {
        return $this->belongsToMany(Drink::class)
            ->withPivot([
                'amount'
            ]);
    }

    public function getTypeAttribute()
    {
        if ($this->liquor_percentage > 0) {
            return self::LIQUOR;
        }

        return self::SODA;
    }
}
