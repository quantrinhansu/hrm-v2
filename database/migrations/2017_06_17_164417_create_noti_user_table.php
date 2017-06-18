<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotiUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noti_user', function(Blueprint $table)
        {
            $table->increments('id');             
            $table->integer('user_id')->unsigned();
            $table->integer('noti_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('noti_id')->references('id')->on('noti')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('isRead')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('noti_user');
    }
}
