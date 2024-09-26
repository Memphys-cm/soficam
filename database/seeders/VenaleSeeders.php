<?php

namespace Database\Seeders;

use App\Models\Land;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VenaleSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Land::create([
            'name' => 'Carrefour Andon',
            'market_value' => 10000,
            'sub_division_id'=>59
        ]);
        Land::create([
            'name' => 'Ngombe III',
            'market_value' => 20000,
            'sub_division_id'=>202
        ]);
        Land::create([
            'name' => 'Molyko Stadium',
            'market_value' => 40000,
            'sub_division_id'=>202
        ]);
    }
}
