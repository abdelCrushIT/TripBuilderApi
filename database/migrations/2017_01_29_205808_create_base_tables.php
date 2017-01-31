<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('name', 128);
            $table->string('city', 64);
            $table->timestamps();
            $table->unique('code');

        });

        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 10);
            $table->string('airline', 64);
            $table->integer('depart_airport_id')->unsigned();
            $table->integer('dest_airport_id')->unsigned();
            $table->timestamps();
            $table->unique('code');
            $table->foreign('depart_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('dest_airport_id')->references('id')->on('airports')->onDelete('cascade');

        });

        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reservation_code', 10);
            $table->timestamps();
            $table->unique('reservation_code');

        });

        Schema::create('flight_trip',function(Blueprint $table){
            $table->integer('flight_id')->unsigned();
            $table->integer('trip_id')->unsigned();
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aiports');
        Schema::drop('flights');
        Schema::drop('trips');
        Schema::drop('flight_trip');
    }
}
