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
        Schema::create('car_colour', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('colour_id');
            $table->unsignedBigInteger('car_id');

            $table->foreign('colour_id')->references('id')->on('Colours')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('car_id')->references('id')->on('cars')->onUpdate('cascade')->onDelete('restrict');
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
        //
    }
};
