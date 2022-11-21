<?php

namespace Database\Seeders;

use App\Models\ReviewShare;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReviewShare::create([
            'review_id' => 1,
            'user_id' => 1,
        ]);
    }
}