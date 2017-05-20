<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('role')->default('1'); 
            $table->string('active')->default('1');   
            $table->boolean('gender')->default('1');   
            $table->string('avatar')->default('/images/user_default.png');  
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('education')->nullable();
            $table->string('skill')->nullable();
            $table->string('work_history')->nullable();          
            $table->string('permanent_address')->nullable();
            $table->string('present_address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('bank_account_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->boolean('maritial_status')->nullable();
            $table->string('job_position')->nullable();
            $table->string('noted')->nullable();
            $table->date('leave_per_month')->nullable(); 
            $table->date('leave_per_year')->nullable(); 

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
