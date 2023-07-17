<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('role', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Role::create($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $role = Role::findOrFail($id);
        $role->update($validatedData);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}
