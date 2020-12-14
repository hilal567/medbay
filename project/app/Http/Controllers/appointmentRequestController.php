<?php

namespace App\Http\Controllers;
use App\Models\appointmentRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;


class appointmentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
//        $appointment_request = appointmentRequest::latest()->paginate(5);
//        return view('appointment_request.index', compact('appointment_request'))
//            ->with('i', (request()->input('page', 1)-1)* 5);

        return View('request_appointment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointment_request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category'=> 'required',
            'prefered_time'=> 'required',
            'Description'=> 'required',
            'sleep_time'=> 'required',
            'urgency'=> 'required',
            'condition'=> 'required',
            'prefered_doctor'=> 'required',

        ]);

        appointmentRequest::create($request->all());

        return redirect()->route('appointment_request.index')
            ->with('success','Appointment Request created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appointmentRequest  $appointmentRequest
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(appointmentRequest $appointmentRequest)
    {
        //
        return view('appointment_request.show',compact($appointmentRequest));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appointmentRequest  $appointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(appointmentRequest $appointmentRequest)
    {
        //
        return view('appointment_request.edit',compact($appointmentRequest));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\appointmentRequest  $appointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appointmentRequest $appointmentRequest)
    {
        //
        $request->validate([
            'name' => 'required',
            'category'=> 'required',
            'prefered_time'=> 'required',
            'Description'=> 'required',
            'sleep_time'=> 'required',
            'urgency'=> 'required',
            'condition'=> 'required',
            'prefered_doctor'=> 'required',

        ]);

        $appointmentRequest::update($request->all());

        return redirect()->route('appointment_request.index')
            ->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointmentRequest  $appointmentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(appointmentRequest $appointmentRequest)
    {
        //
        $appointmentRequest->delete();
        return redirect()->route('appointment_request.index')
            ->with('success','Product Deleted successfully.');
    }
}
