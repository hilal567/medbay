<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Doctor extends Model
{
    use HasFactory,Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'weight',
        'height',
        'location',
        'gender',
        'bloodgroup',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @inheritDoc
     */


    public function appointments(){

        return $this->hasMany('App\Models\Appointment', 'doctor_id');
    }

    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    public function getBloodAttribute(){

        if ($this->bloodgroup == 1){

            return "A";
        }
        if ($this->bloodgroup == 2){

            return "B";
        }
        if ($this->bloodgroup == 3){

            return "O";
        }

        return "AB";


    }

}
