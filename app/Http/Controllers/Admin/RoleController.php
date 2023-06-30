<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('content.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('content.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
            'display_name' => 'required',
            'description' => 'nullable',
            'permissions' => 'array',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index')->with('success', 'Le rôle a été créé avec succès.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('content.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'display_name' => 'required',
            'description' => 'nullable',
            'permissions' => 'array',
        ]);

        $role->update([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index')->with('success', 'Le rôle a été mis à jour avec succès.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Le rôle a été supprimé avec succès.');
    }
}
