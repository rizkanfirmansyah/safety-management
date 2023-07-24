<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Safety;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        // if ($request->has('month')) {
        //     $month = $request->input('month');
        //     $safeties = Safety::whereRaw('MONTH(created_at) = '.$month)->get();
        //  }

        // $d = Safety::find(1);
        // echo $d->created_at;
        $today = Carbon::now()->isoFormat('D MMMM Y');
        new Carbon();
        $timestemp = "2023-01-01 01:02:03";
        $year = Carbon::createFromFormat('Y-m-d H:i:s', $timestemp)->year;
        $safeties = Safety::all();
        if (isset($_GET['month']) && isset($_GET['year'])) {
            $month = $_GET['month'];
            $year = $_GET['year']; // The year you want to filter by
            $safeties = Safety::whereMonth('date_of_submission', $month)
                ->whereYear('date_of_submission', $year)
                ->get();
        }
        if (isset($_GET['month'])) {
            $month = $_GET['month'];
            $safeties = Safety::whereMonth('date_of_submission', $month)->get();
        }
        if (isset($_GET['year'])) {
            $year = $_GET['year']; // The year you want to filter by
            $safeties = Safety::whereYear('date_of_submission', $year)->get();
        }

        return view('dashboard', compact('safeties', 'options', 'today', 'year', 'months', 'years'));
    }

    public function filter(Request $request)
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

        $today = Carbon::now()->isoFormat('m');
        $safeties = Safety::when($request->month != null, function ($q) use ($request) {
            return $q->whereMonth('created_at', $request->month);
        }, function ($q) use ($today) {
            return $q->whereMonth('created_at', $today);
        })
            ->when($request->year != null, function ($q) use ($request) {
                return $q->where('date_of_hazard_identification', $request->year);
            })->get();
        // if ($request->has('month')) {
        //     $month = $request->input('month');
        //     $safeties = Safety::whereRaw('MONTH(created_at) = '.$month)->get();
        //  }
        return view('dashboard', compact('safeties', 'options', 'today'));
    }

    public function store(Request $request)
    {

        $file = $request->file('file');

        // $fileReporter = $request->file('file_reporter');
        // $fileResponse = $request->file('file_response');

        if ($file) {
            $filePath = $file->store('file');
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
            Safety::create($request->except('risk_probability'));
        } catch (\Throwable $th) {
            return response($th->getMessage());
        }


        return redirect()->route('dashboard.index')
            ->with('success', 'Safety record created successfully.');
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

        // $file = $request->file('file');

        // // $fileReporter = $request->file('file_reporter');
        // // $fileResponse = $request->file('file_response');

        // if ($file) {
        //     $filePath = $file->store('file_reporter');
        //     $validatedData['file_reporter'] = $filePath;
        //     $validatedData['file_response'] = $filePath;
        // }

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
