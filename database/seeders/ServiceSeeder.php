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
    }
}
