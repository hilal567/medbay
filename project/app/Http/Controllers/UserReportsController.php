<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserReportsController extends Controller
{
    public function index()
    {
        $appoinments = DB::table('appointments')
            ->select('created_at', DB::raw('count(*) as total'))
            ->groupBy('created_at')
            ->pluck('total', 'created_at')->all();

        // get the months in the DB
        $months = [];
        $appointment_count = [];

        foreach ($appoinments as $key => $value)
        {
            $timestamp = strtotime($key);
            $month = date('F', $timestamp);
            array_push($months, $month);
            array_push($appointment_count, $value);
        }

        for ($i=0; $i<=count($months); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }

        $chart = new Chart();
        $chart->labels = (array_values(array_unique($months)));
        $chart->data = (array_values($appointment_count));
        $chart->colours = $colours;


        return view('user_reports.index', [
            'chart' => $chart
        ]);
    }
}
