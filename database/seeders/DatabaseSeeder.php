<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call(UserSeeder::class);
		$this->call(GenreSeeder::class);
		$this->call(GameSeeder::class);
		$this->call(DeviceSeeder::class);
		$this->call(MypageSeeder::class);
		$this->call(ReviewSeeder::class);
		$this->call(GameGenreSeeder::class);
		$this->call(DeviceGameSeeder::class);
		$this->call(GenreMypageSeeder::class);
		$this->call(ReviewLikeSeeder::class);
		$this->call(GameHaveSeeder::class);
		$this->call(GameLikeSeeder::class);
		$this->call(ReviewShareSeeder::class);
		$this->call(ImageSeeder::class);
	}
}
