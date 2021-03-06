<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class appointmentRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

/*    protected $fillable = [
        'name' ,
        'category',
        'prefered_time',
        'Description',
        'sleep_time',
        'urgency',
        'condition',
        'prefered_doctor'];*/
protected $guarded = [];

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

}
