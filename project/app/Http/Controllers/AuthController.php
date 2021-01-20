<?php

namespace App\Http\Controllers;

use AfricasTalking\SDK\AfricasTalking; //smiles
use App\Models\Appointment;
use App\Models\appointmentRequest;
use App\Models\Doctor;
use App\Models\PhoneVerification;
use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'mobile_number' => $request->mobile_number,
            'user_type' => $request->user_type,

        ]);

        $id = $user->id;
        $user_type = $user->user_type;

        if ($user_type == 0) {
            //create a patient record
            $patient = Patient::create([
                'user_id' => $id,
                'weight' => $request->weight,
                'height' => $request->height,
                'location' => $request->location,
                'gender' => $request->gender,
                'bloodgroup' => $request->bloodgroup,
            ]);


            return response()->json([
                'user' => $user
//                'character' => $patient,
            ]);


        }
        elseif($user_type == 1) {
            //if the user type is 3 then create a doctor record.
            $doctor = Doctor::create([
                'user_id' => $id,
                'weight' => $request->weight,
                'height' => $request->height,
                'location' => $request->location,
                'gender' => $request->gender,
                'bloodgroup' => $request->bloodgroup,
            ]);

            return response()->json([
                'user' => $user,
//                'character' =>$doctor,
            ]);
        }


    }


    public function authenticate(Request $request)
    {
        $password=$request->password;
        $phone=$request->phone_number;
        if (Auth::attempt(['mobile_number' => $phone, 'password' => $password]) )
        {
            $logged_user = User::where('mobile_number', $phone)->first();
            //dd($logged_user->user_type);
             return response()->json([
            'success' => 'true',
            'user_type'=> $logged_user->user_type,
             'user_id'=> $logged_user->id,
            'message' => 'Login sucessfull!',
        ]);
        }
        else
        {
            return response()->json([
                'success' => 'false',
                'message' => 'Login Failed!',
            ]);
        }

    }

    public function login(Request $request)
    {
        $credentials = $request->only(['mobile_number', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json();

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
    protected function respondWithToken($token, $user, $patient)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'status'=>'success',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user'=>$user,
            'Patient'=>$patient
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
        $verification_sms = "<#>Appname:" .$verification_code." :Use this code to complete your registration - " .$appSignature;

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

    public function setPin (Request $request){

        $last_user = User::all()->last();
        $last_user->mobile_number;

        if ( $last_user->mobile_number == $request ->phone_number){

           $last_user ->password =  bcrypt($request->PIN);
           $last_user -> save();
           //dd( bcrypt($request->PIN));
            return response()->json([
                'success' => 'true',
                'message' => 'PIN setup sucessfull!',
            ]);
        }else{

            return response()->json([
                'success' => 'false',
                'message' => 'PIN setup Failed!',
            ]);
        }


    }

    public function insertPrescription (Request $request){


    }
    //appointment Request
    //id
    //doctor id
    //symptoms
    //description
    //time
    //status

    //make an entry in appointment
    //id
    //patient_id
    //doctor_id
    //request_id
    //diagnosis
    //amount == 1000
    //payment_status
    //date

    public function appointmentRequest(Request $request){
        $random_doctor = DB::table('doctors')->inRandomOrder()->first();
        $random_doctor_id = $random_doctor->id;
        $random_doctor_user_id = Doctor::where('id', $random_doctor_id)->pluck('user_id');
        $random_doctor_name = User::whereIn('id', $random_doctor_user_id)->pluck('name');
        //dd($random_doctor_name[0]);
        $doctor_name = $random_doctor_name[0];
        //dd($random_doctor_id);

        $appointment_request = appointmentRequest::create([
            'doctor_id' => $random_doctor_id,
            'patient_id' => $request->patient_id,
            'category' => $request->category,
            'preferred_time' => $request->preferred_time,
            'Description' => $request->Description,
            'sleep_hours' => $request->sleep_hours,
            'urgency' => $request->urgency,
            'condition' => $request->condition,
            'status' => $request->status
        ]);
        return response()->json([
            'success' => 'true',
            'Doctor_name' => $doctor_name,
        ]);

    }

    public function acceptRequest(Request $request) {
       // $doctor_id = $request->doctor_id;
        $appointment_request_id = $request->id;


        $appointment_request = appointmentRequest::where('id',$appointment_request_id)->first();
        $appointment_request->status = 1;
        $appointment_request->save();

        Appointment::create([
            'patient_id' => $appointment_request->patient_id,
            'doctor_id' => $appointment_request->doctor_id,
            'request_id' => $appointment_request->id,
            'diagnosis' => 'This one is dying next week just refund',
        ]);

        return response()->json([
            'success' => 'true',
        ]);
    }

}
