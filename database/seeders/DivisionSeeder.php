<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::flushEventListeners();

        Division::create([
            'id' => 1,
            'region_id' => 1,
            'code' => '0101',
            'division_name_en' => 'DJEREM',
            'division_name_fr' => 'DJEREM'
        ]);

        Division::create([
            'id' => 2,
            'region_id' => 1,
            'code' => '0102',
            'division_name_en' => 'FARO AND DEO',
            'division_name_fr' => 'FARO ET DEO'
        ]);

        Division::create([
            'id' => 3,
            'region_id' => 1,
            'code' => '0103',
            'division_name_en' => 'MAYO BANYO',
            'division_name_fr' => 'MAYO BANYO'
        ]);

        Division::create([
            'id' => 4,
            'region_id' => 1,
            'code' => '0104',
            'division_name_en' => 'MBERE',
            'division_name_fr' => 'MBERE'
        ]);

        Division::create([
            'id' => 5,
            'region_id' => 1,
            'code' => '0105',
            'division_name_en' => 'VINA',
            'division_name_fr' => 'VINA'
        ]);

        Division::create([
            'id' => 6,
            'region_id' => 2,
            'code' => 'CE06',
            'division_name_en' => 'HAUTE-SANAGA',
            'division_name_fr' => 'HAUTE-SANAGA'
        ]);

        Division::create([
            'id' => 7,
            'region_id' => 2,
            'code' => 'CE07',
            'division_name_en' => 'LEKIE',
            'division_name_fr' => 'LEKIE'
        ]);

        Division::create([
            'id' => 8,
            'region_id' => 2,
            'code' => 'CE08',
            'division_name_en' => 'MBAM AND INOUBOU',
            'division_name_fr' => 'MBAM ET INOUBOU'
        ]);

        Division::create([
            'id' => 9,
            'region_id' => 2,
            'code' => 'CE09',
            'division_name_en' => 'MBAM AND KIM',
            'division_name_fr' => 'MBAM ET KIM'
        ]);

        Division::create([
            'id' => 10,
            'region_id' => 2,
            'code' => 'CE10',
            'division_name_en' => 'MEFOU AND AFAMBA',
            'division_name_fr' => 'MEFOU ET AFAMBA'
        ]);

        Division::create([
            'id' => 11,
            'region_id' => 2,
            'code' => 'CE11',
            'division_name_en' => 'MEFOU AND AKONO',
            'division_name_fr' => 'MEFOU ET AKONO'
        ]);

        Division::create([
            'id' => 12,
            'region_id' => 2,
            'code' => 'CE12',
            'division_name_en' => 'MFOUNDI',
            'division_name_fr' => 'MFOUNDI'
        ]);

        Division::create([
            'id' => 13,
            'region_id' => 2,
            'code' => 'CE13',
            'division_name_en' => 'NYONG AND KELLE',
            'division_name_fr' => 'NYONG ET KELLE'
        ]);

        Division::create([
            'id' => 14,
            'region_id' => 2,
            'code' => 'CE14',
            'division_name_en' => 'NYONG ADN MFOUMOU',
            'division_name_fr' => 'NYONG ET MFOUMOU'
        ]);

        Division::create([
            'id' => 15,
            'region_id' => 2,
            'code' => 'CE15',
            'division_name_en' => 'NYONG AND SO\'O',
            'division_name_fr' => 'NYONG ET SO\'O'
        ]);

        Division::create([
            'id' => 16,
            'region_id' => 3,
            'code' => 'ES16',
            'division_name_en' => 'BOUMBA AND NGOKO',
            'division_name_fr' => 'BOUMBA ET NGOKO'
        ]);

        Division::create([
            'id' => 17,
            'region_id' => 3,
            'code' => 'ES17',
            'division_name_en' => 'HAUT AND NYONG',
            'division_name_fr' => 'HAUT ET NYONG'
        ]);

        Division::create([
            'id' => 18,
            'region_id' => 3,
            'code' => 'ES18',
            'division_name_en' => 'KADEY',
            'division_name_fr' => 'KADEY'
        ]);

        Division::create([
            'id' => 19,
            'region_id' => 3,
            'code' => 'ES19',
            'division_name_en' => 'LOM AND DJEREM',
            'division_name_fr' => 'LOM ET DJEREM'
        ]);

        Division::create([
            'id' => 20,
            'region_id' => 4,
            'code' => 'EN20',
            'division_name_en' => 'DIAMARE',
            'division_name_fr' => 'DIAMARE'
        ]);

        Division::create([
            'id' => 21,
            'region_id' => 4,
            'code' => 'EN21',
            'division_name_en' => 'LOGONE AND CHARI',
            'division_name_fr' => 'LOGONE ET CHARI'
        ]);

        Division::create([
            'id' => 22,
            'region_id' => 4,
            'code' => 'EN22',
            'division_name_en' => 'MAYO DANAY',
            'division_name_fr' => 'MAYO DANAY'
        ]);

        Division::create([
            'id' => 23,
            'region_id' => 4,
            'code' => 'EN23',
            'division_name_en' => 'MAYO KANI',
            'division_name_fr' => 'MAYO KANI'
        ]);

        Division::create([
            'id' => 24,
            'region_id' => 4,
            'code' => 'EN24',
            'division_name_en' => 'MAYO SAVA',
            'division_name_fr' => 'MAYO SAVA'
        ]);

        Division::create([
            'id' => 25,
            'region_id' => 4,
            'code' => 'EN25',
            'division_name_en' => 'MAYO TSANAGA',
            'division_name_fr' => 'MAYO TSANAGA'
        ]);

        Division::create([
            'id' => 26,
            'region_id' => 5,
            'code' => 'LT26',
            'division_name_en' => 'MOUNGO',
            'division_name_fr' => 'MOUNGO'
        ]);

        Division::create([
            'id' => 27,
            'region_id' => 5,
            'code' => 'LT27',
            'division_name_en' => 'NKAM',
            'division_name_fr' => 'NKAM'
        ]);

        Division::create([
            'id' => 28,
            'region_id' => 5,
            'code' => 'LT28',
            'division_name_en' => 'SANAGA MARITIME',
            'division_name_fr' => 'SANAGA MARITIME'
        ]);

        Division::create([
            'id' => 29,
            'region_id' => 5,
            'code' => 'LT29',
            'division_name_en' => 'WOURI',
            'division_name_fr' => 'WOURI'
        ]);

        Division::create([
            'id' => 30,
            'region_id' => 6,
            'code' => 'ND30',
            'division_name_en' => 'BENOUE',
            'division_name_fr' => 'BENOUE'
        ]);

        Division::create([
            'id' => 31,
            'region_id' => 6,
            'code' => 'ND31',
            'division_name_en' => 'FARO',
            'division_name_fr' => 'FARO'
        ]);

        Division::create([
            'id' => 32,
            'region_id' => 6,
            'code' => 'ND32',
            'division_name_en' => 'MAYO LOUTI',
            'division_name_fr' => 'MAYO LOUTI'
        ]);

        Division::create([
            'id' => 33,
            'region_id' => 6,
            'code' => 'ND33',
            'division_name_en' => 'MAYO REY',
            'division_name_fr' => 'MAYO REY'
        ]);

        Division::create([
            'id' => 34,
            'region_id' => 7,
            'code' => 'NO34',
            'division_name_en' => 'BUI',
            'division_name_fr' => 'BUI'
        ]);

        Division::create([
            'id' => 35,
            'region_id' => 7,
            'code' => 'NO35',
            'division_name_en' => 'BOYO',
            'division_name_fr' => 'BOYO'
        ]);

        Division::create([
            'id' => 36,
            'region_id' => 7,
            'code' => 'NO36',
            'division_name_en' => 'DONGA-MANTUNG',
            'division_name_fr' => 'DONGA-MANTUNG'
        ]);

        Division::create([
            'id' => 37,
            'region_id' => 7,
            'code' => 'NO37',
            'division_name_en' => 'MENCHUM',
            'division_name_fr' => 'MENCHUM'
        ]);

        Division::create([
            'id' => 38,
            'region_id' => 7,
            'code' => 'NO38',
            'division_name_en' => 'MEZAM',
            'division_name_fr' => 'MEZAM'
        ]);

        Division::create([
            'id' => 39,
            'region_id' => 7,
            'code' => 'NO39',
            'division_name_en' => 'MOMO',
            'division_name_fr' => 'MOMO'
        ]);

        Division::create([
            'id' => 40,
            'region_id' => 7,
            'code' => 'NO40',
            'division_name_en' => 'NGO-KENTUNJIA',
            'division_name_fr' => 'NGO-KENTUNJIA'
        ]);

        Division::create([
            'id' => 41,
            'region_id' => 8,
            'code' => 'OU41',
            'division_name_en' => 'BAMBOUTOS',
            'division_name_fr' => 'BAMBOUTOS'
        ]);

        Division::create([
            'id' => 42,
            'region_id' => 8,
            'code' => 'NA',
            'division_name_en' => 'HAUT NKAM',
            'division_name_fr' => 'HAUT NKAM'
        ]);

        Division::create([
            'id' => 43,
            'region_id' => 8,
            'code' => 'NA',
            'division_name_en' => 'HAUTS PLATEAUX',
            'division_name_fr' => 'HAUTS PLATEAUX'
        ]);

        Division::create([
            'id' => 44,
            'region_id' => 8,
            'code' => 'NA',
            'division_name_en' => 'KOUNG KHI',
            'division_name_fr' => 'KOUNG KHI'
        ]);

        Division::create([
            'id' => 45,
            'region_id' => 8,
            'code' => 'NA',
            'division_name_en' => 'MENOUA',
            'division_name_fr' => 'MENOUA'
        ]);

        Division::create([
            'id' => 46,
            'region_id' => 8,
            'code' => 'NA',
            'division_name_en' => 'MIFI',
            'division_name_fr' => 'MIFI'
        ]);

        Division::create([
            'id' => 47,
            'region_id' => 8,
            'code' => 'NA',
            'division_name_en' => 'NDE',
            'division_name_fr' => 'NDE'
        ]);

        Division::create([
            'id' => 48,
            'region_id' => 8,
            'code' => 'NA',
            'division_name_en' => 'NOUN',
            'division_name_fr' => 'NOUN'
        ]);

        Division::create([
            'id' => 49,
            'region_id' => 9,
            'code' => 'SU42',
            'division_name_en' => 'DJA AND LOBO',
            'division_name_fr' => 'DJA ET LOBO'
        ]);

        Division::create([
            'id' => 50,
            'region_id' => 9,
            'code' => 'NA',
            'division_name_en' => 'VALLEE DU NTEM',
            'division_name_fr' => 'VALLEE DU NTEM'
        ]);

        Division::create([
            'id' => 51,
            'region_id' => 9,
            'code' => 'NA',
            'division_name_en' => 'MVILA',
            'division_name_fr' => 'MVILA'
        ]);

        Division::create([
            'id' => 52,
            'region_id' => 9,
            'code' => 'NA',
            'division_name_en' => 'OCEAN',
            'division_name_fr' => 'OCEAN'
        ]);

        Division::create([
            'id' => 53,
            'region_id' => 10,
            'code' => 'SO43900',
            'division_name_en' => 'FAKO',
            'division_name_fr' => 'FAKO'
        ]);

        Division::create([
            'id' => 54,
            'region_id' => 10,
            'code' => 'NA',
            'division_name_en' => 'KUPE MANENGUBA',
            'division_name_fr' => 'KUPE MANENGUBA'
        ]);

        Division::create([
            'id' => 55,
            'region_id' => 10,
            'code' => 'NA',
            'division_name_en' => 'LEBIALEM',
            'division_name_fr' => 'LEBIALEM'
        ]);

        Division::create([
            'id' => 56,
            'region_id' => 10,
            'code' => 'NA',
            'division_name_en' => 'MANYU',
            'division_name_fr' => 'MANYU'
        ]);

        Division::create([
            'id' => 57,
            'region_id' => 10,
            'code' => 'NA',
            'division_name_en' => 'MEME',
            'division_name_fr' => 'MEME'
        ]);
        Division::create([
            'id' => 58,
            'region_id' => 10,
            'code' => 'NA',
            'division_name_en' => 'NDIAN',
            'division_name_fr' => 'NDIAN'
        ]);
    }
}
