<?php

namespace Database\Seeders;

use App\Models\Land;
use Illuminate\Database\Seeder;

class VenaleSeeders extends Seeder
{
    public function run(): void
    {
        Land::create([
            'name' => 'PK5 — zone commerciale',
            'market_value' => 10000,
            'sub_division_id' => 1,
        ]);
        Land::create([
            'name' => 'Berbérati — centre-ville',
            'market_value' => 20000,
            'sub_division_id' => 23,
        ]);
        Land::create([
            'name' => 'Bangassou — marché',
            'market_value' => 40000,
            'sub_division_id' => 8,
        ]);
    }
}
