<?php

namespace Database\Seeders;

use App\Models\GameLike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameLike::create([
            'user_id' => 1,
            'game_id' => 1,
        ]);
    
    }
}