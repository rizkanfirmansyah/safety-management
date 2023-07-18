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
            'reporter' => 'nullable|max:50',
            'classification' => 'nullable|max:50',
            'date_of_submission' => 'nullable|date',
            'date_of_hazard_identification' => 'nullable|date',
            'location' => 'nullable|max:255',
            'type_operation' => 'nullable|max:125',
            'description' => 'nullable',
            'risk_probability' => 'nullable|max:50',
            'risk_severity' => 'nullable|max:50',
            'risk_index' => 'nullable|max:50',
            'cop' => 'nullable|max:50',
            'hm' => 'nullable|max:50',
            'co' => 'nullable|max:50',
            'responsible' => 'nullable|max:50',
            'file_upload' => 'nullable|file',
        ]);

        $file = $request->file('file_upload');

        // $fileReporter = $request->file('file_reporter');
        // $fileResponse = $request->file('file_response');

        if ($file) {
            $filePath = $file->store('file_reporter');
            $validatedData['file_reporter'] = $filePath;
            $validatedData['file_response'] = $filePath;
        }

        // if ($fileReporter) {
        //     $fileReporterPath = $fileReporter->store('file_reporter');
        //     $validatedData['file_reporter'] = $fileReporterPath;
        // }

        // if ($fileResponse) {
        //     $fileResponsePath = $fileResponse->store('file_response');
        //     $validatedData['file_response'] = $fileResponsePath;
        // }

        Safety::create($validatedData);

        return redirect()->route('safeties.index')
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
            'reporter' => 'nullable|max:50',
            'classification' => 'nullable|max:50',
            'date_of_submission' => 'nullable|date',
            'date_of_hazard_identification' => 'nullable|date',
            'location' => 'nullable|max:255',
            'type_operation' => 'nullable|max:125',
            'description' => 'nullable',
            'risk_probability' => 'nullable|max:50',
            'risk_severity' => 'nullable|max:50',
            'risk_index' => 'nullable|max:50',
            'cop' => 'nullable|max:50',
            'hm' => 'nullable|max:50',
            'co' => 'nullable|max:50',
            'responsible' => 'nullable|max:50',
            'file_upload' => 'nullable|file',
        ]);

        $file = $request->file('file_upload');

        // $fileReporter = $request->file('file_reporter');
        // $fileResponse = $request->file('file_response');

        if ($file) {
            $filePath = $file->store('file_reporter');
            $validatedData['file_reporter'] = $filePath;
            $validatedData['file_response'] = $filePath;
        }

        $safety->update($validatedData);

        return redirect()->route('safeties.index')
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

        return redirect()->route('safeties.index')
            ->with('success', 'Safety record deleted successfully.');
    }
}
