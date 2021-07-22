@extends('home')

@section('content')
    <div class="justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="margin-left: 15%">Appointments</h2>
            </div>
        </div>
    </div>

    <div class="content ml-5">
        <div class="row justify-content-center ml-5">
            <div class="col-lg-9">
                <table class="table display table-bordered">
                    <tr>
                        <th></th>
                        <th style="width: 150px">Doctor's name</th>
                        <th style="width: 150px">Patient's name</th>
                        <th style="width: 150px">Diagnosis</th>
                        <th style="width: 150px">Amount</th>
                        <th style="width: 150px">Appointment status</th>
                        <th style="width: 150px">Payment status</th>

                    </tr>
                    @forelse ($appointments as $details)
                        <tr>
                            <td style="width: 50px">{{ $loop->iteration }}</td>
                            <td style="width: 150px">{{$details->doctorname}}</td> {{-- Display NAME HERE !!--}}
                            <td style="width: 150px">{{$details->patientname}}</td> {{-- Display NAME HERE !!--}}
                            <td style="width: 250px">{{$details->diagnosis}}</td>
                            <td style="width: 150px">{{$details->amount}}</td>
                            <td style="width: 150px">
                                @if($details->appointment_status === 0)
                                    <p class="badge badge-primary">Waiting</p>
                                @else
                                    <p class="badge badge-success">Completed</p>
                                @endif
                            </td>
                            <td style="width: 150px">
                                @if($details->payment_status === 0)
                                    <p class="badge badge-danger">Pending</p>
                                @else
                                    <p class="badge badge-success">Completed</p>
                                @endif
                            </td>
                        </tr>
                    @empty

                    @endforelse
                </table>

            </div>
        </div>

    </div>

{{--    <div class="content">--}}
{{--        <table class="table table-bordered" style="margin-left: 15%">--}}
{{--           --}}
{{--        </table>--}}
{{--    </div>--}}


@endsection

