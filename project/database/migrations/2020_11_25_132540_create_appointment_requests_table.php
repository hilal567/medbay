<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('patient_id');
            $table->index('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->string('category')->default('stress');
            $table->string('preferred_time')->default('stress');
            $table->string('Description')->default('stress');
            $table->string('sleep_hours')->default('stress');
            $table->string('urgency')->default('stress');
            $table->string('condition')->default('stress'
            );
            $table->boolean('status')->default(false);
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_requests');
        Schema::table('appointment_requests', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
