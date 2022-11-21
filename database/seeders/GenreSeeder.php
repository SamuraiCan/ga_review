<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Genre::create([
			'name' => 'RPG',
		]);

		Genre::create([
			'name' => 'アクション',
		]);

		Genre::create([
			'name' => 'サンドボックス',
		]);
		Genre::create([
			'name' => 'シューティング',
		]);
		Genre::create([
			'name' => 'FPS/TPS',
		]);
		Genre::create([
			'name' => '戦略シュミレーション',
		]);
		Genre::create([
			'name' => 'シュミレーション',
		]);
		Genre::create([
			'name' => 'カードゲーム・テーブルゲーム',
		]);
		Genre::create([
			'name' => '対戦格闘',
		]);
		Genre::create([
			'name' => 'パズル',
		]);
		Genre::create([
			'name' => '恋愛',
		]);
		Genre::create([
			'name' => 'アドベンチャー',
		]);
		Genre::create([
			'name' => '推理・探偵',
		]);
		Genre::create([
			'name' => 'レース',
		]);
		Genre::create([
			'name' => 'スポーツ',
		]);
		Genre::create([
			'name' => '音楽',
		]);
		Genre::create([
			'name' => 'ギャンブル',
		]);
		Genre::create([
			'name' => 'VR・AR',
		]);
		Genre::create([
			'name' => 'その他',
		]);
	}
}
