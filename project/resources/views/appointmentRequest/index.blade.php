@extends('home')

@section('content')
    <div class="justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Appointments Requests</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('appointment_request.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="content">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Description</th>
                <th>Sleeping Hours</th>
                <th>Urgency</th>
                <th>Condition</th>
                <th>Preferred Doctor</th>
                <th width="280px">Action</th>

            </tr>
            {{--@foreach ($appointmentRequest as $appointmentRequest)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $appointmentRequest->category }}</td>
                    <td>{{ $appointmentRequest->Description }}</td>
                    <td>{{ $appointmentRequest->sleeping_time }}</td>
                    <td>{{ $appointmentRequest->urgency }}</td>
                    <td>{{ $appointmentRequest->condition }}</td>
                    <td>{{ $appointmentRequest->prefered_doctor }}</td>
                    <td>
                        <form action="{{ route('appointment_request.destroy',$appointmentRequest->id) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('appointment_request.show',$appointmentRequest->id) }}">Show</a>

                            <a class="btn btn-primary" href="{{ route('appointment_request.edit',$appointmentRequest->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach--}}
        </table>
    </div>

    {{--{!! $appointmentRequest->links() !!}--}}

@endsection
