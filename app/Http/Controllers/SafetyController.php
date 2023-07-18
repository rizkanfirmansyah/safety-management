<?php

namespace App\Http\Controllers;

use App\Models\Safety;
use Illuminate\Http\Request;

class SafetyController extends Controller
{
    //
    public function index()
    {
        $safeties = Safety::all();
        return view('safety', compact('safeties'));
    }

    public function store(Request $request)
    {

        $file = $request->file('file_upload');

        // $fileReporter = $request->file('file_reporter');
        // $fileResponse = $request->file('file_response');

        if ($file) {
            $filePath = $file->store('file_upload');
            $request->request->add(['file_reporter' => $filePath]);
            $request->request->add(['file_response' => $filePath]);
        }

        $request->request->add(['date_of_submission' => date('Y-m-d')]);

        // if ($fileReporter) {
        //     $fileReporterPath = $fileReporter->store('file_reporter');
        //     $validatedData['file_reporter'] = $fileReporterPath;
        // }

        // if ($fileResponse) {
        //     $fileResponsePath = $fileResponse->store('file_response');
        //     $validatedData['file_response'] = $fileResponsePath;
        // }

        try {
            Safety::create($request->all());
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }

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
