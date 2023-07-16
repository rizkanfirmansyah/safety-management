<?php

namespace App\Http\Controllers;

use App\Models\Organitation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        $organitations = Organitation::all();
        return view('users', compact('roles', 'organitations'));
    }

    public function edit($id)
    {
        // Logic to retrieve the user with the given ID and pass it to the edit view
    }

    public function update(Request $request, $id)
    {
        // Logic to update the user with the given ID based on the request data
    }

    public function destroy($id)
    {
        // Logic to delete the user with the given ID
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
