<?php

namespace App\Services;

use App\Models\User;

class AuthService {
    public function login($email)
    {
        $user = User::where('email', $email)->first();
        $user['token'] = $user->createToken('api')->plainTextToken;
        
        return $user;
    }
}