<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(
        AuthService $authService
    ) {
        $this->authService = $authService;  
    }
    /**
     * Login View
     */
    public function login(): View
    {
        return view('auth.login');
    }

    /**
     * Check To Login
     */
    public function loginEnter(LoginRequest $request)
    {
        try {
            $data = $request->validated();

            $this->authService->login($data);
        } catch (\Throwable $th) {
            $th->getMessage();
            return redirect()->back();
        }

        return redirect()->route('dashboard.index');
    }

    /**
     * Logout
     */
    public function logout()
    {
        try {
            $this->authService->logout();
        } catch (\Throwable $th) {
            $th->getMessage();
        }

        return redirect()->route('auth.login');
    }

    /**
     * Register View
     */
    public function register(): View
    {
        return view('auth.register');
    }
}
