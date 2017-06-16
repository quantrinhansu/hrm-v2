<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title')->nullable();  
            //$table->string('description')->nullable();  
            $table->text('content')->nullable();  
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
