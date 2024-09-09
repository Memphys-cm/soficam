<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use DB;

class ConservationSeeder extends Seeder
{
    public function run()
    {
        $conservations = [
            // Lekie
            ['code' => 'LEK01', 'division_id' => 7, 'conservation_name_en' => 'Obala', 'conservation_name_fr' => 'Obala'],
            ['code' => 'LEK02', 'division_id' => 7, 'conservation_name_en' => 'Ekie', 'conservation_name_fr' => 'Ekie'],

            // Mfoundi
            ['code' => 'MFO01', 'division_id' => 12, 'conservation_name_en' => 'Mfoundi A', 'conservation_name_fr' => 'Mfoundi A'],
            ['code' => 'MFO02', 'division_id' => 12, 'conservation_name_en' => 'Mfoundi B', 'conservation_name_fr' => 'Mfoundi B'],
            ['code' => 'MFO03', 'division_id' => 12, 'conservation_name_en' => 'Mfoundi C', 'conservation_name_fr' => 'Mfoundi C'],

            // Wouri
            ['code' => 'WOU01', 'division_id' => 29, 'conservation_name_en' => 'Wouri A', 'conservation_name_fr' => 'Wouri A'],
            ['code' => 'WOU02', 'division_id' => 29, 'conservation_name_en' => 'Wouri B', 'conservation_name_fr' => 'Wouri B'],
            ['code' => 'WOU03', 'division_id' => 29, 'conservation_name_en' => 'Wouri C', 'conservation_name_fr' => 'Wouri C'],

            // Les autres divisions
            ['code' => 'DIV01', 'division_id' => 1, 'conservation_name_en' => 'Djerem', 'conservation_name_fr' => 'Djerem'],
            ['code' => 'DIV02', 'division_id' => 2, 'conservation_name_en' => 'Faro and Deo', 'conservation_name_fr' => 'Faro et Deo'],
            ['code' => 'DIV03', 'division_id' => 3, 'conservation_name_en' => 'Mayo Banyo', 'conservation_name_fr' => 'Mayo Banyo'],
            ['code' => 'DIV04', 'division_id' => 4, 'conservation_name_en' => 'Mbere', 'conservation_name_fr' => 'Mbere'],
            ['code' => 'DIV05', 'division_id' => 5, 'conservation_name_en' => 'Vina', 'conservation_name_fr' => 'Vina'],
            ['code' => 'DIV06', 'division_id' => 6, 'conservation_name_en' => 'Haute-Sanaga', 'conservation_name_fr' => 'Haute-Sanaga'],
            ['code' => 'DIV08', 'division_id' => 8, 'conservation_name_en' => 'Mbam and Inoubou', 'conservation_name_fr' => 'Mbam et Inoubou'],
            ['code' => 'DIV09', 'division_id' => 9, 'conservation_name_en' => 'Mbam and Kim', 'conservation_name_fr' => 'Mbam et Kim'],
            ['code' => 'DIV10', 'division_id' => 10, 'conservation_name_en' => 'Mefou and Afamba', 'conservation_name_fr' => 'Mefou et Afamba'],
            ['code' => 'DIV11', 'division_id' => 11, 'conservation_name_en' => 'Mefou and Akono', 'conservation_name_fr' => 'Mefou et Akono'],
            ['code' => 'DIV13', 'division_id' => 13, 'conservation_name_en' => 'Nyong and Kelle', 'conservation_name_fr' => 'Nyong et Kelle'],
            ['code' => 'DIV14', 'division_id' => 14, 'conservation_name_en' => 'Nyong and Mfoumou', 'conservation_name_fr' => 'Nyong et Mfoumou'],
            ['code' => 'DIV15', 'division_id' => 15, 'conservation_name_en' => 'Nyong and So\'o', 'conservation_name_fr' => 'Nyong et So\'o'],
            ['code' => 'DIV16', 'division_id' => 16, 'conservation_name_en' => 'Boumba and Ngoko', 'conservation_name_fr' => 'Boumba et Ngoko'],
            ['code' => 'DIV17', 'division_id' => 17, 'conservation_name_en' => 'Haut and Nyong', 'conservation_name_fr' => 'Haut et Nyong'],
            ['code' => 'DIV18', 'division_id' => 18, 'conservation_name_en' => 'Kadey', 'conservation_name_fr' => 'Kadey'],
            ['code' => 'DIV19', 'division_id' => 19, 'conservation_name_en' => 'Lom and Djerem', 'conservation_name_fr' => 'Lom et Djerem'],
            ['code' => 'DIV20', 'division_id' => 20, 'conservation_name_en' => 'Diamare', 'conservation_name_fr' => 'Diamare'],
            ['code' => 'DIV21', 'division_id' => 21, 'conservation_name_en' => 'Logone and Chari', 'conservation_name_fr' => 'Logone et Chari'],
            ['code' => 'DIV22', 'division_id' => 22, 'conservation_name_en' => 'Mayo Danay', 'conservation_name_fr' => 'Mayo Danay'],
            ['code' => 'DIV23', 'division_id' => 23, 'conservation_name_en' => 'Mayo Kani', 'conservation_name_fr' => 'Mayo Kani'],
            ['code' => 'DIV24', 'division_id' => 24, 'conservation_name_en' => 'Mayo Sava', 'conservation_name_fr' => 'Mayo Sava'],
            ['code' => 'DIV25', 'division_id' => 25, 'conservation_name_en' => 'Mayo Tsanaga', 'conservation_name_fr' => 'Mayo Tsanaga'],
            ['code' => 'DIV26', 'division_id' => 26, 'conservation_name_en' => 'Moungo', 'conservation_name_fr' => 'Moungo'],
            ['code' => 'DIV27', 'division_id' => 27, 'conservation_name_en' => 'Nkam', 'conservation_name_fr' => 'Nkam'],
            ['code' => 'DIV28', 'division_id' => 28, 'conservation_name_en' => 'Sanaga Maritime', 'conservation_name_fr' => 'Sanaga Maritime'],
            ['code' => 'DIV30', 'division_id' => 30, 'conservation_name_en' => 'Benoue', 'conservation_name_fr' => 'Benoue'],
            ['code' => 'DIV31', 'division_id' => 31, 'conservation_name_en' => 'Faro', 'conservation_name_fr' => 'Faro'],
        ];

        foreach ($conservations as $conservation) {
            DB::table('conservations')->insert([
                'uuid' => Str::uuid(),
                'code' => $conservation['code'],
                'division_id' => $conservation['division_id'],
                'conservation_name_en' => $conservation['conservation_name_en'],
                'conservation_name_fr' => $conservation['conservation_name_fr'],
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
