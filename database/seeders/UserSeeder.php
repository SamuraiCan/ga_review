<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => '石原さとみ',
            'name_kana' => 'イシハラサトミ',
            'email' => 'ishihara@mail.com',
            'password' => bcrypt('00000000'),
            'birth_date' => '1990-10-12',
            'nickname' => 'サトミン',
            'current_team_id' => 1,
            'profile_photo_path' => '',
            'role' => 100,
        ]);

        User::create([
            'name' => '佐藤トモコ',
            'name_kana' => 'サトウトモコ',
            'email' => 'tomoko@mail.com',
            'password' => bcrypt('11111111'),
            'birth_date' => '1980-01-01',
            'nickname' => 'chibi',
            'current_team_id' => 1,
            'profile_photo_path' => '',
            'role' => 1,
        ]);

    }
}