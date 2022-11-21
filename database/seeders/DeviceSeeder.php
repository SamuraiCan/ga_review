<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Device;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Device::create([
            'name' => 'Nintendo 3DS',
        ]);

        Device::create([
            'name' => 'PlayStation Vita',
        ]);

        Device::create([
            'name' => 'Nintendo Switch Lite',
        ]);

        Device::create([
            'name' => 'Nintendo Switch',
        ]);

        Device::create([
            'name' => 'PlayStation 4',
        ]);

        Device::create([
            'name' => 'PlayStation 5',
        ]);

        Device::create([
            'name' => 'Xbox one',
        ]);

        Device::create([
            'name' => 'Xbox Series X',
        ]);

        Device::create([
            'name' => 'PC',
        ]);

        Device::create([
            'name' => 'PSVR',
        ]);

        Device::create([
            'name' => 'Meta Quest',
        ]);

    }
}
