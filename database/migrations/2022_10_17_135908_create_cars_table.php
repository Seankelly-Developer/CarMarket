<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table){

            $table->id();
            $table->string('image');
            $table->string('Make');
            $table->string('Model');
            $table->string('colour');
            $table->string('Registration');
            $table->double('Asking Price');
            $table->string('Location');
            $table->date('dateOfNCTExpiration');
            $table->date('dateOfTaxExpiration');
            $table->string('Contact Email Address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
