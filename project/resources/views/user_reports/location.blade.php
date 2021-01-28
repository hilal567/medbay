@extends('home')

@section('content')


    <div class="container">

        <div class="row my-5">
            <h3>Location Based  Reports</h3>
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

    <!-- CHARTS -->
    <script>
        var ctx = document.getElementById('user_reports').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
// The data for our dataset
            data: {
                labels:  {!!json_encode($chart->labels)!!} ,
                datasets: [
                    {
                        label: 'LOCATIONS',
                        backgroundColor: {!! json_encode($chart->colours)!!} ,
                        data:  {!! json_encode($chart->dataset)!!} ,
                    },
                ]
            },
// Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    </script>
@endsection
