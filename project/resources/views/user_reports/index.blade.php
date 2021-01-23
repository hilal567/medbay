@extends('home')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <!-- Pie Chart -->
            <div class="block">
                <div class="block-header block-header-default">
                    <div class="block-options">
                        <div class="block-options-item">
                            <span class="js-flot-live-info text-primary font-w700"></span>
                        </div>
                        <div class="block-options-item">
                            <i class="fa fa-refresh fa-spin text-muted"></i>
                        </div>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <!-- Pie Chart Container -->
                    <canvas id="user_reports" width="370" height="120" class="rounded shadow"></canvas>
                </div>
            </div>
            <!-- END Pie Chart -->
        </div>
    </div>

@endsection

@section('js_after')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('user_reports').getContext('2d');
        var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',

        // The data for our dataset
        data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 45]
        }]
        },

        // Configuration options go here
        options: {}
        });
    </script>
@endsection
