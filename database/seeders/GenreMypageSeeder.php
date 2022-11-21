<?php

namespace Database\Seeders;

use App\Models\GenreMypage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreMypageSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');

		GenreMypage::create([
			'mypage_id' => 1,
			'genre_id' => 1,
			'created_at' => $now,
			'updated_at' => $now,
		]);

		GenreMypage::create([
			'mypage_id' => 2,
			'genre_id' => 1,
			'created_at' => $now,
			'updated_at' => $now,
		]);

		GenreMypage::create([
			'mypage_id' => 2,
			'genre_id' => 2,
			'created_at' => $now,
			'updated_at' => $now,
		]);

		GenreMypage::create([
			'mypage_id' => 2,
			'genre_id' => 3,
			'created_at' => $now,
			'updated_at' => $now,
		]);
	}
}
