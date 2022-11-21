<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		Review::create([
			'game_id' => 1,
			'user_id' => 1,
			'review' => 'とても面白い！やり込みたいゲーム',
			'score' => 3,
			'graphic' => 1,
			'volume' => 1,
			'sound' => 10,
			'story' => 7,
			'comfort' => 3,
			'playtime' => 1,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		Review::create([
			'game_id' => 2,
			'user_id' => 2,
			'review' => '映像が綺麗。見ているだけでも楽しい',
			'score' => 5,
			'graphic' => 2,
			'volume' => 1,
			'sound' => 5,
			'story' => 4,
			'comfort' => 1,
			'playtime' => 2,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		Review::create([
			'game_id' => 3,
			'user_id' => 1,
			'review' => 'みんなで盛り上がれる内容。続編があればもっとやりたい。ß',
			'score' => 8,
			'graphic' => 2,
			'volume' => 1,
			'sound' => 7,
			'story' => 6,
			'comfort' => 10,
			'playtime' => 3,
			'created_at' => $now,
			'updated_at' => $now,
		]);
	}
}
