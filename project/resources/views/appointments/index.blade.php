@extends('home')

@section('content')
    <div class="justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Appointments</h2>
            </div>
        </div>
    </div>

    <div class="content">
        <table class="table table-bordered">
            <tr>
                <th></th>
                <th>Doctor's name</th>
                <th>Patient's name</th>
                <th>Diagnosis</th>
                <th>Amount</th>
                <th>Appointment status</th>
                <th>Payment status</th>

            </tr>
            @forelse ($appointments as $details)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$details->doctor_id}}</td> {{-- Display NAME HERE !!--}}
                    <td>{{$details->patient_id}}</td> {{-- Display NAME HERE !!--}}
                    <td>{{$details->diagnosis}}</td>
                    <td>{{$details->amount}}</td>
                    <td>
                        @if($details->appointment_status === 0)
                            <p>Waiting</p>
                        @else
                            <p>Completed</p>
                        @endif
                    </td>
                    <td>
                        @if($details->payment_status === 0)
                            <p>Pending</p>
                        @else
                            <p>Completed</p>
                        @endif
                    </td>
                </tr>
                @empty

            @endforelse
        </table>
    </div>


@endsection

