<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users_department', function(Blueprint $table)
        {
            $table->increments('id');  
            $table->integer('user_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('manager')->nullable();  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
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
