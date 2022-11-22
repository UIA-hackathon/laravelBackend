<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments("tripId");
            $table->unsignedInteger("users_id");
            $table->unsignedInteger("transports_id");
            $table->point("sourceCoordinates");
            $table->point("destinationCoordinates");
            $table->dateTime("departureTime");
            $table->dateTime("arrivalTime");
            $table->integer("timeTaken");
            $table->float("distanceTravelled");
            $table->foreign('users_id')->references('userId')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('transports_id')->references('tranportId')->on('transports')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
