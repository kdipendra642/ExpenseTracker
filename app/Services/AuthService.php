<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $data): bool
    {
        if (Auth::attempt([
            'email' => $data['email'], 
            'password' => $data['password']
        ])) {
            // Auth::login();
            return true;
        } else {
            throw new \Exception('Invalid email or password.');
        }

        return false;

    }

    public function logout()
    {
        Auth::logout();
    }
}