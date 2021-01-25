<?php

namespace App\Services\Mpesa;

use App\Http\Controllers\MpesaController;

use App\Models\Appointment;
use App\Models\Payment;
use Illuminate\Http\Request;


class PaymentActions
{


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

    public function updatePayment($data){

        $payment_model = Payment::where('description', $data['checkout_request_id'])->first();


        if ($payment_model){
            $payment_model->amount = $data['amount'];
            $payment_model->date_made = $data['transaction_date'];
            $payment_model->description = $data['mpesa_receipt_number'];
            $payment_model->save();

            $appointment = Appointment::where('id', $payment_model->appointment_id)->first();
            $appointment->payment_status = 1;
            $appointment->save();

        }


    }

    public static function formatNumber($data){

        return "254".substr($data, 1);
    }
}
