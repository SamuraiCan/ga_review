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
        Schema::create('device_review', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('device_id');
            $table->unsignedBigInteger('review_id');
            $table->timestamps();
            $table->foreign('device_id')->references('id')->on('devices');
            $table->foreign('review_id')->references('id')->on('reviews');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_review');
    }
};
