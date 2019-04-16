<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function self()
    {
        return Auth::user();
    }

    public function store(StoreUserRequest $storeUserRequest)
    {
        $data             = $storeUserRequest->validated();
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }
}
