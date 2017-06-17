<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimekeepingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timekeeping', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->text('user_ids')->nullable(); 
            $table->text('date')->nullable();
            $table->text('date_work')->nullable();
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
        Schema::drop('timekeeping');
    }
}
