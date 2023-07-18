<?php

namespace App\Http\Controllers;

use App\Models\Safety;
use Illuminate\Http\Request;

class SafetyController extends Controller
{
    //
    public function index()
    {
        return view('safety');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Number' => 'required|max:125',
            'Reporter' => 'required|max:50',
            'Classification' => 'required|max:50',
            'Date_of_Submission' => 'required|date',
            'Date_of_Hazard_Identification' => 'required|date',
            'Location' => 'required|max:255',
            'Type_Operation' => 'required|max:125',
            'Description' => 'nullable',
            'File_Reporter' => 'nullable|max:125',
            'Risk_Probability' => 'required|max:50',
            'Risk_Severity' => 'required|max:50',
            'Risk_Index' => 'required|max:50',
            'COP' => 'required|max:50',
            'HM' => 'required|max:50',
            'CO' => 'required|max:50',
            'Responsible' => 'required|max:50',
            'File_Response' => 'nullable|max:125',
        ]);

        Safety::create($validatedData);

        return redirect()->route('safety.index')
            ->with('success', 'Safety record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Safety  $safety
     * @return \Illuminate\Http\Response
     */
    public function show(Safety $safety)
    {
        return view('safety.show', compact('safety'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Safety  $safety
     * @return \Illuminate\Http\Response
     */
    public function edit(Safety $safety)
    {
        return view('safety.edit', compact('safety'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $safety = Safety::findOrFail($id);

        $validatedData = $request->validate([
            'Number' => 'required|max:125',
            'Reporter' => 'required|max:50',
            'Classification' => 'required|max:50',
            'Date_of_Submission' => 'required|date',
            'Date_of_Hazard_Identification' => 'required|date',
            'Location' => 'required|max:255',
            'Type_Operation' => 'required|max:125',
            'Description' => 'nullable',
            'File_Reporter' => 'nullable|max:125',
            'Risk_Probability' => 'required|max:50',
            'Risk_Severity' => 'required|max:50',
            'Risk_Index' => 'required|max:50',
            'COP' => 'required|max:50',
            'HM' => 'required|max:50',
            'CO' => 'required|max:50',
            'Responsible' => 'required|max:50',
            'File_Response' => 'nullable|max:125',
        ]);

        $safety->update($validatedData);

        return redirect()->route('safety.index')
            ->with('success', 'Safety record updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $safety = Safety::findOrFail($id);
        $safety->delete();

        return redirect()->route('safety.index')
            ->with('success', 'Safety record deleted successfully.');
    }
}
