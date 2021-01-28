<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'appointments';

    public function doctor(){
        return $this->belongsTo('App\Models\Doctor');
    }

    public function getDoctornameAttribute(){

        $doctor = Doctor::where('id', $this->doctor_id)->first();

        if ($doctor){
            $user = User::where('id', $doctor->user_id)->first();
            return $user->name;
        }
        else{
            return "No Doctor";
        }

    }
    public function getPatientnameAttribute(){

        $patient = Patient::where('id', $this->patient_id)->first();

        if ($patient){
            $user = User::where('id', $patient->user_id)->first();
            return $user->name;
        }
        else{
            return "No Patient";
        }

    }
}
