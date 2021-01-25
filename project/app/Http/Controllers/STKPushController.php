<?php


namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\MpesaSTKPush;
use App\Models\Payment;
use App\Services\Mpesa\PaymentActions;
use App\Services\Mpesa\STKPush;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class STKPushController extends Controller
{
    //

    public function confirm(Request $request)
    {
        $env = config('misc.mpesa.env', 'sandbox');
        $confirmation_key = config("misc.mpesa.stk_push.{$env}.confirmation_key");

        if ($request->confirmation_key == $confirmation_key) {

            $stk_push_confirm = $this->confirmPayment($request);

            if ($stk_push_confirm->failed()) {

                Log::error($stk_push_confirm->getResponse());

            } else {
                $this->result_code = 0;
                $this->result_desc = 'Success';
            }

        } else {

            $this->result_desc = 'STK Push confirmation failed: Confirmation key mismatch';
            Log::error($this->result_desc);

        }

        return response()->json([
            'ResultCode' => $this->result_code,
            'ResultDesc' => $this->result_desc,
        ]);
    }

    public function confirmPayment(Request $request)
    {
        $payload = json_decode($request->getContent());

        if (property_exists($payload, 'Body') && $payload->Body->stkCallback->ResultCode == '0') {

            $merchant_request_id = $payload->Body->stkCallback->MerchantRequestID;
            $checkout_request_id = $payload->Body->stkCallback->CheckoutRequestID;

            $stk_push_model = MpesaSTKPush::where('merchant_request_id', $merchant_request_id)
                ->where('checkout_request_id', $checkout_request_id)->first();


            $data = [
                'result_desc' => $payload->Body->stkCallback->ResultDesc,
                'result_code' => $payload->Body->stkCallback->ResultCode,
                'merchant_request_id' => $merchant_request_id,
                'checkout_request_id' => $checkout_request_id,
                'amount' => $payload->Body->stkCallback->CallbackMetadata->Item[0]->Value,
                'mpesa_receipt_number' => $payload->Body->stkCallback->CallbackMetadata->Item[1]->Value,
                'transaction_date' => $payload->Body->stkCallback->CallbackMetadata->Item[3]->Value,
                'phone_number' => $payload->Body->stkCallback->CallbackMetadata->Item[4]->Value,
            ];

            $this->updatePayment($data);

            if ($stk_push_model) {

                $stk_push_model->fill($data)->save();

            } else {
                MpesaSTKPush::create($data);
            }

        } else {
            $this->failed = true;
        }

        return $this;
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

}
