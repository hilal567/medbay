<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('approve_doctors.index', compact('doctors'));
    }

    public function show($id)
    {
//        $doctor_details = User::find($id);
//        $doctor_data = Doctor::where('user_id', $id);

        return view('doctor.show'); //Todo Fix this view, it's not showing css
    }
}
