<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('bu_name');
            $table->integer('rooms');
            $table->string('bu_price');
            $table->string('bu_place');
            $table->tinyInteger('bu_rent');
            $table->string('bu_square');
            $table->tinyInteger('bu_type');
            $table->string('bu_small_dis');
            $table->string('bu_meta');
            $table->string('bu_longitude');
            $table->string('bu_latitude');
            $table->text('bu_large_dis');
            $table->tinyInteger('bu_status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus');
    }
}
