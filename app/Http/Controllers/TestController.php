<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show()
    {
        $user = User::findorFail(3);

        // Creating a token without scopes...
        $token = $user->createToken('Machine token')->accessToken;

        dd($token);
    }
}
