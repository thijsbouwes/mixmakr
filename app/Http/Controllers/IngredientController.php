<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientUpdateRequest;
use App\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IngredientController extends Controller
{
    public function index()
    {
        return Ingredient::all();
    }

    public function update(IngredientUpdateRequest $ingredientUpdateRequest)
    {
        foreach ($ingredientUpdateRequest->get('ingredients') as $ingredient) {
            Ingredient::where('id', $ingredient['id'])->update([
                'amount' => $ingredient['amount'],
                'position' => $ingredient['position']
            ]);
        }

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
