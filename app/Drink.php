<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $appends = [
        'inStock'
    ];

    protected $fillable = [
        'name',
        'image',
        'price'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)
            ->withPivot([
                'amount'
            ]);
    }

    public function getInStockAttribute()
    {
        if ($this->relationLoaded('ingredients') === false) {
            $this->load('ingredients');
        }

        $notInStock = $this->ingredients->filter(function($ingredient) {
            return $ingredient->pivot->amount > $ingredient->amount;
        });

        return $notInStock->isEmpty();
    }
}
