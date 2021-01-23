<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserReportsController extends Controller
{
    public function index()
    {
        $appoinments = DB::table('appointments')
        ->select('id', DB::raw('count(*) as total'))
        ->groupBy('id')
        ->pluck('total', 'id')->all();

        $chart = new Chart();


        return view('user_reports.index');
    }
}
