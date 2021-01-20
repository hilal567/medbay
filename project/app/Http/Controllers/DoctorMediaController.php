<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorMediaController extends Controller
{
    public function storePdf(Request $request){

        $doctor = Doctor::where('id', $request->id)->first();

        if($request->hasFile('pdf'))
        {
            $allowedfileExtension=['pdf'];
            $file = $request->file('pdf');

            $fname = MediaController::store($file, $allowedfileExtension);
            if ($fname != "Failed"){

                $doctor->certification_url = $fname;
                $doctor->save();

                return response()->json([
                    'success' => 'true',
                    'message' => $fname,
                ]);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'message' => 'File extension issues or file too large!',
                ]);
            }


        }
        else{
            return response()->json([
                'success' => 'false',
                'message' => 'File does not exist!',
            ]);
        }
    }

    public function storeAvatar(Request $request){

        $doctor = Doctor::where('id', $request->id)->first();

        if($request->hasFile('avatar'))
        {
            $allowedfileExtension=['jpg','jpeg','png'];
            $file = $request->file('avatar');

            $fname = MediaController::store($file, $allowedfileExtension);
            if ($fname != "Failed"){
                $doctor->avatar_url = $fname;
                $doctor->save();

                return response()->json([
                    'success' => 'true',
                    'message' => $fname,
                ]);
            }
            else{
                return response()->json([
                    'success' => 'false',
                    'message' => 'File extension issues or file too large!',
                ]);
            }

        }
        else{
            return response()->json([
                'success' => 'false',
                'message' => 'File does not exist!',
            ]);
        }
    }
}
