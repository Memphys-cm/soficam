<?php

namespace Database\Seeders;

use App\Models\SubDivision;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubDivisionSeeder extends Seeder
{
    /**
     * Sous-préfectures représentatives (chef-lieux et principales entités) — RCA.
     * Les surfaces et mercuriales sont indicatives pour la démo.
     */
    public function run(): void
    {
        SubDivision::flushEventListeners();

        $rows = [
            // Bangui (préfecture 1) — arrondissements
            [1, 'BG01001', 'Bangui 1st', 'Bangui 1er', 1, 180000000, 10000],
            [2, 'BG01002', 'Bangui 2nd', 'Bangui 2e', 1, 180000000, 10000],
            [3, 'BG01003', 'Bangui 3rd', 'Bangui 3e', 1, 180000000, 10000],
            [4, 'BG01004', 'Bangui 4th', 'Bangui 4e', 1, 180000000, 10000],
            [5, 'BG01005', 'Bangui 5th', 'Bangui 5e', 1, 180000000, 10000],
            [6, 'BG01006', 'Bangui 6th', 'Bangui 6e', 1, 180000000, 10000],
            [7, 'BG01007', 'Bangui 7th', 'Bangui 7e', 1, 180000000, 10000],
            // Autres préfectures — chef-lieu ou entité clé
            [8, 'MB02001', 'Bangassou', 'Bangassou', 2, 61150000000, 2000],
            [9, 'BK03001', 'Mobaye', 'Mobaye', 3, 17604000000, 1500],
            [10, 'KE04001', 'Sibut', 'Sibut', 4, 17204000000, 1000],
            [11, 'NM05001', 'Bouar', 'Bouar', 5, 26600000000, 2000],
            [12, 'OH06001', 'Bossangoa', 'Bossangoa', 6, 50250000000, 1000],
            [13, 'SM07001', 'Nola', 'Nola', 7, 19412000000, 800],
            [14, 'LB08001', 'Mbaiki', 'Mbaïki', 8, 19235000000, 2000],
            [15, 'OM09001', 'Boali', 'Boali', 9, 31835000000, 1500],
            [16, 'OP10001', 'Bozoum', 'Bozoum', 10, 32100000000, 1000],
            [17, 'HM11001', 'Obo', 'Obo', 11, 55530000000, 500],
            [18, 'OU12001', 'Bambari', 'Bambari', 12, 49900000000, 1500],
            [19, 'HK13001', 'Bria', 'Bria', 13, 86650000000, 800],
            [20, 'BB14001', 'Ndele', 'Ndélé', 14, 58200000000, 800],
            [21, 'VK15001', 'Birao', 'Birao', 15, 46500000000, 500],
            [22, 'NG16001', 'Kaga-Bandoro', 'Kaga-Bandoro', 16, 19996000000, 1000],
            [23, 'MK17001', 'Berberati', 'Berbérati', 17, 30203000000, 2500],
            [24, 'MM18001', 'Carnot', 'Carnot', 18, 15740000000, 1500],
            [25, 'LP19001', 'Paoua', 'Paoua', 19, 13210000000, 800],
            [26, 'OF20001', 'Batangafo', 'Batangafo', 20, 32530000000, 800],
        ];

        foreach ($rows as $row) {
            SubDivision::create([
                'id' => $row[0],
                'uuid' => Str::uuid(),
                'division_id' => $row[4],
                'code' => $row[1],
                'sub_division_name_en' => $row[2],
                'sub_division_name_fr' => $row[3],
                'total_surface_area' => $row[5],
                'prix_minima_m2' => $row[6],
            ]);
        }
    }
}
