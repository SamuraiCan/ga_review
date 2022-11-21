<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GameGenre;

class GameGenreSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		GameGenre::create([
			'game_id' => 1,
			'genre_id' => 1,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		GameGenre::create([
			'game_id' => 2,
			'genre_id' => 2,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		GameGenre::create([
			'game_id' => 3,
			'genre_id' => 3,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		GameGenre::create([
			'game_id' => 2,
			'genre_id' => 1,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		GameGenre::create([
			'game_id' => 3,
			'genre_id' => 1,
			'created_at' => $now,
			'updated_at' => $now,
		]);
	}
}
