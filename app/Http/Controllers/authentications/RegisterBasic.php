<?php

namespace App\Http\Controllers\Authentications;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterBasic extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-register-basic');
    }

    public function register(AuthRequest $request)
    {
        $credentials = $request->validated();

        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $credentials['username'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
        ]);

        // Authentifier l'utilisateur nouvellement créé
        Auth::login($user);

        // Rediriger vers la page d'accueil ou une autre page appropriée après l'inscription réussie
        return redirect()->route('dashboard-analytics');
    }
}
