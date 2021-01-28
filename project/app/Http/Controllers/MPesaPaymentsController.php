<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Services\Mpesa\PaymentActions;
use Illuminate\Http\Request;

class MPesaPaymentsController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('Payments.MpesaPayments.index', [
            'payments'=> $payments
        ]);
    }

    public function pay(Request $request){
//        $paymentAction = new PaymentActions();

        if ($this->createPush($request)){
            return "Request Successful.";

        }
        else{
            return "Request Successful.";
        }

    }

    public function createPush(Request $request){

        $mpesaController = new MpesaController();

        $response = $mpesaController->customerMpesaSTKPush($request);


        if (property_exists($response, 'ResponseCode') && $response->ResponseCode == '0') {

            Payment::create([
                'amount' => $request->amount,
                'description' => $response->CheckoutRequestID,
                'mode' => "Mpesa",
                'phone_number' => $request->phone_number,
                'merchant_id' => $response->MerchantRequestID,
                'appointment_id' => $request->appointment_id,
            ]);

            return true;
        }
        else {

            return false;
        }
    }


}
