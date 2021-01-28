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
        $doctor = Doctor::where('id', $id)->first();

        return view('doctor.doctor-details')->with('doctor', $doctor); //Todo Fix this view, it's not showing css
    }

    public function approve($id)
    {
        $doctor = Doctor::where('id', $id)->first();

        if ($doctor){
            $doctor->status = true;
            $doctor->save();
        }

        return redirect()->back()->with('doctor', $doctor)->with('success', "Doctor Approved successfully"); //Todo Fix this view, it's not showing css
    }
}
