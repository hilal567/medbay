<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuspendDoctorController extends Controller
{
    public function index()
    {
        return view('suspendDoctor.index');
    }
}
