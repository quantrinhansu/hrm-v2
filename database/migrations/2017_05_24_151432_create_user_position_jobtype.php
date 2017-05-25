<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPositionJobtype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_position_jobtype', function(Blueprint $table)
        {
            $table->increments('id');  
            $table->integer('user_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->integer('jobtype_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('position')->onDelete('cascade');
            $table->foreign('jobtype_id')->references('id')->on('job_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
