<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract', function(Blueprint $table)
        {
            $table->increments('id');  
            $table->integer('create_by')->unsigned();
            $table->foreign('create_by')->references('id')->on('users')->onDelete('cascade');
            $table->integer('employee')->unsigned();
            $table->foreign('employee')->references('id')->on('users')->onDelete('cascade');
            $table->string('code')->nullable();  
            $table->string('name')->nullable();  
            $table->string('type')->nullable();  
            $table->text('work_description')->nullable();  
            $table->date('from')->nullable();  
            $table->date('to')->nullable();  
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
