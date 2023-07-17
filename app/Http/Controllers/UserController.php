<?php

namespace App\Http\Controllers;

use App\Models\Organitation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        $users = User::with('organitation', 'role')->get();
        $organitations = Organitation::all();
        return view('users', compact('roles', 'organitations', 'users'));
    }

    public function edit($id)
    {
        $roles = Role::all();
        $users = User::findOrFail($id);
        $organitations = Organitation::all();
        return view('users', compact('roles', 'organitations', 'users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->only([
            'username',
            'fullname',
            'organitation_id',
            'role_id',
        ]));

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }


    public function store(Request $request)
    {
        // Logic to store a new user based on the request data
        $validatedData = $request->validate([
            'username' => 'required',
            'fullname' => 'required',
            'password' => 'required',
            'organitation_id' => 'required',
            'role_id' => 'required',
        ]);

        // Buat instance model User dan simpan data pengguna baru
        $user = new User();
        $user->username = $request->input('username');
        $user->fullname = $request->input('fullname');
        $user->organitation_id = $request->input('organitation_id');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role_id');
        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('users.index')->with('success', 'Item created successfully');
    }
}
