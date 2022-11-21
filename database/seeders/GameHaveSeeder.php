<?php

namespace Database\Seeders;

use App\Models\GameHave;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameHaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GameHave::create([
            'user_id' => 1,
            'game_id' => 1,
        ]);
    
    }
}
