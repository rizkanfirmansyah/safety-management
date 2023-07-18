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
}
