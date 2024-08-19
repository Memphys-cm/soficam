<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\BordereauAnalytique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BordereauAnalytiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=0 ; $i<50 ; $i++) {

            BordereauAnalytique::create([
                'uuid' => Str::uuid(),
                'numero_bordereau_analytique' => Str::upper(Str::random(7)) . now()->format('msu'),
                'volume_du_bordereau_analytique' => 'Volume 1',
                'date_detablissement_du_bordereau_analytique' => now()->subDays(10),
                'designation_des_operations' => 'morcellement',
                'differenciation_des_operations' => 'simple',
                'references_des_actes' => 'REF123456',
                'date_enregistrement_a_la_conversation' => now()->subDays(5),
                'commentaires' => 'Commentaires sur le bordereau analytique',
            ]);
    
        }
       
        for($i=0 ; $i<50 ; $i++) {
            
            BordereauAnalytique::create([
                'uuid' => Str::uuid(),
                'numero_bordereau_analytique' => Str::upper(Str::random(7)) . now()->format('msu'),
                'volume_du_bordereau_analytique' => 'Volume 2',
                'date_detablissement_du_bordereau_analytique' => now()->subDays(15),
                'designation_des_operations' => 'mutation_totale',
                'differenciation_des_operations' => 'par_voie_notariee',
                'references_des_actes' => 'REF789012',
                'date_enregistrement_a_la_conversation' => now()->subDays(7),
                'commentaires' => 'Autres commentaires sur le bordereau analytique',
            ]);

        }

    }
}

