<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('content.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('content.permissions.create');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire

        Permission::create($request->all());
        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit(Permission $permission)
    {
        return view('content.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        // Valider les données du formulaire

        $permission->update($request->all());
        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }
}
