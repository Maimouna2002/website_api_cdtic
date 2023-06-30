<?php

namespace App\Http\Controllers\Authentications;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-login-basic');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            // Authentification réussie, rediriger vers la page d'accueil
            return redirect()->route('dashboard-analytics');
        } else {
            // Authentification échouée, rediriger vers la page de login avec un message d'erreur
            return redirect()->back()->withErrors(['error' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function getUsername()
    {
        $user = Auth::user();

        if ($user) {
            $username = $user->name;
        } else {
            $username = null;
        }

        return $username;
    }
}
