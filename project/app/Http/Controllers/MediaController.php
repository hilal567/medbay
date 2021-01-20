<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    // php artisan storage:link -- run this when dealing with storage

    public static function store ($file, $allowedfileExtension ) {

        $fname = time() . '.' . $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $check=in_array($extension,$allowedfileExtension);
        if($check)
        {
            $filename = $file->storeAS('public/docotor', $fname);

            return $fname;
        }
        else
        {
            return "Failed";
        }
    }

    public function download (){


    }
    //>php artisan storage:link -- run this when dealing with storage

}
