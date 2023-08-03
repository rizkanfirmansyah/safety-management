<?php

namespace App\Http\Controllers;

use App\Models\Safety;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SafetyController extends Controller
{
    //
    public function index()
    {
        $options = [
            1 => 'Aircraft Maintenance',
            2 => 'Aircraft Component / Interior Maintenance',
            3 => 'Dismantling',
            4 => 'Minor / Major Repair',
            5 => 'Ground Run',
            6 => 'Functional Test',
            7 => 'Aircraft Modification',
        ];
        // $safeties = Safety::all();
        $safeties = Safety::whereNotNull('file_response')
                ->orWhere('status', '!=', 'reject')
                ->get();
                // dd($safeties);
        return view('safety', compact('safeties', 'options'));
    }

    public function store(Request $request)
    {

        // $file = $request->file('file');

        // // $fileReporter = $request->file('file_response');
        // // $fileResponse = $request->file('file_response');

        // if ($file) {
        //     $filename = Hash::make($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        //     $filePath = $file->storeAs('public/file', $filename);
        //     $request->request->add(['file_response' => asset('storage/file/' . $filename)]);
        // }

        // $request->request->add(['date_of_submission' => date('Y-m-d')]);

        // if ($fileReporter) {
        //     $fileReporterPath = $fileReporter->store('file_response');
        //     $validatedData['file_response'] = $fileReporterPath;
        // }

        // if ($fileResponse) {
        //     $fileResponsePath = $fileResponse->store('file_response');
        //     $validatedData['file_response'] = $fileResponsePath;
        // }
        
        // if ($request->status == 'reject') {
        //     return redirect()->route('reporter.index')
        //     ->with('errors', 'Safety has been rejected.');

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

        $file = $request->file('file');

        // $fileReporter = $request->file('file_response');
        // $fileResponse = $request->file('file_response');

       
        if ($file) {
            $filename = date('YmdHis') . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/file', $filename);
            $request->request->add(['file_response' => asset('storage/file/' . $filename)]);
            
            $validatedData['file_response'] = $filePath;
            // $validatedData['file_response'] = $filePath;
            $safety->update($validatedData);
        }

        $request->request->add(['date_of_submission' => date('Y-m-d')]);

        if ($request->status == 'reject') {
            $safety->update($request->all());
            
            return redirect()->route('reporter.index')
            ->with('errors', 'Safety has been rejected.');

        } 
        // $safety->save();
       
        // if ($fileReporter) {
        //     $fileReporterPath = $fileReporter->store('file_response');
        //     $validatedData['file_response'] = $fileReporterPath;
        // }

        // if ($fileResponse) {
        //     $fileResponsePath = $fileResponse->store('file_response');
        //     $validatedData['file_response'] = $fileResponsePath;
        // }
        // if ($validatedData->passes() && $request->file('file')->isValid()) {
        //     $safety->update($validatedData);
            
        // }
        try {
            $safety->update($request->all());
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }

        // $safety = $request->validateData;
        // $safety->update($validatedData);
        // $safety['validatedData'] = $validatedData;
        // try {
        // } catch (\Throwable $th) {
        //     return response($th->getMessage());
        // }


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

    public function download($path, $filename)
    {
       
        $resource = '/app/' . $path . '/' . $filename;
        // dd($resource);

        if (!Storage::exists($path)) {
            abort(404);
        }

        $file = Storage::get($path);
        $type = Storage::mimeType($path);
        // $imagePath = Storage::url($path);
        // return response()->download(public_path($imagePath));
    
        return (new Response($file, 200))
            ->ob_end_clean()
            ->header('Content-Type', $type)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
       
    }
}
