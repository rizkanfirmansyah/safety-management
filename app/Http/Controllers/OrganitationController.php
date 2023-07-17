<?php

namespace App\Http\Controllers;

use App\Models\Organitation;
use Illuminate\Http\Request;

class OrganitationController extends Controller
{
    public function index()
    {
        $organitations = Organitation::all();
        return view('organitation', compact('organitations'));
    }

    public function create()
    {
        return view('organitations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Organitation::create($validatedData);

        return redirect()->route('organitations.index')->with('success', 'organitation created successfully');
    }

    public function edit($id)
    {
        $organitation = Organitation::findOrFail($id);
        return view('organitations.edit', compact('organitation'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $organitation = Organitation::findOrFail($id);
        $organitation->update($validatedData);

        return redirect()->route('organitations.index')->with('success', 'organitation updated successfully');
    }

    public function destroy($id)
    {
        $organitation = Organitation::findOrFail($id);
        $organitation->delete();

        return redirect()->route('organitations.index')->with('success', 'organitation deleted successfully');
    }
}
