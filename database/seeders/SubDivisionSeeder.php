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
            'sub_division_name_fr' => 'NGAOUNDAL',
            'total_surface_area' => 4500000000
        ]);

        SubDivision::create([
            'id' => 2,
            'division_id' => 1,
            'code' => '0101002',
            'sub_division_name_en' => 'TIBATI',
            'sub_division_name_fr' => 'TIBATI',
            'total_surface_area' => 8000000000
        ]);

        SubDivision::create([
            'id' => 3,
            'division_id' => 2,
            'code' => '0102003',
            'sub_division_name_en' => 'MAYO-BALEO',
            'sub_division_name_fr' => 'MAYO-BALEO',
            'total_surface_area' => 3000000000
        ]);
        SubDivision::create([
            'id' => 4,
            'division_id' => 2,
            'code' => '0101004',
            'sub_division_name_en' => 'TIGNERE',
            'sub_division_name_fr' => 'TIGNERE',
            'total_surface_area' => 5000000000
        ]);
        SubDivision::create([
            'id' => 5,
            'division_id' => 2,
            'code' => '0101005',
            'sub_division_name_en' => 'GALIM-TIGNERE',
            'sub_division_name_fr' => 'GALIM-TIGNERE',
            'total_surface_area' => 3500000000
        ]);
        SubDivision::create([
            'id' => 6,
            'division_id' => 2,
            'code' => '0101006',
            'sub_division_name_en' => 'KONTCHA',
            'sub_division_name_fr' => 'KONTCHA',
            'total_surface_area' => 8000000000
        ]);
        SubDivision::create([
            'id' => 7,
            'division_id' => 3,
            'code' => '0101007',
            'sub_division_name_en' => 'BANYO',
            'sub_division_name_fr' => 'BANYO',
            'total_surface_area' => 4380000000
        ]);
        SubDivision::create([
            'id' => 8,
            'division_id' => 3,
            'code' => '0101008',
            'sub_division_name_en' => 'BANKIM',
            'sub_division_name_fr' => 'BANKIM',
            'total_surface_area' => 2700000000
        ]);
        SubDivision::create([
            'id' => 9,
            'division_id' => 3,
            'code' => '0101009',
            'sub_division_name_en' => 'MAYO-DARLE',
            'sub_division_name_fr' => 'MAYO-DARLE',
            'total_surface_area' => 1920000000
        ]);
        SubDivision::create([
            'id' => 10,
            'division_id' => 4,
            'code' => '0101010',
            'sub_division_name_en' => 'MEIGANGA',
            'sub_division_name_fr' => 'MEIGANGA',
            'total_surface_area' => 7000000000
        ]);
        SubDivision::create([
            'id' => 11,
            'division_id' => 4,
            'code' => '0101011',
            'sub_division_name_en' => 'DJOHONG',
            'sub_division_name_fr' => 'DJOHONG',
            'total_surface_area' => 2653000000
        ]);
        SubDivision::create([
            'id' => 12,
            'division_id' => 4,
            'code' => '0101012',
            'sub_division_name_en' => 'DIR',
            'sub_division_name_fr' => 'DIR',
            'total_surface_area' => 3670000000
        ]);
        SubDivision::create([
            'id' => 13,
            'division_id' => 4,
            'code' => '0101013',
            'sub_division_name_en' => 'NGAOUI',
            'sub_division_name_fr' => 'NGAOUI',
            'total_surface_area' => 2307000000
        ]);
        SubDivision::create([
            'id' => 14,
            'division_id' => 5,
            'code' => '0101014',
            'sub_division_name_en' => 'NGAOUNDERE 1er',
            'sub_division_name_fr' => 'NGAOUNDERE 1er',
            'total_surface_area' => 1270000000
        ]);
        SubDivision::create([
            'id' => 15,
            'division_id' => 5,
            'code' => '0101015',
            'sub_division_name_en' => 'NGAOUNDERE 2er',
            'sub_division_name_fr' => 'NGAOUNDERE 2er',
            'total_surface_area' => 513000000
        ]);
        SubDivision::create([
            'id' => 16,
            'division_id' => 5,
            'code' => '0101016',
            'sub_division_name_en' => 'NGAOUNDERE 3er',
            'sub_division_name_fr' => 'NGAOUNDERE 3er',
            'total_surface_area' => 393000000
        ]);
        SubDivision::create([
            'id' => 17,
            'division_id' => 5,
            'code' => '0101017',
            'sub_division_name_en' => 'BELEL',
            'sub_division_name_fr' => 'BELEL',
            'total_surface_area' => 4000000000
        ]);
        SubDivision::create([
            'id' => 18,
            'division_id' => 5,
            'code' => '0101018',
            'sub_division_name_en' => 'MBE',
            'sub_division_name_fr' => 'MBE',
            'total_surface_area' => 3000000000
        ]);
        SubDivision::create([
            'id' => 19,
            'division_id' => 5,
            'code' => '0101019',
            'sub_division_name_en' => 'NGANHA',
            'sub_division_name_fr' => 'NGANHA',
            'total_surface_area' => 4000000000
        ]);
        SubDivision::create([
            'id' => 20,
            'division_id' => 5,
            'code' => '0101020',
            'sub_division_name_en' => 'NYAMBAKA',
            'sub_division_name_fr' => 'NYAMBAKA',
            'total_surface_area' => 4500000000
        ]);
        SubDivision::create([
            'id' => 21,
            'division_id' => 5,
            'code' => '0101021',
            'sub_division_name_en' => 'MARTAP',
            'sub_division_name_fr' => 'MARTAP',
            'total_surface_area' => 3125000000
        ]);
        SubDivision::create([
            'id' => 22,
            'division_id' => 6,
            'code' => 'CE 06022',
            'sub_division_name_en' => 'MBANDJOCK',
            'sub_division_name_fr' => 'MBANDJOCK',
            'total_surface_area' => 889000000
        ]);
        SubDivision::create([
            'id' => 23,
            'division_id' => 6,
            'code' => 'CE 06023',
            'sub_division_name_en' => 'MINTA',
            'sub_division_name_fr' => 'MINTA',
            'total_surface_area' => 4000000000
        ]);
        SubDivision::create([
            'id' => 24,
            'division_id' => 6,
            'code' => 'CE 06024',
            'sub_division_name_en' => 'NANGA-EBOKO',
            'sub_division_name_fr' => 'NANGA-EBOKO',
            'total_surface_area' => 7000000000
        ]);
        SubDivision::create([
            'id' => 25,
            'division_id' => 6,
            'code' => 'CE 06025',
            'sub_division_name_en' => 'NKOTENG',
            'sub_division_name_fr' => 'NKOTENG',
            'total_surface_area' => 2250000000
        ]);
        SubDivision::create([
            'id' => 26,
            'division_id' => 6,
            'code' => 'CE 06026',
            'sub_division_name_en' => 'BIBEY',
            'sub_division_name_fr' => 'BIBEY',
            'total_surface_area' => 4110000000
        ]);
        SubDivision::create([
            'id' => 27,
            'division_id' => 6,
            'code' => 'CE 06027',
            'sub_division_name_en' => 'NSEM',
            'sub_division_name_fr' => 'NSEM',
            'total_surface_area' => 900000000
        ]);
        SubDivision::create([
            'id' => 28,
            'division_id' => 6,
            'code' => 'CE 06028',
            'sub_division_name_en' => 'LEMBE-YEZOUM',
            'sub_division_name_fr' => 'LEMBE-YEZOUM',
            'total_surface_area' => 2800000000
        ]);
        SubDivision::create([
            'id' => 29,
            'division_id' => 7,
            'code' => 'CE 07029',
            'sub_division_name_en' => 'EVODOULA',
            'sub_division_name_fr' => 'EVODOULA',
            'total_surface_area' => 250000000
        ]);
        SubDivision::create([
            'id' => 30,
            'division_id' => 7,
            'code' => 'CE 07030',
            'sub_division_name_en' => 'MONATELE',
            'sub_division_name_fr' => 'MONATELE',
            'total_surface_area' => 375500000
        ]);
        SubDivision::create([
            'id' => 31,
            'division_id' => 7,
            'code' => 'CE 07031',
            'sub_division_name_en' => 'OBALA',
            'sub_division_name_fr' => 'OBALA',
            'total_surface_area' => 475000000
        ]);
        SubDivision::create([
            'id' => 32,
            'division_id' => 7,
            'code' => 'CE 07032',
            'sub_division_name_en' => 'OKOLA',
            'sub_division_name_fr' => 'OKOLA',
            'total_surface_area' => 605000000
        ]);
        SubDivision::create([
            'id' => 33,
            'division_id' => 7,
            'code' => 'CE 07033',
            'sub_division_name_en' => 'SA\'A',
            'sub_division_name_fr' => 'SA\'A',
            'total_surface_area' => 583900000
        ]);
        SubDivision::create([
            'id' => 34,
            'division_id' => 7,
            'code' => 'CE 07034',
            'sub_division_name_en' => 'ELIG-MFOMO',
            'sub_division_name_fr' => 'ELIG-MFOMO',
            'total_surface_area' => 144000000
        ]);
        SubDivision::create([
            'id' => 35,
            'division_id' => 7,
            'code' => 'CE 07035',
            'sub_division_name_en' => 'EBEBDA',
            'sub_division_name_fr' => 'EBEBDA',
            'total_surface_area' => 250000000
        ]);
        SubDivision::create([
            'id' => 36,
            'division_id' => 7,
            'code' => 'CE 07036',
            'sub_division_name_en' => 'BATSCHENGA',
            'sub_division_name_fr' => 'BATSCHENGA',
            'total_surface_area' => 216000000
        ]);
        SubDivision::create([
            'id' => 37,
            'division_id' => 7,
            'code' => 'CE 07037',
            'sub_division_name_en' => 'LOBO',
            'sub_division_name_fr' => 'LOBO',
            'total_surface_area' => 260000000
        ]);
        SubDivision::create([
            'id' => 38,
            'division_id' => 8,
            'code' => 'CE 08038',
            'sub_division_name_en' => 'BAFIA',
            'sub_division_name_fr' => 'BAFIA',
            'total_surface_area' => 1300000000
        ]);
        SubDivision::create([
            'id' => 39,
            'division_id' => 8,
            'code' => 'CE 08039',
            'sub_division_name_en' => 'BOKITO',
            'sub_division_name_fr' => 'BOKITO',
            'total_surface_area' => 1115000000
        ]);
        SubDivision::create([
            'id' => 40,
            'division_id' => 8,
            'code' => 'CE 08040',
            'sub_division_name_en' => 'DEUK',
            'sub_division_name_fr' => 'DEUK',
            'total_surface_area' => 1555000000
        ]);
        SubDivision::create([
            'id' => 41,
            'division_id' => 8,
            'code' => 'CE 08041',
            'sub_division_name_en' => 'KIIKI',
            'sub_division_name_fr' => 'KIIKI',
            'total_surface_area' => 1000000000
        ]);
        SubDivision::create([
            'id' => 42,
            'division_id' => 8,
            'code' => 'CE 08042',
            'sub_division_name_en' => 'KON-YAMBETTA',
            'sub_division_name_fr' => 'KON-YAMBETTA',
            'total_surface_area' => 1300000000
        ]);
        SubDivision::create([
            'id' => 43,
            'division_id' => 8,
            'code' => 'CE 08043',
            'sub_division_name_en' => 'MAKENENE',
            'sub_division_name_fr' => 'MAKENENE',
            'total_surface_area' => 885000000
        ]);
        SubDivision::create([
            'id' => 44,
            'division_id' => 8,
            'code' => 'CE 08044',
            'sub_division_name_en' => 'NDIKINIMEKI',
            'sub_division_name_fr' => 'NDIKINIMEKI',
            'total_surface_area' => 800000000
        ]);
        SubDivision::create([
            'id' => 45,
            'division_id' => 8,
            'code' => 'CE 08045',
            'sub_division_name_en' => 'NITOUKOU',
            'sub_division_name_fr' => 'NITOUKOU',
            'total_surface_area' => 800000000
        ]);
        SubDivision::create([
            'id' => 46,
            'division_id' => 8,
            'code' => 'CE 08046',
            'sub_division_name_en' => 'OMBESSA',
            'sub_division_name_fr' => 'OMBESSA',
            'total_surface_area' => 415000000
        ]);
        SubDivision::create([
            'id' => 47,
            'division_id' => 9,
            'code' => 'CE 09047',
            'sub_division_name_en' => 'MBANGASSINA',
            'sub_division_name_fr' => 'MBANGASSINA',
            'total_surface_area' => 638000000
        ]);
        SubDivision::create([
            'id' => 48,
            'division_id' => 9,
            'code' => 'CE 09048',
            'sub_division_name_en' => 'NGAMBE-TIKAR',
            'sub_division_name_fr' => 'NGAMBE-TIKAR',
            'total_surface_area' => 7200000000
        ]);
        SubDivision::create([
            'id' => 49,
            'division_id' => 9,
            'code' => 'CE 09049',
            'sub_division_name_en' => 'NGORO',
            'sub_division_name_fr' => 'NGORO',
            'total_surface_area' => 1576000000
        ]);
        SubDivision::create([
            'id' => 50,
            'division_id' => 9,
            'code' => 'CE 09050',
            'sub_division_name_en' => 'NTUI',
            'sub_division_name_fr' => 'NTUI',
            'total_surface_area' => 440300000
        ]);
        SubDivision::create([
            'id' => 51,
            'division_id' => 9,
            'code' => 'CE 09051',
            'sub_division_name_en' => 'YOKO',
            'sub_division_name_fr' => 'YOKO',
            'total_surface_area' => 15000000000
        ]);
        SubDivision::create([
            'id' => 52,
            'division_id' => 10,
            'code' => 'CE 10052',
            'sub_division_name_en' => 'AFANLOUM',
            'sub_division_name_fr' => 'AFANLOUM',
            'total_surface_area' => 170000000
        ]);
        SubDivision::create([
            'id' => 53,
            'division_id' => 10,
            'code' => 'CE 10053',
            'sub_division_name_en' => 'ASSAMBA',
            'sub_division_name_fr' => 'ASSAMBA',
            'total_surface_area' => 600000000
        ]);
        SubDivision::create([
            'id' => 54,
            'division_id' => 10,
            'code' => 'CE 10054',
            'sub_division_name_en' => 'AWAE',
            'sub_division_name_fr' => 'AWAE',
            'total_surface_area' => 900000000
        ]);
        SubDivision::create([
            'id' => 55,
            'division_id' => 10,
            'code' => 'CE 10055',
            'sub_division_name_en' => 'EDZENDOUAN',
            'sub_division_name_fr' => 'EDZENDOUAN',
            'total_surface_area' => 550000000
        ]);
        SubDivision::create([
            'id' => 56,
            'division_id' => 10,
            'code' => 'CE 10056',
            'sub_division_name_en' => 'ESSE',
            'sub_division_name_fr' => 'ESSE',
            'total_surface_area' => 1400000000
        ]);
        SubDivision::create([
            'id' => 57,
            'division_id' => 10,
            'code' => 'CE 10057',
            'sub_division_name_en' => 'MFOU',
            'sub_division_name_fr' => 'MFOU',
            'total_surface_area' => '3 338 000 000'
        ]);
        SubDivision::create([
            'id' => 58,
            'division_id' => 10,
            'code' => 'CE 10058',
            'sub_division_name_en' => 'NKOLAFAMBA',
            'sub_division_name_fr' => 'NKOLAFAMBA',
            'total_surface_area' => 652000000
       ]);
        SubDivision::create([
            'id' => 59,
            'division_id' => 10,
            'code' => 'CE 10059',
            'sub_division_name_en' => 'SOA',
            'sub_division_name_fr' => 'SOA',
            'total_surface_area' => 326000000
        ]);
        SubDivision::create([
            'id' => 60,
            'division_id' => 11,
            'code' => 'CE 11060',
            'sub_division_name_en' => 'AKONO',
            'sub_division_name_fr' => 'AKONO',
            'total_surface_area' => 211500000
        ]);
        SubDivision::create([
            'id' => 61,
            'division_id' => 11,
            'code' => 'CE 11061',
            'sub_division_name_en' => 'BIKOK',
            'sub_division_name_fr' => 'BIKOK',
            'total_surface_area' => 350000000
        ]);
        SubDivision::create([
            'id' => 62,
            'division_id' => 11,
            'code' => 'CE 11060',
            'sub_division_name_en' => 'MBANKOMO',
            'sub_division_name_fr' => 'MBANKOMO',
            'total_surface_area' => 445100000
        ]);
        SubDivision::create([
            'id' => 63,
            'division_id' => 12,
            'code' => 'CE 12063',
            'sub_division_name_en' => 'YAOUNDE I',
            'sub_division_name_fr' => 'YAOUNDE I',
            'total_surface_area' => 180000000
        ]);
        SubDivision::create([
            'id' => 64,
            'division_id' => 12,
            'code' => 'CE 12064',
            'sub_division_name_en' => 'YAOUNDE II',
            'sub_division_name_fr' => 'YAOUNDE II',
            'total_surface_area' => 23000000
        ]);
        SubDivision::create([
            'id' => 65,
            'division_id' => 12,
            'code' => 'CE 12065',
            'sub_division_name_en' => 'YAOUNDE III',
            'sub_division_name_fr' => 'YAOUNDE III',
            'total_surface_area' => 67000000
        ]);
        SubDivision::create([
            'id' => 66,
            'division_id' => 12,
            'code' => 'CE 12066',
            'sub_division_name_en' => 'YAOUNDE IV',
            'sub_division_name_fr' => 'YAOUNDE IV',
            'total_surface_area' => 58800000
        ]);
        SubDivision::create([
            'id' => 67,
            'division_id' => 12,
            'code' => 'CE 12067',
            'sub_division_name_en' => 'YAOUNDE V',
            'sub_division_name_fr' => 'YAOUNDE V',
            'total_surface_area' => 34000000
        ]);
        SubDivision::create([
            'id' => 68,
            'division_id' => 12,
            'code' => 'CE 12068',
            'sub_division_name_en' => 'YAOUNDE VI',
            'sub_division_name_fr' => 'YAOUNDE VI',
            'total_surface_area' => 22200000
        ]);
        SubDivision::create([
            'id' => 69,
            'division_id' => 12,
            'code' => 'CE 12069',
            'sub_division_name_en' => 'YAOUNDE VII',
            'sub_division_name_fr' => 'YAOUNDE VII',
            'total_surface_area' => 35300000
        ]);
        SubDivision::create([
            'id' => 70,
            'division_id' => 13,
            'code' => 'CE 13070',
            'sub_division_name_en' => 'BIYOUHA',
            'sub_division_name_fr' => 'BIYOUHA',
            'total_surface_area' => 270000000
        ]);
        SubDivision::create([
            'id' => 71,
            'division_id' => 13,
            'code' => 'CE 13071',
            'sub_division_name_en' => 'BONDJOCK',
            'sub_division_name_fr' => 'BONDJOCK',
            'total_surface_area' => 270000000
        ]);
        SubDivision::create([
            'id' => 72,
            'division_id' => 13,
            'code' => 'CE 13072',
            'sub_division_name_en' => 'BOT-MAKAK',
            'sub_division_name_fr' => 'BOT-MAKAK',
            'total_surface_area' => 2500000000
        ]);
        SubDivision::create([
            'id' => 73,
            'division_id' => 13,
            'code' => 'CE 13073',
            'sub_division_name_en' => 'DIBANG',
            'sub_division_name_fr' => 'DIBANG',
            'total_surface_area' => 475000000
        ]);
        SubDivision::create([
            'id' => 74,
            'division_id' => 13,
            'code' => 'CE 13074',
            'sub_division_name_en' => 'ESEKA',
            'sub_division_name_fr' => 'ESEKA',
            'total_surface_area' => 965000000
        ]);
        SubDivision::create([
            'id' => 75,
            'division_id' => 13,
            'code' => 'CE 13075',
            'sub_division_name_en' => 'MAKAK',
            'sub_division_name_fr' => 'MAKAK',
            'total_surface_area' => 1290000000
        ]);
        SubDivision::create([
            'id' => 76,
            'division_id' => 13,
            'code' => 'CE 13076',
            'sub_division_name_en' => 'MATOMB',
            'sub_division_name_fr' => 'MATOMB',
            'total_surface_area' => 620000000
        ]);
        SubDivision::create([
            'id' => 77,
            'division_id' => 13,
            'code' => 'CE 13077',
            'sub_division_name_en' => 'MESSONDO',
            'sub_division_name_fr' => 'MESSONDO',
            'total_surface_area' => 2065000000
        ]);
        SubDivision::create([
            'id' => 78,
            'division_id' => 13,
            'code' => 'CE 13078',
            'sub_division_name_en' => 'NGOG-MAPUBI',
            'sub_division_name_fr' => 'NGOG-MAPUBI',
            'total_surface_area' => 754000000
        ]);
        SubDivision::create([
            'id' => 79,
            'division_id' => 14,
            'code' => 'CE 14079',
            'sub_division_name_en' => 'AKONOLINGA',
            'sub_division_name_fr' => 'AKONOLINGA',
            'total_surface_area' => 1420000000
        ]);
        SubDivision::create([
            'id' => 80,
            'division_id' => 14,
            'code' => 'CE 14080',
            'sub_division_name_en' => 'AYOS',
            'sub_division_name_fr' => 'AYOS',
            'total_surface_area' => 1250000000
        ]);
        SubDivision::create([
            'id' => 81,
            'division_id' => 14,
            'code' => 'CE 14081',
            'sub_division_name_en' => 'ENDOM',
            'sub_division_name_fr' => 'ENDOM',
            'total_surface_area' => 1400000000
        ]);
        SubDivision::create([
            'id' => 82,
            'division_id' => 14,
            'code' => 'CE 14082',
            'sub_division_name_en' => 'MENGANG',
            'sub_division_name_fr' => 'MENGANG',
            'total_surface_area' => 640000000
        ]);
        SubDivision::create([
            'id' => 83,
            'division_id' => 14,
            'code' => 'CE 14083',
            'sub_division_name_en' => 'YAKOKOMBO',
            'sub_division_name_fr' => 'YAKOKOMBO',
            'total_surface_area' => 3080000000
        ]);
        SubDivision::create([
            'id' => 84,
            'division_id' => 15,
            'code' => 'CE 15084',
            'sub_division_name_en' => 'AKOEMAN',
            'sub_division_name_fr' => 'AKOEMAN',
            'total_surface_area' => 487000000
        ]);
        SubDivision::create([
            'id' => 85,
            'division_id' => 15,
            'code' => 'CE 15085',
            'sub_division_name_en' => 'DZENG',
            'sub_division_name_fr' => 'DZENG',
            'total_surface_area' => 987000000
       ]);
        SubDivision::create([
            'id' => 86,
            'division_id' => 15,
            'code' => 'CE 15086',
            'sub_division_name_en' => 'MBALMAYO',
            'sub_division_name_fr' => 'MBALMAYO',
            'total_surface_area' => 650000000
        ]);
        SubDivision::create([
            'id' => 87,
            'division_id' => 15,
            'code' => 'CE 15087',
            'sub_division_name_en' => 'MENGUEME',
            'sub_division_name_fr' => 'MENGUEME',
            'total_surface_area' => 548000000
        ]);
        SubDivision::create([
            'id' => 88,
            'division_id' => 15,
            'code' => 'CE 15088',
            'sub_division_name_en' => 'NKOL-METET',
            'sub_division_name_fr' => 'NKOL-METET',
            'total_surface_area' => 1400000000
        ]);
        SubDivision::create([
            'id' => 89,
            'division_id' => 15,
            'code' => 'CE 15089',
            'sub_division_name_en' => 'NGOMEDZAP',
            'sub_division_name_fr' => 'NGOMEDZAP',
            'total_surface_area' => 605000000
        ]);
        SubDivision::create([
            'id' => 90,
            'division_id' => 16,
            'code' => 'ES 16090',
            'sub_division_name_en' => 'GARI-GOMBO',
            'sub_division_name_fr' => 'GARI-GOMBO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 91,
            'division_id' => 16,
            'code' => 'ES 16091',
            'sub_division_name_en' => 'MOLOUNDOU',
            'sub_division_name_fr' => 'MOLOUNDOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 92,
            'division_id' => 16,
            'code' => 'ES 16092',
            'sub_division_name_en' => 'SALAPOUMBE',
            'sub_division_name_fr' => 'SALAPOUMBE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 93,
            'division_id' => 16,
            'code' => 'ES 16093',
            'sub_division_name_en' => 'YOKADOUMA',
            'sub_division_name_fr' => 'YOKADOUMA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 94,
            'division_id' => 17,
            'code' => 'ES 17094',
            'sub_division_name_en' => 'ABON-MBANG',
            'sub_division_name_fr' => 'ABON-MBANG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 95,
            'division_id' => 17,
            'code' => 'ES 17095',
            'sub_division_name_en' => 'BEBENG',
            'sub_division_name_fr' => 'BEBENG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 96,
            'division_id' => 17,
            'code' => 'ES 17096',
            'sub_division_name_en' => 'DIMAKO',
            'sub_division_name_fr' => 'DIMAKO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 97,
            'division_id' => 17,
            'code' => 'ES 17097',
            'sub_division_name_en' => 'DJA',
            'sub_division_name_fr' => 'DJA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 98,
            'division_id' => 17,
            'code' => 'ES 17098',
            'sub_division_name_en' => 'DOUMAINTANG',
            'sub_division_name_fr' => 'DOUMAINTANG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 99,
            'division_id' => 17,
            'code' => 'ES 17099',
            'sub_division_name_en' => 'DOUME',
            'sub_division_name_fr' => 'DOUME',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 100,
            'division_id' => 17,
            'code' => 'ES 17100',
            'sub_division_name_en' => 'LOMIE',
            'sub_division_name_fr' => 'LOMIE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 101,
            'division_id' => 17,
            'code' => 'ES 17101',
            'sub_division_name_en' => 'MBOMA',
            'sub_division_name_fr' => 'MBOMA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 102,
            'division_id' => 17,
            'code' => 'ES 17102',
            'sub_division_name_en' => 'MBOUANZ',
            'sub_division_name_fr' => 'MBOUANZ',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 103,
            'division_id' => 17,
            'code' => 'ES 17103',
            'sub_division_name_en' => 'MESSAMENA',
            'sub_division_name_fr' => 'MESSAMENA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 104,
            'division_id' => 17,
            'code' => 'ES 17104',
            'sub_division_name_en' => 'MESSOK',
            'sub_division_name_fr' => 'MESSOK',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 105,
            'division_id' => 17,
            'code' => 'ES 17105',
            'sub_division_name_en' => 'MGUELEMENDOUKA',
            'sub_division_name_fr' => 'MGUELEMENDOUKA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 106,
            'division_id' => 17,
            'code' => 'ES 17106',
            'sub_division_name_en' => 'NGOYLA',
            'sub_division_name_fr' => 'NGOYLA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 107,
            'division_id' => 17,
            'code' => 'ES 17107',
            'sub_division_name_en' => 'SAMALOMO',
            'sub_division_name_fr' => 'SAMALOMO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 108,
            'division_id' => 18,
            'code' => 'ES 18108',
            'sub_division_name_en' => 'BATOURI',
            'sub_division_name_fr' => 'BATOURI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 109,
            'division_id' => 18,
            'code' => 'ES 18109',
            'sub_division_name_en' => 'BOMBE',
            'sub_division_name_fr' => 'BOMBE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 110,
            'division_id' => 18,
            'code' => 'ES 18110',
            'sub_division_name_en' => 'KETTE',
            'sub_division_name_fr' => 'KETTE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 111,
            'division_id' => 18,
            'code' => 'ES 18111',
            'sub_division_name_en' => 'MBANG',
            'sub_division_name_fr' => 'MBANG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 112,
            'division_id' => 18,
            'code' => 'ES 18112',
            'sub_division_name_en' => 'MBOTORO',
            'sub_division_name_fr' => 'MBOTORO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 113,
            'division_id' => 18,
            'code' => 'ES 18113',
            'sub_division_name_en' => 'NDELELE',
            'sub_division_name_fr' => 'NDELELE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 114,
            'division_id' => 18,
            'code' => 'ES 18114',
            'sub_division_name_en' => 'MDEM-NAM',
            'sub_division_name_fr' => 'MDEM-NAM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 115,
            'division_id' => 19,
            'code' => 'ES 19115',
            'sub_division_name_en' => 'BERTOUA 1ER',
            'sub_division_name_fr' => 'BERTOUA 1ER',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 116,
            'division_id' => 19,
            'code' => 'ES 19116',
            'sub_division_name_en' => 'BERTOUA 2ER',
            'sub_division_name_fr' => 'BERTOUA 2ER',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 117,
            'division_id' => 19,
            'code' => 'ES 19117',
            'sub_division_name_en' => 'BETARE-OYA',
            'sub_division_name_fr' => 'BETARE-OYA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 118,
            'division_id' => 19,
            'code' => 'ES 19118',
            'sub_division_name_en' => 'BELABO',
            'sub_division_name_fr' => 'BELABO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 119,
            'division_id' => 19,
            'code' => 'ES 19119',
            'sub_division_name_en' => 'DIANG',
            'sub_division_name_fr' => 'DIANG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 120,
            'division_id' => 19,
            'code' => 'ES 19120',
            'sub_division_name_en' => 'GAROUA-BOULAI',
            'sub_division_name_fr' => 'GAROUA-BOULAI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 121,
            'division_id' => 19,
            'code' => 'ES 19121',
            'sub_division_name_en' => 'MANDJOU',
            'sub_division_name_fr' => 'MANDJOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 122,
            'division_id' => 19,
            'code' => 'ES 19122',
            'sub_division_name_en' => 'NGOURA',
            'sub_division_name_fr' => 'NGOURA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 123,
            'division_id' => 20,
            'code' => 'EN 20123',
            'sub_division_name_en' => 'BOGO',
            'sub_division_name_fr' => 'BOGO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 124,
            'division_id' => 20,
            'code' => 'EN 20124',
            'sub_division_name_en' => 'DARGALA',
            'sub_division_name_fr' => 'DARGALA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 125,
            'division_id' => 20,
            'code' => 'EN 20125',
            'sub_division_name_en' => 'GAZAWA',
            'sub_division_name_fr' => 'GAZAWA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 126,
            'division_id' => 20,
            'code' => 'EN 20126',
            'sub_division_name_en' => 'MAROUA 1ER',
            'sub_division_name_fr' => 'MAROUA 1ER',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 127,
            'division_id' => 20,
            'code' => 'EN 20127',
            'sub_division_name_en' => 'MAROUA 2E',
            'sub_division_name_fr' => 'MAROUA 2E',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 128,
            'division_id' => 20,
            'code' => 'EN 20128',
            'sub_division_name_en' => 'MAROUA 3E',
            'sub_division_name_fr' => 'MAROUA 3E',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 129,
            'division_id' => 20,
            'code' => 'EN 20129',
            'sub_division_name_en' => 'MERI',
            'sub_division_name_fr' => 'MERI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 130,
            'division_id' => 20,
            'code' => 'EN 20130',
            'sub_division_name_en' => 'NDOUKOULA',
            'sub_division_name_fr' => 'NDOUKOULA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 131,
            'division_id' => 20,
            'code' => 'EN 20131',
            'sub_division_name_en' => 'PETTE',
            'sub_division_name_fr' => 'PETTE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 132,
            'division_id' => 21,
            'code' => 'EN 21132',
            'sub_division_name_en' => 'BLANGOUA',
            'sub_division_name_fr' => 'BLANGOUA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 133,
            'division_id' => 21,
            'code' => 'EN 21133',
            'sub_division_name_en' => 'DARAK',
            'sub_division_name_fr' => 'DARAK',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 134,
            'division_id' => 21,
            'code' => 'EN 21134',
            'sub_division_name_en' => 'FOTOKOL',
            'sub_division_name_fr' => 'FOTOKOL',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 135,
            'division_id' => 21,
            'code' => 'EN 21135',
            'sub_division_name_en' => 'GOULFEY',
            'sub_division_name_fr' => 'GOULFEY',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 136,
            'division_id' => 21,
            'code' => 'EN 21136',
            'sub_division_name_en' => 'HILE-HALIFA',
            'sub_division_name_fr' => 'HILE-HALIFA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 137,
            'division_id' => 21,
            'code' => 'EN 21137',
            'sub_division_name_en' => 'KOUSSERI',
            'sub_division_name_fr' => 'KOUSSERI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 138,
            'division_id' => 21,
            'code' => 'EN 21138',
            'sub_division_name_en' => 'LOGONE-BIRNI',
            'sub_division_name_fr' => 'LOGONE-BIRNI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 139,
            'division_id' => 21,
            'code' => 'EN 21139',
            'sub_division_name_en' => 'MAKARY',
            'sub_division_name_fr' => 'MAKARY',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 140,
            'division_id' => 21,
            'code' => 'EN 21140',
            'sub_division_name_en' => 'WAZA',
            'sub_division_name_fr' => 'WAZA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 141,
            'division_id' => 21,
            'code' => 'EN 21141',
            'sub_division_name_en' => 'ZINA',
            'sub_division_name_fr' => 'ZINA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 142,
            'division_id' => 22,
            'code' => 'EN 22142',
            'sub_division_name_en' => 'DATCHEKA',
            'sub_division_name_fr' => 'DATCHEKA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 143,
            'division_id' => 22,
            'code' => 'EN 22143',
            'sub_division_name_en' => 'GOBO',
            'sub_division_name_fr' => 'GOBO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 144,
            'division_id' => 22,
            'code' => 'EN 22144',
            'sub_division_name_en' => 'GUERE',
            'sub_division_name_fr' => 'GUERE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 145,
            'division_id' => 22,
            'code' => 'EN 22145',
            'sub_division_name_en' => 'KAI-KAI',
            'sub_division_name_fr' => 'KAI-KAI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 145,
            'division_id' => 22,
            'code' => 'EN 22145',
            'sub_division_name_en' => 'KAI-KAI',
            'sub_division_name_fr' => 'KAI-KAI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 146,
            'division_id' => 22,
            'code' => 'EN 22146',
            'sub_division_name_en' => 'KALFOU',
            'sub_division_name_fr' => 'KALFOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 147,
            'division_id' => 22,
            'code' => 'EN 22147',
            'sub_division_name_en' => 'KAR-HAY',
            'sub_division_name_fr' => 'KAR-HAY',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 148,
            'division_id' => 22,
            'code' => 'EN 22148',
            'sub_division_name_en' => 'MAGA',
            'sub_division_name_fr' => 'MAGA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 149,
            'division_id' => 22,
            'code' => 'EN 22149',
            'sub_division_name_en' => 'TCHATIBALI',
            'sub_division_name_fr' => 'TCHATIBALI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 150,
            'division_id' => 22,
            'code' => 'EN 22150',
            'sub_division_name_en' => 'VELE',
            'sub_division_name_fr' => 'VELE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 151,
            'division_id' => 22,
            'code' => 'EN 22151',
            'sub_division_name_en' => 'WINA',
            'sub_division_name_fr' => 'WINA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 152,
            'division_id' => 22,
            'code' => 'EN 22152',
            'sub_division_name_en' => 'YAGOUA',
            'sub_division_name_fr' => 'YAGOUA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 153,
            'division_id' => 23,
            'code' => 'EN 23153',
            'sub_division_name_en' => 'GUIDIGUIS',
            'sub_division_name_fr' => 'GUIDIGUIS',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 154,
            'division_id' => 23,
            'code' => 'EN 23154',
            'sub_division_name_en' => 'KAELE',
            'sub_division_name_fr' => 'KAELE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 155,
            'division_id' => 23,
            'code' => 'EN 23155',
            'sub_division_name_en' => 'MINDIF',
            'sub_division_name_fr' => 'MINDIF',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 156,
            'division_id' => 23,
            'code' => 'EN 23156',
            'sub_division_name_en' => 'MOULVOUDAYE',
            'sub_division_name_fr' => 'MOULVOUDAYE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 157,
            'division_id' => 23,
            'code' => 'EN 23157',
            'sub_division_name_en' => 'MOUTOURWA',
            'sub_division_name_fr' => 'MOUTOURWA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 158,
            'division_id' => 23,
            'code' => 'EN 23158',
            'sub_division_name_en' => 'PORHI',
            'sub_division_name_fr' => 'PORHI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 159,
            'division_id' => 23,
            'code' => 'EN 23159',
            'sub_division_name_en' => 'TAIBONG',
            'sub_division_name_fr' => 'TAIBONG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 160,
            'division_id' => 24,
            'code' => 'EN 24160',
            'sub_division_name_en' => 'MORA',
            'sub_division_name_fr' => 'MORA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 161,
            'division_id' => 24,
            'code' => 'EN 24161',
            'sub_division_name_en' => 'KOLOFATA',
            'sub_division_name_fr' => 'KOLOFATA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 162,
            'division_id' => 24,
            'code' => 'EN 24162',
            'sub_division_name_en' => 'TOKOMBERE',
            'sub_division_name_fr' => 'TOKOMBERE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 163,
            'division_id' => 25,
            'code' => 'EN 25163',
            'sub_division_name_en' => 'BOURRHA',
            'sub_division_name_fr' => 'BOURRHA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 164,
            'division_id' => 25,
            'code' => 'EN 25164',
            'sub_division_name_en' => 'HINA',
            'sub_division_name_fr' => 'HINA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 165,
            'division_id' => 25,
            'code' => 'EN 25165',
            'sub_division_name_en' => 'KOZA',
            'sub_division_name_fr' => 'KOZA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 166,
            'division_id' => 25,
            'code' => 'EN 25166',
            'sub_division_name_en' => 'MAYO-MASKOTA',
            'sub_division_name_fr' => 'MAYO-MASKOTA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 167,
            'division_id' => 25,
            'code' => 'EN 25167',
            'sub_division_name_en' => 'MOGODE',
            'sub_division_name_fr' => 'MOGODE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 168,
            'division_id' => 25,
            'code' => 'EN 25168',
            'sub_division_name_en' => 'MOKOLO',
            'sub_division_name_fr' => 'MOKOLO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 169,
            'division_id' => 25,
            'code' => 'EN 25169',
            'sub_division_name_en' => 'SOUKELE-ROUA',
            'sub_division_name_fr' => 'SOUKELE-ROUA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 170,
            'division_id' => 26,
            'code' => 'LT 26170',
            'sub_division_name_en' => 'BARE-BAKEM',
            'sub_division_name_fr' => 'BARE-BAKEM',
            'total_surface_area' => 200000000
        ]);
        SubDivision::create([
            'id' => 171,
            'division_id' => 26,
            'code' => 'LT 26171',
            'sub_division_name_en' => 'DIBOMBARI',
            'sub_division_name_fr' => 'DIBOMBARI',
            'total_surface_area' => 150000000
        ]);
        SubDivision::create([
            'id' => 172,
            'division_id' => 26,
            'code' => 'LT 26172',
            'sub_division_name_en' => 'FIKO',
            'sub_division_name_fr' => 'FIKO',
            'total_surface_area' => 650000000
        ]);
        SubDivision::create([
            'id' => 173,
            'division_id' => 26,
            'code' => 'LT 26173',
            'sub_division_name_en' => 'LOUM',
            'sub_division_name_fr' => 'LOUM',
            'total_surface_area' => 430000000
        ]);
        SubDivision::create([
            'id' => 174,
            'division_id' => 26,
            'code' => 'LT 26174',
            'sub_division_name_en' => 'MANJO',
            'sub_division_name_fr' => 'MANJO',
            'total_surface_area' => 305000000
        ]);
        SubDivision::create([
            'id' => 175,
            'division_id' => 26,
            'code' => 'LT 26175',
            'sub_division_name_en' => 'MBANGA',
            'sub_division_name_fr' => 'MBANGA',
            'total_surface_area' => 544000000
        ]);
        SubDivision::create([
            'id' => 176,
            'division_id' => 26,
            'code' => 'LT 26176',
            'sub_division_name_en' => 'MELONG',
            'sub_division_name_fr' => 'MELONG',
            'total_surface_area' => 497000000
        ]);
        SubDivision::create([
            'id' => 177,
            'division_id' => 26,
            'code' => 'LT 26177',
            'sub_division_name_en' => 'MOMBO',
            'sub_division_name_fr' => 'MOMBO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 178,
            'division_id' => 26,
            'code' => 'LT 26178',
            'sub_division_name_en' => 'NKONSAMBA 1er',
            'sub_division_name_fr' => 'NKONSAMBA 1er',
            'total_surface_area' => 105500000
        ]);
        SubDivision::create([
            'id' => 179,
            'division_id' => 26,
            'code' => 'LT 26179',
            'sub_division_name_en' => 'NKONSAMBA 2e',
            'sub_division_name_fr' => 'NKONSAMBA 2e',
            'total_surface_area' => 67000000
        ]);
        SubDivision::create([
            'id' => 180,
            'division_id' => 26,
            'code' => 'LT 26180',
            'sub_division_name_en' => 'NKONSAMBA 3e',
            'sub_division_name_fr' => 'NKONSAMBA 3e',
            'total_surface_area' => 48550000
        ]);
        SubDivision::create([
            'id' => 181,
            'division_id' => 26,
            'code' => 'LT 26181',
            'sub_division_name_en' => 'NLONAKO',
            'sub_division_name_fr' => 'NLONAKO',
            'total_surface_area' => 140000000
        ]);
        SubDivision::create([
            'id' => 182,
            'division_id' => 26,
            'code' => 'LT 26182',
            'sub_division_name_en' => 'NJOMBE-PENJA',
            'sub_division_name_fr' => 'NJOMBE-PENJA',
            'total_surface_area' => 260000000
        ]);
        SubDivision::create([
            'id' => 183,
            'division_id' => 27,
            'code' => 'LT 27183',
            'sub_division_name_en' => 'NKONDJOCK',
            'sub_division_name_fr' => 'NKONDJOCK',
            'total_surface_area' => 2000000000
        ]);
        SubDivision::create([
            'id' => 184,
            'division_id' => 27,
            'code' => 'LT 27184',
            'sub_division_name_en' => 'NORD-MAKOMBE',
            'sub_division_name_fr' => 'NORD-MAKOMBE',
            'total_surface_area' => 534000000
        ]);
        SubDivision::create([
            'id' => 185,
            'division_id' => 27,
            'code' => 'LT 27185',
            'sub_division_name_en' => 'YABASSI',
            'sub_division_name_fr' => 'YABASSI',
            'total_surface_area' => 3080000000
        ]);
        SubDivision::create([
            'id' => 186,
            'division_id' => 27,
            'code' => 'LT 27186',
            'sub_division_name_en' => 'YINGUI',
            'sub_division_name_fr' => 'YINGUI',
            'total_surface_area' => 677000000
        ]);
        SubDivision::create([
            'id' => 187,
            'division_id' => 28,
            'code' => 'LT 28187',
            'sub_division_name_en' => 'DIBAMBA',
            'sub_division_name_fr' => 'DIBAMBA',
            'total_surface_area' => 1600000000
        ]);
        SubDivision::create([
            'id' => 188,
            'division_id' => 28,
            'code' => 'LT 28188',
            'sub_division_name_en' => 'DIZANGUE',
            'sub_division_name_fr' => 'DIZANGUE',
            'total_surface_area' => 541000000
        ]);
        SubDivision::create([
            'id' => 189,
            'division_id' => 28,
            'code' => 'LT 28189',
            'sub_division_name_en' => 'EDEA 1er',
            'sub_division_name_fr' => 'EDEA 1er',
            'total_surface_area' => 1012090000
        ]);
        SubDivision::create([
            'id' => 190,
            'division_id' => 28,
            'code' => 'LT 28190',
            'sub_division_name_en' => 'EDEA 2e',
            'sub_division_name_fr' => 'EDEA 2e',
            'total_surface_area' => 180000000
        ]);
        SubDivision::create([
            'id' => 191,
            'division_id' => 28,
            'code' => 'LT 28191',
            'sub_division_name_en' => 'MASSOCK-SONGLOULOU',
            'sub_division_name_fr' => 'MASSOCK-SONGLOULOU',
            'total_surface_area' => 578750000
        ]);
        SubDivision::create([
            'id' => 192,
            'division_id' => 28,
            'code' => 'LT 28192',
            'sub_division_name_en' => 'MOUANKO',
            'sub_division_name_fr' => 'MOUANKO',
            'total_surface_area' => 1378000000
        ]);
        SubDivision::create([
            'id' => 193,
            'division_id' => 28,
            'code' => 'LT 28193',
            'sub_division_name_en' => 'NDOM',
            'sub_division_name_fr' => 'NDOM',
            'total_surface_area' => 1700000000
        ]);
        SubDivision::create([
            'id' => 194,
            'division_id' => 28,
            'code' => 'LT 28194',
            'sub_division_name_en' => 'NGAMBE',
            'sub_division_name_fr' => 'NGAMBE',
            'total_surface_area' => 7200000000
        ]);
        SubDivision::create([
            'id' => 195,
            'division_id' => 28,
            'code' => 'LT 28195',
            'sub_division_name_en' => 'NGWEI',
            'sub_division_name_fr' => 'NGWEI',
            'total_surface_area' => 880040000
        ]);
        SubDivision::create([
            'id' => 196,
            'division_id' => 28,
            'code' => 'LT 28196',
            'sub_division_name_en' => 'NYANON',
            'sub_division_name_fr' => 'NYANON',
            'total_surface_area' => 598000000
        ]);
        SubDivision::create([
            'id' => 197,
            'division_id' => 28,
            'code' => 'LT 28197',
            'sub_division_name_en' => 'POUMA',
            'sub_division_name_fr' => 'POUMA',
            'total_surface_area' => 701000000
        ]);
        SubDivision::create([
            'id' => 198,
            'division_id' => 29,
            'code' => 'LT 29198',
            'sub_division_name_en' => 'DOUALA 1er',
            'sub_division_name_fr' => 'DOUALA 1er',
            'total_surface_area' => 26300000
       ]);
        SubDivision::create([
            'id' => 199,
            'division_id' => 29,
            'code' => 'LT 29199',
            'sub_division_name_en' => 'DOUALA 2e',
            'sub_division_name_fr' => 'DOUALA 2e',
            'total_surface_area' => 16000000
        ]);
        SubDivision::create([
            'id' => 200,
            'division_id' => 29,
            'code' => 'LT 29200',
            'sub_division_name_en' => 'DOUALA 3e',
            'sub_division_name_fr' => 'DOUALA 3e',
            'total_surface_area' => 168140000
        ]);
        SubDivision::create([
            'id' => 201,
            'division_id' => 29,
            'code' => 'LT 29201',
            'sub_division_name_en' => 'DOUALA 4e',
            'sub_division_name_fr' => 'DOUALA 4e',
            'total_surface_area' => 210000000
        ]);
        SubDivision::create([
            'id' => 202,
            'division_id' => 29,
            'code' => 'LT 29202',
            'sub_division_name_en' => 'DOUALA 5e',
            'sub_division_name_fr' => 'DOUALA 5e',
            'total_surface_area' => 50000000
        ]);
        SubDivision::create([
            'id' => 203,
            'division_id' => 29,
            'code' => 'LT 29203',
            'sub_division_name_en' => 'DOUALA 6e',
            'sub_division_name_fr' => 'DOUALA 6e',
            'total_surface_area' => 368000000
        ]);
        SubDivision::create([
            'id' => 204,
            'division_id' => 30,
            'code' => 'LT 30204',
            'sub_division_name_en' => 'BASCHEO',
            'sub_division_name_fr' => 'BASCHEO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 205,
            'division_id' => 30,
            'code' => 'ND 30205',
            'sub_division_name_en' => 'BIBEMI',
            'sub_division_name_fr' => 'BIBEMI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 205,
            'division_id' => 30,
            'code' => 'ND 30205',
            'sub_division_name_en' => 'DEMBO',
            'sub_division_name_fr' => 'DEMBO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 206,
            'division_id' => 30,
            'code' => 'ND 30206',
            'sub_division_name_en' => 'DEMSA',
            'sub_division_name_fr' => 'DEMSA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 207,
            'division_id' => 30,
            'code' => 'ND 30207',
            'sub_division_name_en' => 'GAROUA 1ER',
            'sub_division_name_fr' => 'GAROUA 1ER',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 208,
            'division_id' => 30,
            'code' => 'ND 30208',
            'sub_division_name_en' => 'GAROUA 2E',
            'sub_division_name_fr' => 'GAROUA 2E',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 209,
            'division_id' => 30,
            'code' => 'ND 30209',
            'sub_division_name_en' => 'GAROUA 3E',
            'sub_division_name_fr' => 'GAROUA 3E',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 209,
            'division_id' => 30,
            'code' => 'ND 30209',
            'sub_division_name_en' => 'LAGDO',
            'sub_division_name_fr' => 'LAGDO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 210,
            'division_id' => 30,
            'code' => 'ND 30210',
            'sub_division_name_en' => 'MAYO HOURNA',
            'sub_division_name_fr' => 'MAYO HOURNA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 211,
            'division_id' => 30,
            'code' => 'ND 30211',
            'sub_division_name_en' => 'PITOA',
            'sub_division_name_fr' => 'PITOA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 212,
            'division_id' => 30,
            'code' => 'ND 30212',
            'sub_division_name_en' => 'TCHEBOA',
            'sub_division_name_fr' => 'TCHEBOA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 213,
            'division_id' => 30,
            'code' => 'ND 30213',
            'sub_division_name_en' => 'OUROUA',
            'sub_division_name_fr' => 'OUROUA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 214,
            'division_id' => 31,
            'code' => 'ND 31214',
            'sub_division_name_en' => 'BEKA',
            'sub_division_name_fr' => 'BEKA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 215,
            'division_id' => 31,
            'code' => 'ND 31215',
            'sub_division_name_en' => 'POLI',
            'sub_division_name_fr' => 'POLI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 216,
            'division_id' => 32,
            'code' => 'ND 32216',
            'sub_division_name_en' => 'FIGUIL',
            'sub_division_name_fr' => 'FIGUIL',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 217,
            'division_id' => 32,
            'code' => 'ND 32217',
            'sub_division_name_en' => 'GUIDER',
            'sub_division_name_fr' => 'GUIDER',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 218,
            'division_id' => 32,
            'code' => 'ND 32218',
            'sub_division_name_en' => 'MAYO-OULO',
            'sub_division_name_fr' => 'MAYO-OULO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 219,
            'division_id' => 33,
            'code' => 'ND 33219',
            'sub_division_name_en' => 'MADINGRING',
            'sub_division_name_fr' => 'MADINGRING',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 220,
            'division_id' => 33,
            'code' => 'ND 33220',
            'sub_division_name_en' => 'REY-BOUBA',
            'sub_division_name_fr' => 'REY-BOUBA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 221,
            'division_id' => 33,
            'code' => 'ND 33221',
            'sub_division_name_en' => 'TCHOLLIRE',
            'sub_division_name_fr' => 'TCHOLLIRE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 222,
            'division_id' => 33,
            'code' => 'ND 33222',
            'sub_division_name_en' => 'TOUBORO',
            'sub_division_name_fr' => 'TOUBORO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 223,
            'division_id' => 34,
            'code' => 'NO 34223',
            'sub_division_name_en' => 'JAKIRI',
            'sub_division_name_fr' => 'JAKIRI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 224,
            'division_id' => 34,
            'code' => 'NO 34224',
            'sub_division_name_en' => 'KUMBO',
            'sub_division_name_fr' => 'KUMBO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 225,
            'division_id' => 34,
            'code' => 'NO 34225',
            'sub_division_name_en' => 'MBVEN',
            'sub_division_name_fr' => 'MBVEN',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 226,
            'division_id' => 34,
            'code' => 'NO 34226',
            'sub_division_name_en' => 'NKUM',
            'sub_division_name_fr' => 'NKUM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 227,
            'division_id' => 34,
            'code' => 'NO 34227',
            'sub_division_name_en' => 'NONI',
            'sub_division_name_fr' => 'NONI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 228,
            'division_id' => 34,
            'code' => 'NO 34228',
            'sub_division_name_en' => 'OKU',
            'sub_division_name_fr' => 'OKU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 229,
            'division_id' => 35,
            'code' => 'NO 35229',
            'sub_division_name_en' => 'BELO',
            'sub_division_name_fr' => 'BELO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 230,
            'division_id' => 35,
            'code' => 'NO 35230',
            'sub_division_name_en' => 'BUM',
            'sub_division_name_fr' => 'BUM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 231,
            'division_id' => 35,
            'code' => 'NO 35231',
            'sub_division_name_en' => 'FUNDONG',
            'sub_division_name_fr' => 'FUNDONG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 232,
            'division_id' => 35,
            'code' => 'NO 35232',
            'sub_division_name_en' => 'NJINIKOM',
            'sub_division_name_fr' => 'NJINIKOM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 233,
            'division_id' => 36,
            'code' => 'NO 36233',
            'sub_division_name_en' => 'AKO',
            'sub_division_name_fr' => 'AKO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 234,
            'division_id' => 36,
            'code' => 'NO 36234',
            'sub_division_name_en' => 'MISAJE',
            'sub_division_name_fr' => 'MISAJE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 235,
            'division_id' => 36,
            'code' => 'NO 36235',
            'sub_division_name_en' => 'NDU',
            'sub_division_name_fr' => 'NDU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 236,
            'division_id' => 36,
            'code' => 'NO 36236',
            'sub_division_name_en' => 'NKAMBE',
            'sub_division_name_fr' => 'NKAMBE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 237,
            'division_id' => 36,
            'code' => 'NO 36237',
            'sub_division_name_en' => 'NWA',
            'sub_division_name_fr' => 'NWA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 237,
            'division_id' => 36,
            'code' => 'NO 36237',
            'sub_division_name_en' => 'NWA',
            'sub_division_name_fr' => 'NWA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 238,
            'division_id' => 37,
            'code' => 'NO 37238',
            'sub_division_name_en' => 'FUNGOM',
            'sub_division_name_fr' => 'FUNGOM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 239,
            'division_id' => 37,
            'code' => 'NO 37239',
            'sub_division_name_en' => 'FURU-AWA',
            'sub_division_name_fr' => 'FURU-AWA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 240,
            'division_id' => 37,
            'code' => 'NO 37240',
            'sub_division_name_en' => 'MENCHUM VALLEY',
            'sub_division_name_fr' => 'MENCHUM VALLEY',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 241,
            'division_id' => 37,
            'code' => 'NO 37241',
            'sub_division_name_en' => 'WUM',
            'sub_division_name_fr' => 'WUM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 242,
            'division_id' => 38,
            'code' => 'NO 38242',
            'sub_division_name_en' => 'BALI',
            'sub_division_name_fr' => 'BALI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 243,
            'division_id' => 38,
            'code' => 'NO 38243',
            'sub_division_name_en' => 'BAFUT',
            'sub_division_name_fr' => 'BAFUT',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 244,
            'division_id' => 38,
            'code' => 'NO 38244',
            'sub_division_name_en' => 'BAMENDA 1er',
            'sub_division_name_fr' => 'BAMENDA 1er',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 245,
            'division_id' => 38,
            'code' => 'NO 38245',
            'sub_division_name_en' => 'BAMENDA 2e',
            'sub_division_name_fr' => 'BAMENDA 2e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 246,
            'division_id' => 38,
            'code' => 'NO 38246',
            'sub_division_name_en' => 'BAMENDA 3e',
            'sub_division_name_fr' => 'BAMENDA 3e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 247,
            'division_id' => 38,
            'code' => 'NO 38247',
            'sub_division_name_en' => 'SANTA',
            'sub_division_name_fr' => 'SANTA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 248,
            'division_id' => 38,
            'code' => 'NO 38248',
            'sub_division_name_en' => 'TUBAH',
            'sub_division_name_fr' => 'TUBAH',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 249,
            'division_id' => 39,
            'code' => 'NO 39249',
            'sub_division_name_en' => 'BATIBO',
            'sub_division_name_fr' => 'BATIBO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 250,
            'division_id' => 39,
            'code' => 'NO 39250',
            'sub_division_name_en' => 'MBENGWI',
            'sub_division_name_fr' => 'MBENGWI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 251,
            'division_id' => 39,
            'code' => 'NO 39251',
            'sub_division_name_en' => 'NJIKWA',
            'sub_division_name_fr' => 'NJIKWA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 252,
            'division_id' => 39,
            'code' => 'NO 39252',
            'sub_division_name_en' => 'NGIE',
            'sub_division_name_fr' => 'NGIE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 253,
            'division_id' => 39,
            'code' => 'NO 39253',
            'sub_division_name_en' => 'WIDIKUM-MENKA',
            'sub_division_name_fr' => 'WIDIKUM-MENKA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 254,
            'division_id' => 40,
            'code' => 'NO 40254',
            'sub_division_name_en' => 'BABESSI',
            'sub_division_name_fr' => 'BABESSI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 255,
            'division_id' => 40,
            'code' => 'NO 40255',
            'sub_division_name_en' => 'BALIKUMBAT',
            'sub_division_name_fr' => 'BALIKUMBAT',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 256,
            'division_id' => 40,
            'code' => 'NO 40256',
            'sub_division_name_en' => 'NDOP',
            'sub_division_name_fr' => 'NDOP',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 257,
            'division_id' => 41,
            'code' => 'OU 41257',
            'sub_division_name_en' => 'MBOUDA',
            'sub_division_name_fr' => 'MBOUDA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 258,
            'division_id' => 41,
            'code' => 'OU 41258',
            'sub_division_name_en' => 'GALIM',
            'sub_division_name_fr' => 'GALIM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 259,
            'division_id' => 41,
            'code' => 'OU 41259',
            'sub_division_name_en' => 'BATCHAM',
            'sub_division_name_fr' => 'BATCHAM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 260,
            'division_id' => 41,
            'code' => 'OU 41260',
            'sub_division_name_en' => 'BABADJOU',
            'sub_division_name_fr' => 'BABADJOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 261,
            'division_id' => 41,
            'code' => 'OU 41261',
            'sub_division_name_en' => 'BAFANG',
            'sub_division_name_fr' => 'BAFANG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 262,
            'division_id' => 41,
            'code' => 'OU 41262',
            'sub_division_name_en' => 'BANA',
            'sub_division_name_fr' => 'BANA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 263,
            'division_id' => 41,
            'code' => 'OU 41263',
            'sub_division_name_en' => 'BANDJA',
            'sub_division_name_fr' => 'BANDJA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 264,
            'division_id' => 41,
            'code' => 'OU 41264',
            'sub_division_name_en' => 'KEKEM',
            'sub_division_name_fr' => 'KEKEM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 265,
            'division_id' => 41,
            'code' => 'OU 41265',
            'sub_division_name_en' => 'BAKOU',
            'sub_division_name_fr' => 'BAKOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 266,
            'division_id' => 41,
            'code' => 'OU 41266',
            'sub_division_name_en' => 'BANKA',
            'sub_division_name_fr' => 'BANKA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 267,
            'division_id' => 41,
            'code' => 'OU 41267',
            'sub_division_name_en' => 'BANWA',
            'sub_division_name_fr' => 'BANWA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 268,
            'division_id' => 41,
            'code' => 'OU 41268',
            'sub_division_name_en' => 'BAHAM',
            'sub_division_name_fr' => 'BAHAM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 269,
            'division_id' => 41,
            'code' => 'OU 41269',
            'sub_division_name_en' => 'BAMENDJOU',
            'sub_division_name_fr' => 'BAMENDJOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 270,
            'division_id' => 41,
            'code' => 'OU 41270',
            'sub_division_name_en' => 'BANGOU',
            'sub_division_name_fr' => 'BANGOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 271,
            'division_id' => 41,
            'code' => 'OU 41271',
            'sub_division_name_en' => 'BATIE',
            'sub_division_name_fr' => 'BATIE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 272,
            'division_id' => 41,
            'code' => 'OU 41272',
            'sub_division_name_en' => 'POUMOUGNE',
            'sub_division_name_fr' => 'POUMOUGNE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 273,
            'division_id' => 41,
            'code' => 'OU 41273',
            'sub_division_name_en' => 'BAYANGAM',
            'sub_division_name_fr' => 'BAYANGAM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 274,
            'division_id' => 41,
            'code' => 'OU 41274',
            'sub_division_name_en' => 'DJEBEM',
            'sub_division_name_fr' => 'DJEBEM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 275,
            'division_id' => 41,
            'code' => 'OU 41275',
            'sub_division_name_en' => 'DSCHANG',
            'sub_division_name_fr' => 'DSCHANG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 276,
            'division_id' => 41,
            'code' => 'OU 41276',
            'sub_division_name_en' => 'PENKA-MICHEL',
            'sub_division_name_fr' => 'PENKA-MICHEL',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 277,
            'division_id' => 41,
            'code' => 'OU 41277',
            'sub_division_name_en' => 'FOKOUE',
            'sub_division_name_fr' => 'FOKOUE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 278,
            'division_id' => 41,
            'code' => 'OU 41278',
            'sub_division_name_en' => 'NKONG-NI',
            'sub_division_name_fr' => 'NKONG-NI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 279,
            'division_id' => 41,
            'code' => 'OU 41279',
            'sub_division_name_en' => 'SANTCHOU',
            'sub_division_name_fr' => 'SANTCHOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 280,
            'division_id' => 41,
            'code' => 'OU 41280',
            'sub_division_name_en' => 'FONGO TONGO',
            'sub_division_name_fr' => 'FONGO TONGO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 281,
            'division_id' => 41,
            'code' => 'OU 41281',
            'sub_division_name_en' => 'BAFOUSSAM 1er',
            'sub_division_name_fr' => 'BAFOUSSAM 1er',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 282,
            'division_id' => 41,
            'code' => 'OU 41282',
            'sub_division_name_en' => 'BAFOUSSAM 2e',
            'sub_division_name_fr' => 'BAFOUSSAM 2e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 283,
            'division_id' => 41,
            'code' => 'OU 41283',
            'sub_division_name_en' => 'BAFOUSSAM 3e',
            'sub_division_name_fr' => 'BAFOUSSAM 3e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 284,
            'division_id' => 41,
            'code' => 'OU 41284',
            'sub_division_name_en' => 'BAGANGTE',
            'sub_division_name_fr' => 'BAGANGTE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 285,
            'division_id' => 41,
            'code' => 'OU 41285',
            'sub_division_name_en' => 'BAZOU',
            'sub_division_name_fr' => 'BAZOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 286,
            'division_id' => 41,
            'code' => 'OU 41286',
            'sub_division_name_en' => 'TONGA',
            'sub_division_name_fr' => 'TONGA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 287,
            'division_id' => 41,
            'code' => 'OU 41287',
            'sub_division_name_en' => 'BASSAMBA',
            'sub_division_name_fr' => 'BASSAMBA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 288,
            'division_id' => 41,
            'code' => 'OU 41288',
            'sub_division_name_en' => 'FOUMBAN',
            'sub_division_name_fr' => 'FOUMBAN',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 289,
            'division_id' => 41,
            'code' => 'OU 41289',
            'sub_division_name_en' => 'FOUMBOT',
            'sub_division_name_fr' => 'FOUMBOT',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 290,
            'division_id' => 41,
            'code' => 'OU 41290',
            'sub_division_name_en' => 'MALENTOUEN',
            'sub_division_name_fr' => 'MALENTOUEN',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 291,
            'division_id' => 41,
            'code' => 'OU 41291',
            'sub_division_name_en' => 'MASSANGAM',
            'sub_division_name_fr' => 'MASSANGAM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 292,
            'division_id' => 41,
            'code' => 'OU 41292',
            'sub_division_name_en' => 'MAGBA',
            'sub_division_name_fr' => 'MAGBA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 293,
            'division_id' => 41,
            'code' => 'OU 41293',
            'sub_division_name_en' => 'KOUTABA',
            'sub_division_name_fr' => 'KOUTABA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 294,
            'division_id' => 41,
            'code' => 'OU 41294',
            'sub_division_name_en' => 'BANGOURAN',
            'sub_division_name_fr' => 'BANGOURAN',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 295,
            'division_id' => 41,
            'code' => 'OU 41295',
            'sub_division_name_en' => 'KOUOPTAMO',
            'sub_division_name_fr' => 'KOUOPTAMO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 296,
            'division_id' => 41,
            'code' => 'OU 41296',
            'sub_division_name_en' => 'NJIMON',
            'sub_division_name_fr' => 'NJIMON',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 297,
            'division_id' => 42,
            'code' => 'SU 42297',
            'sub_division_name_en' => 'BENGBIS',
            'sub_division_name_fr' => 'BENGBIS',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 298,
            'division_id' => 42,
            'code' => 'SU 42298',
            'sub_division_name_en' => 'DJOUM',
            'sub_division_name_fr' => 'DJOUM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 299,
            'division_id' => 42,
            'code' => 'SU 42299',
            'sub_division_name_en' => 'SANGMELIMA',
            'sub_division_name_fr' => 'SANGMELIMA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 300,
            'division_id' => 42,
            'code' => 'SU 42300',
            'sub_division_name_en' => 'ZOETELE',
            'sub_division_name_fr' => 'ZOETELE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 301,
            'division_id' => 42,
            'code' => 'SU 42301',
            'sub_division_name_en' => 'OVENG',
            'sub_division_name_fr' => 'OVENG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 302,
            'division_id' => 42,
            'code' => 'SU 42301',
            'sub_division_name_en' => 'MINTOM',
            'sub_division_name_fr' => 'MINTOM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 302,
            'division_id' => 42,
            'code' => 'SU 42302',
            'sub_division_name_en' => 'MEYOMESSALA',
            'sub_division_name_fr' => 'MEYOMESSALA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 303,
            'division_id' => 42,
            'code' => 'SU 42303',
            'sub_division_name_en' => 'MEYOMESSI',
            'sub_division_name_fr' => 'MEYOMESSI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 304,
            'division_id' => 43,
            'code' => 'SU 42304',
            'sub_division_name_en' => 'AMBAM',
            'sub_division_name_fr' => 'AMBAM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 305,
            'division_id' => 43,
            'code' => 'SU 42305',
            'sub_division_name_en' => 'MA\'AN',
            'sub_division_name_fr' => 'MA\'AN',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 306,
            'division_id' => 43,
            'code' => 'SU 42306',
            'sub_division_name_en' => 'OLAMZE',
            'sub_division_name_fr' => 'OLAMZE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 307,
            'division_id' => 43,
            'code' => 'SU 42307',
            'sub_division_name_en' => 'KYE OSSI',
            'sub_division_name_fr' => 'KYE OSSI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 308,
            'division_id' => 44,
            'code' => 'SU 42308',
            'sub_division_name_en' => 'EBOLOWA 1ER',
            'sub_division_name_fr' => 'EBOLOWA 1ER',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 308,
            'division_id' => 44,
            'code' => 'SU 42308',
            'sub_division_name_en' => 'EBOLOWA 2E',
            'sub_division_name_fr' => 'EBOLOWA 2E',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 309,
            'division_id' => 44,
            'code' => 'SU 42309',
            'sub_division_name_en' => 'BIWONG-BANE',
            'sub_division_name_fr' => 'BIWONG-BANE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 309,
            'division_id' => 44,
            'code' => 'SU 42309',
            'sub_division_name_en' => 'MVANGAN',
            'sub_division_name_fr' => 'MVANGAN',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 310,
            'division_id' => 44,
            'code' => 'SU 42310',
            'sub_division_name_en' => 'MENGONG',
            'sub_division_name_fr' => 'MENGONG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 311,
            'division_id' => 44,
            'code' => 'SU 42311',
            'sub_division_name_en' => 'NGOULEMAKONG',
            'sub_division_name_fr' => 'NGOULEMAKONG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 312,
            'division_id' => 44,
            'code' => 'SU 42312',
            'sub_division_name_en' => 'EFOULAN',
            'sub_division_name_fr' => 'EFOULAN',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 313,
            'division_id' => 44,
            'code' => 'SU 42313',
            'sub_division_name_en' => 'BIWONG BULU',
            'sub_division_name_fr' => 'BIWONG BULU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 314,
            'division_id' => 44,
            'code' => 'SU 42314',
            'sub_division_name_en' => 'AKOM II',
            'sub_division_name_fr' => 'AKOM II',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 315,
            'division_id' => 44,
            'code' => 'SU 42315',
            'sub_division_name_en' => 'CAMPO',
            'sub_division_name_fr' => 'CAMPO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 316,
            'division_id' => 44,
            'code' => 'SU 42316',
            'sub_division_name_en' => 'KRIBI 1er',
            'sub_division_name_fr' => 'KRIBI 1er',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 317,
            'division_id' => 44,
            'code' => 'SU 42317',
            'sub_division_name_en' => 'KRIBI 2e',
            'sub_division_name_fr' => 'KRIBI 2e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 318,
            'division_id' => 44,
            'code' => 'SU 42318',
            'sub_division_name_en' => 'LOLODORF',
            'sub_division_name_fr' => 'LOLODORF',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 319,
            'division_id' => 44,
            'code' => 'SU 42319',
            'sub_division_name_en' => 'MVENGUE',
            'sub_division_name_fr' => 'MVENGUE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 319,
            'division_id' => 44,
            'code' => 'SU 42319',
            'sub_division_name_en' => 'BIPINDI',
            'sub_division_name_fr' => 'BIPINDI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 320,
            'division_id' => 44,
            'code' => 'SU 42320',
            'sub_division_name_en' => 'LOKOUNDJE',
            'sub_division_name_fr' => 'LOKOUNDJE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 321,
            'division_id' => 44,
            'code' => 'SU 42321',
            'sub_division_name_en' => 'NIETE',
            'sub_division_name_fr' => 'NIETE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 322,
            'division_id' => 43,
            'code' => 'SO 43322',
            'sub_division_name_en' => 'MUYUKA',
            'sub_division_name_fr' => 'MUYUKA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 323,
            'division_id' => 43,
            'code' => 'SO 43323',
            'sub_division_name_en' => 'TIKO',
            'sub_division_name_fr' => 'TIKO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 324,
            'division_id' => 43,
            'code' => 'SO 43324',
            'sub_division_name_en' => 'LIMBE 1er',
            'sub_division_name_fr' => 'LIMBE 1er',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 325,
            'division_id' => 43,
            'code' => 'SO 43325',
            'sub_division_name_en' => 'LIMBE 2e',
            'sub_division_name_fr' => 'LIMBE 2e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 326,
            'division_id' => 43,
            'code' => 'SO 43326',
            'sub_division_name_en' => 'LIMBE 3e',
            'sub_division_name_fr' => 'LIMBE 3e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 327,
            'division_id' => 43,
            'code' => 'SO 43327',
            'sub_division_name_en' => 'BUEA',
            'sub_division_name_fr' => 'BUEA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 328,
            'division_id' => 43,
            'code' => 'SO 43328',
            'sub_division_name_en' => 'WEST-COAST',
            'sub_division_name_fr' => 'WEST-COAST',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 329,
            'division_id' => 43,
            'code' => 'SO 43329',
            'sub_division_name_en' => 'BANGEM',
            'sub_division_name_fr' => 'BANGEM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 330,
            'division_id' => 43,
            'code' => 'SO 43330',
            'sub_division_name_en' => 'NGUTI',
            'sub_division_name_fr' => 'NGUTI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 331,
            'division_id' => 43,
            'code' => 'SO 43331',
            'sub_division_name_en' => 'TOMBEL',
            'sub_division_name_fr' => 'TOMBEL',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 332,
            'division_id' => 43,
            'code' => 'SO 43332',
            'sub_division_name_en' => 'FONTEM',
            'sub_division_name_fr' => 'FONTEM',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 333,
            'division_id' => 43,
            'code' => 'SO 43333',
            'sub_division_name_en' => 'ALOU',
            'sub_division_name_fr' => 'ALOU',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 334,
            'division_id' => 43,
            'code' => 'SO 43334',
            'sub_division_name_en' => 'WABANE',
            'sub_division_name_fr' => 'WABANE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 335,
            'division_id' => 43,
            'code' => 'SO 43335',
            'sub_division_name_en' => 'AKWAYA',
            'sub_division_name_fr' => 'AKWAYA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 336,
            'division_id' => 43,
            'code' => 'SO 43336',
            'sub_division_name_en' => 'MAMFE',
            'sub_division_name_fr' => 'MAMFE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 337,
            'division_id' => 43,
            'code' => 'SO 43337',
            'sub_division_name_en' => 'EYUMODJOCK',
            'sub_division_name_fr' => 'EYUMODJOCK',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 338,
            'division_id' => 43,
            'code' => 'SO 43338',
            'sub_division_name_en' => 'UPPER-BAYANG',
            'sub_division_name_fr' => 'UPPER-BAYANG',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 339,
            'division_id' => 43,
            'code' => 'SO 43339',
            'sub_division_name_en' => 'KUMBA 1er',
            'sub_division_name_fr' => 'KUMBA 1er',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 340,
            'division_id' => 43,
            'code' => 'SO 43340',
            'sub_division_name_en' => 'KUMBA 2e',
            'sub_division_name_fr' => 'KUMBA 2e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 341,
            'division_id' => 43,
            'code' => 'SO 43341',
            'sub_division_name_en' => 'KUMBA 3e',
            'sub_division_name_fr' => 'KUMBA 3e',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 342,
            'division_id' => 43,
            'code' => 'SO 43342',
            'sub_division_name_en' => 'KONYE',
            'sub_division_name_fr' => 'KONYE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 343,
            'division_id' => 43,
            'code' => 'SO 43343',
            'sub_division_name_en' => 'BONGE',
            'sub_division_name_fr' => 'BONGE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 344,
            'division_id' => 43,
            'code' => 'SO 43344',
            'sub_division_name_en' => 'BAMUSSO',
            'sub_division_name_fr' => 'BAMUSSO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 345,
            'division_id' => 43,
            'code' => 'SO 43345',
            'sub_division_name_en' => 'EKONDO-TITI',
            'sub_division_name_fr' => 'EKONDO-TITI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 346,
            'division_id' => 43,
            'code' => 'SO 43346',
            'sub_division_name_en' => 'ISANGUELE',
            'sub_division_name_fr' => 'ISANGUELE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 347,
            'division_id' => 43,
            'code' => 'SO 43347',
            'sub_division_name_en' => 'MUNDEMBA',
            'sub_division_name_fr' => 'MUNDEMBA',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 348,
            'division_id' => 43,
            'code' => 'SO 43348',
            'sub_division_name_en' => 'KOMBO ABEDIMO',
            'sub_division_name_fr' => 'KOMBO ABEDIMO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 349,
            'division_id' => 43,
            'code' => 'SO 43349',
            'sub_division_name_en' => 'KOMBO IDINTI',
            'sub_division_name_fr' => 'KOMBO IDINTI',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 350,
            'division_id' => 43,
            'code' => 'SO 43350',
            'sub_division_name_en' => 'IDABATO',
            'sub_division_name_fr' => 'IDABATO',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 351,
            'division_id' => 43,
            'code' => 'SO 43351',
            'sub_division_name_en' => 'DIKOME-BALUE',
            'sub_division_name_fr' => 'DIKOME-BALUE',
            'total_surface_area' => 0
        ]);
        SubDivision::create([
            'id' => 352,
            'division_id' => 43,
            'code' => 'SO 43352',
            'sub_division_name_en' => 'TOKO',
            'sub_division_name_fr' => 'TOKO',
            'total_surface_area' => 0
        ]);
    }
}
