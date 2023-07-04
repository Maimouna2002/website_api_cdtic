<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('content.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('content.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'roles' => 'required|array',
        ]);

        // Créer un nouvel utilisateur
        $user = User::create($validatedData);

        // Assigner les rôles à l'utilisateur
        $user->attachRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('content.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable',
            'roles' => 'required|array',
        ]);

        // Mettre à jour les données de l'utilisateur
        $user->update($validatedData);

        // Assigner les rôles à l'utilisateur
        $user->syncRoles($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès');
    }

public function countUsers()
{
    // Compter le nombre d'utilisateurs
    $nombreUtilisateurs = User::count();

    // Retourner le nombre d'utilisateurs
    return $nombreUtilisateurs;
}

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');
    }
}
