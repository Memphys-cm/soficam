<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::flushEventListeners();

        Service::create([
            'uuid' => Str::uuid(),
            'code' => '001',
            'service_name_en' => 'Cadastre',
            'service_name_fr' => 'Cadastre'
        ]);

        Service::create([
            'uuid' => Str::uuid(),
            'code' => '002',
            'service_name_en' => 'MINDAF',
            'service_name_fr' => 'MINDAF'
        ]);

        Service::create([
            'uuid' => Str::uuid(),
            'code' => '003',
            'service_name_en' => 'SDAF',
            'service_name_fr' => 'SDAF'
        ]);

        Service::create([
            'uuid' => Str::uuid(),
            'code' => '004',
            'service_name_en' => 'MINDCAF',
            'service_name_fr' => 'MINDCAF'
        ]);

        Service::create([
            'uuid' => Str::uuid(),
            'code' => '005',
            'service_name_en' => 'SCAF',
            'service_name_fr' => 'SCAF'
        ]);

        Service::create([
            'uuid' => Str::uuid(),
            'code' => '006',
            'service_name_en' => 'DDCAF',
            'service_name_fr' => 'DDCAF'
        ]);

        Service::create([
            'uuid' => Str::uuid(),
            'code' => '007',
            'service_name_en' => 'DDDCAF',
            'service_name_fr' => 'DDDCAF'
        ]);

        Service::create([
            'uuid' => Str::uuid(),
            'code' => '008',
            'service_name_en' => 'DRDCAF',
            'service_name_fr' => 'DRDCAF'
        ]);

    }
}
