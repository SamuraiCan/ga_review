<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DeviceGame;

class DeviceGameSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$now = date('Y-m-d H:i:s');
		DeviceGame::create([
			'device_id' => 1,
			'game_id' => 1,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		DeviceGame::create([
			'device_id' => 2,
			'game_id' => 2,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		DeviceGame::create([
			'device_id' => 2,
			'game_id' => 3,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		DeviceGame::create([
			'device_id' => 3,
			'game_id' => 3,
			'created_at' => $now,
			'updated_at' => $now,
		]);
		DeviceGame::create([
			'device_id' => 4,
			'game_id' => 1,
			'created_at' => $now,
			'updated_at' => $now,
		]);
	}
}
