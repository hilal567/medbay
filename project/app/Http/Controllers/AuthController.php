<?php

namespace App\Http\Controllers;

use AfricasTalking\SDK\AfricasTalking; //smiles
use App\Models\PhoneVerification;
use Illuminate\Http\Request;
use  App\Models\User;

class AuthController extends Controller
{
    //method to register patients
    public $loginAfterSignUp = true;

    public function register(Request $request)
    {
        //awesome, we'll just need to delete the entry in Phone verifications then// we can do that here or in the previous method
        // okay
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number'=> $request->mobile_no,
            'password' => bcrypt($request->password),
        ]);



        $token = auth()->login($user);

        return $this->respondWithToken($token,$user);
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token,);
    }
    public function getAuthUser(Request $request)
    {
        return response()->json(auth()->user());
    }
    public function logout()
    {
        auth()->logout();
        return response()->json(['message'=>'Successfully logged out']);
    }
    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user'=>$user
        ]);
    }

    public function sendVerifyText(Request $request){
        //Magic happens here

        //who even says capture? phone number to send to
        $PhoneNumber = $request->phone_number;
        $appSignature = $request->appSignature;

        //check if there was a pre-existing code, if not then create instance of model
        $existing_code = PhoneVerification::where('phone_number', $PhoneNumber)->first();

        if($existing_code){
            $verification_code = $existing_code->code;
        }
        else{
            $verification_code = rand ( 10000 , 99999 ); //5 digits
            PhoneVerification::create([
                'phone_number' => $PhoneNumber,
                'code' => $verification_code
            ]);
        }

        //Now we can send SMSm
        //Remember the hashtag whatever is to allow us to automatically read the text ooh GOT IT, Then the colons are to identify the app where the code is (depending on how you set it)
        $verification_sms = "<#>Appname:".$verification_code.": Use this code to complete your registration - " .$appSignature;

        $phoneNumberToSMS = "+254".substr($PhoneNumber, 1);

        //Africas Talking account details
        $username = "hilal567";
        $apiKey = "2a4503121e96352d79d28e3ebe8f995cec6b3e89238a13fbdf61ed8efb0bed04";


        $AT = new AfricasTalking($username, $apiKey);
        $sms= $AT->sms();

        //sending
        $result = $sms->send([
           'to' => $phoneNumberToSMS,
           'message' => $verification_sms,
//           'from' => 'HilaliApp'  This is only used after you have applied for stuff called alphanumerics which cost tons of money.
        ]);

        return response()->json([
            'success' => 'true',
            'message' => 'Verification SMS Sent. Check your phone',
        ]);
    }

    public function verifyCode(Request $request){
        $last_verification_entry = PhoneVerification::where('phone_number',$request->phone_number)->first();
    //YEay that worked //if you could only see the grin on my face// It' probably the sam as the one on your profile picture //yap :) // thAnk you! I suppose that is it on the backend?
        if($last_verification_entry!=null && $last_verification_entry->code==$request->code){//Found and correct
            return response()->json([
                'success' => 'true',
                'message' => 'Phone Verified!',
            ]);
        }else{
            return response()->json([
                'success' => 'false',
                'message' => 'Phone NOT Verified!',
            ]);
        }
    }

}
