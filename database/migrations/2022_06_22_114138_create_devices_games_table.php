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
        Schema::create('devices_games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('device_id');
            $table->unsignedBigInteger('game_id');
            $table->timestamps();
            $table->foreign('device_id')->references('id')->on('devices');
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices_games');
    }
};
