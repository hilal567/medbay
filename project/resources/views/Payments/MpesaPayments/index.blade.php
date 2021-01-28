@extends('home')

@section('content')
    <h1> Mpesa Payments </h1>

    <table class="table table-bordered table-responsive-lg" style="margin-left:0%; margin-right: 20%;">
        <thead>
        <tr STYLE="width: 50%">

            <th>amount</th>
            <th>description</th>
            <th>mode</th>
            <th>phone_number</th>
            <th>merchant_id</th>
            <th>date made</th>
        </tr>
        </thead>
        <tbody>
        @forelse($payments as $details)
            <tr>
                <td>{{$details->amount}}</td>
                <td>{{$details->description}}</td>
                <td>{{$details->mode}}</td>
                <td>{{$details->phone_number}}</td>
                <td>{{$details->merchant_id}}</td>
                <td>{{$details->date_made}}</td>
            </tr>
        @empty
            <tr>
                <td>NO PAYMENTS MADE</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
