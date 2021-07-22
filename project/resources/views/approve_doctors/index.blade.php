@extends('home')

@section('content')

    <div class="content" style="margin-left: 15%;">
        <h2 style="margin-left: 15%; margin-top: 2%"> Approve Doctor Applications</h2>
        <table class="table table-bordered">
            <tr>
                <th></th>
                <th>Doctor's name</th>
                <th>Weight</th>
                <th>Height</th>
                <th>Location</th>
                <th>Gender</th>
                <th>Avatar url</th>
                <th>Certification url</th>
                <th>National ID</th>
                <th>Status</th>
            </tr>
            @foreach ($doctors as $details)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>
                        <a href="/doctors_profile/{{$details->id}}">
                        {{\App\Models\User::find($details->user_id)->name}}
                        </a>
                    </td>
                    <td>{{$details->weight}}</td>
                    <td>{{$details->height }}</td>
                    <td>{{$details->location }}</td>
                    <td>{{$details->gender }}</td>
                    <td>{{$details->avatar_url }}</td>
                    <td>{{$details->nationalID}}</td>
                    <td>{{$details->nationalID }}</td>
                    <td>
                        @if($details->status === 0)
                            <p class="badge badge-danger">Not Approved</p>
                        @else
                            <p class="badge badge-success">Approved</p>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
