<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Provider\fr_CH\Payment;
use Faker\Provider\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class appointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('appointments')->insert([
                'patient_id' => $i,
                'doctor_id' => 2,
                'request_id' => $i,
                'diagnosis' => 'Stress',
                'amount' => 1000,
                'appointment_status' => 1,
                'payment_status' => 0,
                'created_at' => '2021-0'.$i.'-26 19:59:52',
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
