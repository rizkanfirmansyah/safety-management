<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Safety;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
    {
        $options = [
            1 => 'Aircraft Maintenance',
            2 => 'Aircraft Component / Interior Maintenance',
            3 => 'Dismantling',
            4 => 'Minor / Major Repair',
            5 => 'Ground Run',
            6 => 'Functional Test',
            7 => 'Aircraft Modification'
        ];

        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        $years = [
            2015 => 2015,
            2016 => 2016,
            2017 => 2017,
            2018 => 2018,
            2019 => 2019,
            2020 => 2020,
            2021 => 2021,
            2022 => 2022,
            2023 => 2023,
            2024 => 2024,
            2025 => 2025,
        ];

        $currentTime = now(); 
        $fiveMinutesAgo = now()->subMinutes(5);

        $today = Carbon::now()->isoFormat('D MMMM Y');
        new Carbon();
        $timestemp = "2023-01-01 01:02:03";
        $year = Carbon::createFromFormat('Y-m-d H:i:s', $timestemp)->year;
        if (isset($_GET['month'])) {
            $month = $_GET['month'];
            $safeties = Safety::whereMonth('date_of_submission', $month)
                ->get();
        }

        if (isset($_GET['year'])) {
            $year = $_GET['year']; // The year you want to filter by
            $safeties = Safety::whereYear('date_of_submission', $year)->get();
        }

        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year']; // The year you want to filter by
            $safeties = Safety::whereMonth('date_of_submission', $month)
                ->whereYear('date_of_submission', $year)
                ->get();
        }

        if (!isset($_GET['month']) && !isset($_GET['year'])) {
            $safeties = Safety::where('status', '!=', 'closed')
                ->whereDate('created_at', $currentTime->toDateString())
                ->whereTime('created_at', '>=', $fiveMinutesAgo->toTimeString())
                ->get();
        }

        return view('dashboard', [
            'safeties' => $safeties,
            'options' => $options,
            'today' => $today,
            'year' => $year,
            'months' => $months,
            'years' => $years,
        ]);
    }

    public function store(Request $request)
    {

        $file = $request->file('file');

        // // $fileReporter = $request->file('file_upload');
        // // $fileResponse = $request->file('file_response');

        // // $fileReporter = $request->file('file_response');
        // // $fileResponse = $request->file('file_response');
        // $input = $request->all();


        // if ($file) {
        //     $filename = date('YmdHis') . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
        //     $filePath = $file->storeAs('public/file', $filename);
        //     $request->request->add(['file_response' => asset('storage/file/' . $filename)]);
        // }
        if ($file) {
            $filename =  date('YmdHis') . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/file', $filename);
            $request->request->add(['file_reporter' => asset('storage/file/' . $filename)]);

            // $request->request->add(['file_reporter' => $filePath]);

            $validatedData['file_reporter'] = $filePath;
            // $validatedData['file_response'] = $filePath;
            // $safety->update($validatedData);

        }
        // if ($file) {

        //     $request->request->add(['file_reporter' => asset('storage/file/' . $filename)]);
        //     $validatedData['file_reporter'] = $filePath;


        $request->request->add(['date_of_submission' => date('Y-m-d')]);
        $input = $request->all();


        Safety::create($input);
        return redirect()->route('dashboard.index')
            ->with('success', 'Safety record created successfully.');
        // $fileReporter = $request->file('file_response');
        // $fileResponse = $request->file('file_response');

        // if ($file) {
        //     $filePath = $file->store('file');
        //     $request->request->add(['file_reporter' => $filePath]);
        //     // $request->request->add(['file_response' => $filePath]);
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

        // try {
        //     Safety::create($request->all());
        // } catch (\Throwable $th) {
        //     return response($th->getMessage());
        // }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Safety  $safety
     * @return \Illuminate\Http\Response
     */
    // public function show(Safety $safety)
    // {
    //     return view('dashboard.show', compact('safety'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Safety  $safety
     * @return \Illuminate\Http\Response
     */
    public function edit(Safety $safety)
    {
        return view('dashboard.edit', compact('safety'));
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



        // if ($file) {
        //     $filename =  date('YmdHis') . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
        //     $filePath = $file->storeAs('public/file', $filename);
        //     $request->request->add(['file_reporter' => asset('storage/file/' . $filename)]);
        //     $filePath = $file->store('file');
        //     // $request->request->add(['file_reporter' => $filePath]);

        //     $validatedData['file_reporter'] = $filePath;
        //     // $validatedData['file_response'] = $filePath;
        //     $safety->update($validatedData);

        // }


        $request->request->add(['date_of_submission' => date('Y-m-d')]);

        // $safety->update($validatedData);
        $safety->update($request->all());

        return redirect()->route('dashboard.index')
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

        return redirect()->route('dashboard.index')
            ->with('success', 'Safety record deleted successfully.');
    }

    public function download($path, $filename)
    {
        $resource = '/app/' . $path . '/' . $filename;
        if (!Storage::exists($path)) {
            abort(404);
        }

        $file = Storage::get($path);
        $type = Storage::mimeType($path);

        return (new Response($file, 200))
            ->header('Content-Type', $type)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }

    public function show($path, $filename)
    {
        $filePath = 'app/' . $path . '/' . $filename;

        if (!Storage::exists($filePath)) {
            abort(404);
        }

        $file = Storage::get($filePath);
        $type = Storage::mimeType($filePath);

        return (new Response($file, 200))
            ->header('Content-Type', $type)
            ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
    }
}
