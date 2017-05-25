<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function(Blueprint $table)
        {
            $table->increments('id'); 
            $table->string('description')->nullable();  
            $table->string('type'); 
            $table->date('from');   
            $table->date('to'); 
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('accepter_id')->unsigned();
            $table->foreign('accepter_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
        //
    }
}
