<?php

namespace Database\Seeders;

use App\Models\ReviewLike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReviewLike::create([
            'review_id' => 1,
            'user_id' => 1,
    ]);
    
}
}