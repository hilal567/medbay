<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->default('0');
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('location')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('certification_url')->nullable();
            $table->string('nationalID')->nullable();
            $table->string('bloodgroup')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
