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
		Schema::create('games', function (Blueprint $table) {
			$table->id();
			$table->string('title')->comment('ゲームタイトル');
			$table->text('description')->nullable()->comment('説明');
			$table->date('release_date')->nullable()->comment('リリース日');
			$table->integer('players')->nullable()->comment('プレイ人数');
			$table->string('offical_url')->comment('オフィシャルURL');
			$table->string('agency')->comment('運営');
			$table->boolean('is_new')->comment('新着かどうか');
			$table->boolean('is_attention')->comment('注目かどうか');
			$table->boolean('is_recommend')->comment('オススメかどうか');
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
		Schema::dropIfExists('games');
	}
};
