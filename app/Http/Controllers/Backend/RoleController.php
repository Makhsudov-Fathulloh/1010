<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Show all roles
     */
    public function index()
    {
        $roles = Role::all();
        return view('backend.role.index', compact('roles'));
    }

    /**
     * Role creation form
     */
    public function create()
    {
        $role = new Role();

        return view('backend.role.create', compact('role'));
    }

    /**
     * Save new role
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Role::create($request->only(['title', 'description']));

        return redirect()->route('role.index');
    }

    /**
     * Role edit form
     */
    public function edit(Role $role)
    {
        return view('backend.role.update', compact('role'));
    }

    /**
     * Update role
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $role->update($request->only(['title', 'description']));

        return redirect()->route('role.index');
    }

    /**
     * Delete role
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('role.index');
    }
}
