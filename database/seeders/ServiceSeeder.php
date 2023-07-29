<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::flushEventListeners();

        Service::create([
            'code' => '001',
            'service_name_en' => 'Cadastre',
            'service_name_fr' => 'Cadastre'
        ]);

        Service::create([
            'code' => '002',
            'service_name_en' => 'MINDAF',
            'service_name_fr' => 'MINDAF'
        ]);
    }
}
