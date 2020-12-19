<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MPesaPaymentsController extends Controller
{
    public function index()
    {
        return view('Payments.MpesaPayments.index');
    }
}
