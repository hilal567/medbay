<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointmentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,
        'category',
        'prefered_time',
        'Description',
        'sleep_time',
        'urgency',
        'condition',
        'prefered_doctor'];
}
