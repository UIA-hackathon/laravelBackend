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
            $table->integer("tripId")->autoIncrement()->primary();
            $table->integer("user");
            $table->integer("transport");
            $table->point("sourceCoordinates");
            $table->point("destinationCoordinates");
            $table->dateTime("departureTime");
            $table->dateTime("arrivalTime");
            $table->integer("timeTaken");
            $table->float("distanceTravelled");
            $table->foreign('user')->references('userId')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('transport')->references('transportId')->on('transports')->onDelete('cascade')->onUpdate('cascade');
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
