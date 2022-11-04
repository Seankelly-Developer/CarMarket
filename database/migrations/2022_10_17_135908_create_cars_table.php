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
            $table->uuid('uuid')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('image');
            $table->string('Make');
            $table->string('Model');
            $table->string('colour');
            $table->string('Registration');
            $table->double('Asking_Price');
            $table->string('Location');
            $table->string('Description');
            $table->date('dateOfNCTExpiration');
            $table->date('dateOfTaxExpiration');
            $table->string('email');
            
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
