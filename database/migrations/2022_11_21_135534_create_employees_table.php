<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string("employeeNumber", 30)->primary();
            $table->integer("branchId");
            $table->string("firstName", 30);
            $table->string("lastName", 30);
            $table->string("gender", 10);
            $table->string("email", 70)->unique();
            $table->foreign("branchId")->references('branchId')->on('branches')->onDelete("cascade");
        });
    }

    /**;
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
