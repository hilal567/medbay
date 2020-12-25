<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettledPaymentsController extends Controller
{
    public function index()
    {
        return view('Payments.SettledPayments.index');
    }
}
