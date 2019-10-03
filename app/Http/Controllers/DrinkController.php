<?php

namespace App\Http\Controllers;

use App\Drink;

class DrinkController extends Controller
{
    public function index()
    {
        return Drink::all();
    }

    public function popularIndex()
    {
        return Drink::limit(4)->get();
    }
}
