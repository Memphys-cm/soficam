<?php

namespace Database\Seeders;

use App\Models\Cabinet;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use App\Models\MembreDuCabinet;
use Illuminate\Database\Seeder;
use App\Models\Lotissements\Lotissement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LotissementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lotissement::create([
            'uuid' => Str::uuid(),
            'code' => 'LOT123456',
            'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
            'geometre_id' => MembreDuCabinet::pluck('id')->shuffle()->first(),
            'geometre_cabinet_id' => Cabinet::pluck('id')->shuffle()->first(),
            'maeture' => 'Maeture Example',
            'promoteur_immobiliere' => 'Promoteur Immobilière Example',
            'lotisseur' => 'Lotisseur Example',
            'agent_immobiliere' => 'Agent Immobilière Example',
            'geometric' => 'Geometric Example',
            'urbaniste' => 'Urbaniste Example',
            'controlleur' => 'Controlleur Example',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for($i=0 ; $i<50 ; $i++){

            Lotissement::create([
                'uuid' => Str::uuid(),
                'code' => 'LOT789012',
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'geometre_id' => MembreDuCabinet::pluck('id')->shuffle()->first(),
                'geometre_cabinet_id' => Cabinet::pluck('id')->shuffle()->first(),
                'maeture' => 'Another Maeture',
                'promoteur_immobiliere' => 'Another Promoteur Immobilière',
                'lotisseur' => 'Another Lotisseur',
                'agent_immobiliere' => 'Another Agent Immobilière',
                'geometric' => 'Another Geometric',
                'urbaniste' => 'Another Urbaniste',
                'controlleur' => 'Another Controlleur',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }

}
