<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationChartController extends Controller
{
    public function GenerateLocationReport()
    {
        $groups = DB::table('patients')
            ->select('location', DB::raw('count(*) as total'))
            //   ->where('status',$reported_crimes)
            ->groupBy('location')
            ->pluck('total', 'location')->all();

// Generate random colours for the groups
// for ($i=0; $i<=count($groups); $i++) {
//             $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
//         }

        $colours = array(

                '#00b894',
                '#00cec9',
                '#0984e3',
                '#ff7675',
                '#00cec9',
                '#d63031'

        );
        $key = array_rand($colours);

// Prepare the data for returning with the view
        $chart = new Chart;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;
        return view('user_reports.location', [
            'chart' => $chart
        ]);
    }
}

