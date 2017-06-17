<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetributionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retribution', function(Blueprint $table)
        {
            $table->increments('id'); 
            $table->string('code')->nullable();  
            $table->string('decide')->nullable();
            $table->string('reason')->nullable();             
            $table->string('description')->nullable();             
            $table->date('create_date')->nullable();  
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('create_by')->unsigned();
            $table->foreign('create_by')->references('id')->on('users')->onDelete('cascade');
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
