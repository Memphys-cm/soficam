<?php

namespace Database\Seeders;

use App\Models\SubDivision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubDivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubDivision::flushEventListeners();

        SubDivision::create([
            'id' => 1,
            'division_id' => 1,
            'code' => '0101001',
            'sub_division_name_en' => 'NGAOUNDAL',
            'sub_division_name_fr' => 'NGAOUNDAL'
        ]);

        SubDivision::create([
            'id' => 2,
            'division_id' => 1,
            'code' => '0101002',
            'sub_division_name_en' => 'TIBATI',
            'sub_division_name_fr' => 'TIBATI'
        ]);
        
        SubDivision::create([
            'id' => 3,
            'division_id' => 2,
            'code' => '0102003',
            'sub_division_name_en' => 'MAYO-BALEO',
            'sub_division_name_fr' => 'MAYO-BALEO'
        ]);
        SubDivision::create([
            'id' => 4,
            'division_id' => 2,
            'code' => '0101004',
            'sub_division_name_en' => 'TIGNERE',
            'sub_division_name_fr' => 'TIGNERE'
        ]);
        SubDivision::create([
            'id' => 5,
            'division_id' => 2,
            'code' => '0101005',
            'sub_division_name_en' => 'GALIM-TIGNERE',
            'sub_division_name_fr' => 'GALIM-TIGNERE'
        ]);
        SubDivision::create([
            'id' => 6,
            'division_id' => 2,
            'code' => '0101006',
            'sub_division_name_en' => 'KONTCHA',
            'sub_division_name_fr' => 'KONTCHA'
        ]);
        SubDivision::create([
            'id' => 7,
            'division_id' => 3,
            'code' => '0101007',
            'sub_division_name_en' => 'BANYO',
            'sub_division_name_fr' => 'BANYO'
        ]);
        SubDivision::create([
            'id' => 8,
            'division_id' => 3,
            'code' => '0101008',
            'sub_division_name_en' => 'BANKIM',
            'sub_division_name_fr' => 'BANKIM'
        ]);
        SubDivision::create([
            'id' => 9,
            'division_id' => 3,
            'code' => '0101009',
            'sub_division_name_en' => 'MAYO-DARLE',
            'sub_division_name_fr' => 'MAYO-DARLE'
        ]);
        SubDivision::create([
            'id' => 10,
            'division_id' => 4,
            'code' => '0101010',
            'sub_division_name_en' => 'MEIGANGA',
            'sub_division_name_fr' => 'MEIGANGA'
        ]);
        SubDivision::create([
            'id' => 11,
            'division_id' => 4,
            'code' => '0101011',
            'sub_division_name_en' => 'DJOHONG',
            'sub_division_name_fr' => 'DJOHONG'
        ]);
        SubDivision::create([
            'id' => 12,
            'division_id' => 4,
            'code' => '0101012',
            'sub_division_name_en' => 'DIR',
            'sub_division_name_fr' => 'DIR'
        ]);
        SubDivision::create([
            'id' => 13,
            'division_id' => 4,
            'code' => '0101013',
            'sub_division_name_en' => 'NGAOUI',
            'sub_division_name_fr' => 'NGAOUI'
        ]);
        SubDivision::create([
            'id' => 14,
            'division_id' => 5,
            'code' => '0101014',
            'sub_division_name_en' => 'NGAOUNDERE 1er',
            'sub_division_name_fr' => 'NGAOUNDERE 1er'
        ]);
        SubDivision::create([
            'id' => 15,
            'division_id' => 5,
            'code' => '0101015',
            'sub_division_name_en' => 'NGAOUNDERE 2er',
            'sub_division_name_fr' => 'NGAOUNDERE 2er'
        ]);
        SubDivision::create([
            'id' => 16,
            'division_id' => 5,
            'code' => '0101016',
            'sub_division_name_en' => 'NGAOUNDERE 3er',
            'sub_division_name_fr' => 'NGAOUNDERE 3er'
        ]);
        SubDivision::create([
            'id' => 17,
            'division_id' => 5,
            'code' => '0101017',
            'sub_division_name_en' => 'BELEL',
            'sub_division_name_fr' => 'BELEL'
        ]);
        SubDivision::create([
            'id' => 18,
            'division_id' => 5,
            'code' => '0101018',
            'sub_division_name_en' => 'MBE',
            'sub_division_name_fr' => 'MBE'
        ]);
        SubDivision::create([
            'id' => 19,
            'division_id' => 5,
            'code' => '0101019',
            'sub_division_name_en' => 'NGANHA',
            'sub_division_name_fr' => 'NGANHA'
        ]);
        SubDivision::create([
            'id' => 20,
            'division_id' => 5,
            'code' => '0101020',
            'sub_division_name_en' => 'NYAMBAKA',
            'sub_division_name_fr' => 'NYAMBAKA'
        ]);
        SubDivision::create([
            'id' => 21,
            'division_id' => 5,
            'code' => '0101021',
            'sub_division_name_en' => 'MARTAP',
            'sub_division_name_fr' => 'MARTAP'
        ]);

    }
}
