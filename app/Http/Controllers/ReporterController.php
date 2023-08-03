<?php

namespace App\Http\Controllers;

use App\Models\Safety;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Response as FacadeResponse;

class ReporterController extends Controller
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

        $safeties = Safety::all();
        return view('reporter', compact('safeties', 'options'));
    }

    public function store(Request $request)
    {

        $file = $request->file('file');

        // $fileReporter = $request->file('file_reporter');
        // $fileResponse = $request->file('file_response');

        if ($file) {
            $filePath = $file->store('file');
            $request->request->add(['file_reporter' => $filePath]);
            // $request->request->add(['file_response' => $filePath]);
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
        

        
            // $todo = new Safety();
            // $todo->reporter = $reporter;
            // // $todo->title = $request->get('title');
            // $todo->save();
        
    
    
            
            // use within single line code
            // $id = IdGenerator::generate(['table' => 'todos', 'length' => 6, 'prefix' => date('y')]);
            
            // output: 160001
            // $reporter = IdGenerator::generate(['table' => 'safeties', 'field'=>'reporter', 'length' => 6, 'prefix' => '16026']);  
            // $todo = new Safety();
            // $todo->reporter = $reporter;
            // // // $todo->title = $request->get('title');
            // $c = $todo->save();
        try {
            $c = Safety::create($request->all());
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }

        return redirect()->route('reporter.index')
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
        return view('reporter.show', compact('safety'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Safety  $safety
     * @return \Illuminate\Http\Response
     */
    public function edit(Safety $safety)
    {
        return view('reporter.edit', compact('safety'));
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
        // $request->validate([
        //     'file_reporter' => 'image|mimes:jpeg,png,jpg'
        // ]);

        $safety = Safety::findOrFail($id);

        $file = $request->file('file');

        // $fileReporter = $request->file('file_upload');
        // $fileResponse = $request->file('file_response');

        if ($file) {
            $filename =  date('YmdHis') . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/file', $filename);
            $request->request->add(['file_reporter' => asset('storage/file/' . $filename)]);
            $filePath = $file->store('file');
            // $request->request->add(['file_reporter' => $filePath]);

            $validatedData['file_reporter'] = $filePath;
            // $validatedData['file_response'] = $filePath;
            $safety->update($validatedData);

        }
        $request->request->add(['date_of_submission' => date('Y-m-d')]);

        $safety->update($request->all());
        $request->request->add(['date_of_submission' => date('Y-m-d')]);

        // dd($request->all());
        $safety->update($request->all());
  

        return redirect()->route('reporter.index')
        return redirect()->route('reporter.index')
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

        return redirect()->route('reporter.index')
            ->with('success', 'Safety record deleted successfully.');
    }

    public function download($path, $filename)
    {
        
        $resource = '/app/' . $path . '/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        // ob_end_clean();
        // ob_start();
        $file = Storage::get($path);
        $type = Storage::mimeType($path);   
        return (new Response($file, 200))
            // ->ob_end_clean()
            // ->ob_start()
            ->header('Content-Type', $type)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}
