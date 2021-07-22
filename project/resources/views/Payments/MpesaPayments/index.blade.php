@extends('home')

@section('content')
    <div class="justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="margin-left: 15%">Mpesa Payments</h2>
            </div>
        </div>
    </div>

    <div class="content ml-5">
        <div class="row justify-content-center ml-5">
            <div class="col-lg-9">
                <table class="table display table-bordered">
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

            </div>
        </div>

    </div>

{{--    <table class="table table-bordered table-responsive-lg" style="margin-left:0%; margin-right: 20%;">--}}
{{--       --}}
{{--    </table>--}}

@endsection
