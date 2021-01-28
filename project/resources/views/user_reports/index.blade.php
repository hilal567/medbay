@extends('home')

@section('content')

    <div class="container">

        <div class="row my-5">
            <h3>User Reports</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <canvas id="user_reports" class="rounded shadow"></canvas>

            </div>
        </div>
    </div>

@endsection

@section('js_after')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('user_reports').getContext('2d');
        var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: {!! json_encode($chart->labels) !!},
            datasets: [{
            label: 'Appointments per month',
            backgroundColor: {!! json_encode($chart->colours)!!},
            data: {!!json_encode($chart->data)!!}
            }]
        },

        // Configuration options go here
        options: {}
        });
    </script>
@endsection
