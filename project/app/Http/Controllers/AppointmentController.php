<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //

    public function index(){

        $appointments = Appointment::all();

        return view('appointments.index', [
            'appointments' => $appointments
        ]);
    }

    public function store(Request $request){

    }

    public function update(Request $request){

    }

    public function destroy(Request $request){

    }
}
