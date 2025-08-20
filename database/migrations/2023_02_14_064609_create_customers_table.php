<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('street');
            $table->string('houseNo');
            $table->string('zipcode');
            $table->string('city');
            $table->string('dob');
            $table->string('telephone');
            $table->string('insuranceNumber')->unique();
            $table->string('insuranceName');
            $table->string('healthInsuranceNo')->unique();
            $table->enum('status', ['0', '1'])->default('0');
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
        Schema::dropIfExists('customers');
    }
}
