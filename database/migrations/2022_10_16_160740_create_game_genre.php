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
		Schema::create('game_genre', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('game_id');
			$table->unsignedBiginteger('genre_id');
			$table->timestamps();
			$table->foreign('game_id')->references('id')->on('games');
			$table->foreign('genre_id')->references('id')->on('genres');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('game_genre');
	}
};
