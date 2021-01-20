@extends('home')

@section('content')
    <div class="justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Appointments Requests</h2>
            </div>
        </div>
    </div>

    <div class="content">
        <table class="table table-bordered">
            <tr>
                <th></th>
                <th>Doctor's name</th>
                <th>Category</th>
                <th>Preferred time</th>
                <th>Description</th>
                <th>Sleep hours</th>
                <th>Urgency</th>
                <th>Condition</th>
                <th>Status</th>
                <th width="280px">Action</th>

            </tr>
            @foreach ($appointment_requests as $requests)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$requests->doctor_id}}</td> {{-- Display NAME HERE !!--}}
                    <td>{{ $requests->category }}</td>
                    <td>{{ $requests->preferred_time }}</td>
                    <td>{{ $requests->Description }}</td>
                    <td>{{ $requests->sleep_hours }}</td>
                    <td>{{ $requests->urgency }}</td>
                    <td>{{ $requests->condition }}</td>
                    <td>
                        @if($requests->status === 0)
                            <p>Pending</p>
                        @else
                            <p>Accepted</p>
                        @endif
                    </td>
                    <td>
                        <form action="/reassign_doctor/{{$requests->id}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info">Reassign</button>
                        </form>

                        <form action="/delete_request/{{$requests->id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


@endsection

