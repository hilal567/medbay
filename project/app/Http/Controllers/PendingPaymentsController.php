<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendingPaymentsController extends Controller
{
    public function index()
    {
        return view('Payments.PendingPayments.index');
    }
}
