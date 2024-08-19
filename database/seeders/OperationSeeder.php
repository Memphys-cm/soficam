<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Operation;
use App\Models\EtatCession;
use Illuminate\Support\Str;
use App\Models\TitreFoncier;
use Illuminate\Database\Seeder;
use App\Models\BordereauAnalytique;
use App\Models\CertificatePropriete;
use App\Models\Lotissements\Lotissement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 50; $i++) {
            $requestor = User::first();
            $geometre = User::where('role', 'geometre')->pluck('id')->shuffle()->first();
            $notaire = User::where('role', 'notaire')->pluck('id')->shuffle()->first();
            $conservateur = User::where('role', 'conservateur')->pluck('id')->shuffle()->first();
            

            $lotissement = Lotissement::pluck('id')->shuffle()->first();
            $bordereauAnalytique = BordereauAnalytique::pluck('id')->shuffle()->first();

            $Operation = Operation::create([
                'uuid' => Str::uuid(),
                'numero_operation' => 'OP123456',
                'type_operation' => 'mutation_totale_normale',
                'requestor_id' => $requestor->id,
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_prioprietes_id' => CertificatePropriete::pluck('id')->shuffle()->first(),
                'service_id' => Service::pluck('id')->shuffle()->first(),
                'validite_CP' => '2024-12-31',
                'numero_reference_CP' => 'CP123456',
                'numero_reference_CU' => 'CU123456',
                'geometre_id' => $geometre,
                'numero_reference_plan' => 'PLAN123',
                'etat_cession_id' => EtatCession::pluck('id')->shuffle()->first(),
                'commantaires_geometre' => 'Commentaires sur le géomètre',
                'numero_reference_quittance_etat_cession' => 'QUITTANCE123',
                'statut_geometre' => 'pending',
                'notaire_id' => $notaire,
                'lotissement_id' => $lotissement,
                'numero_reference_acte_expidition' => 'ACTE123',
                'statut_notaire' => 'pending',
                'commantaires_notaire' => 'Commentaires sur le notaire',
                'conservateur_id' => $conservateur,
                'prix' => 20000.00,
                'numero_reference_quittance_ordre_versement' => 'QUITTANCE_ORDRE123',
                'bordereau_analytique_id' => $bordereauAnalytique,
                'statut_conservateur' => 'pending',
                'commantaires_conservateur' => 'Commentaires sur le conservateur',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }  

        for ($i = 0; $i < 50; $i++) {
            $requestor = User::first();
            $geometre = User::where('role', 'geometre')->pluck('id')->shuffle()->first();
            $notaire = User::where('role', 'notaire')->pluck('id')->shuffle()->first();
            $conservateur = User::where('role', 'conservateur')->pluck('id')->shuffle()->first();
            

            $lotissement = Lotissement::pluck('id')->shuffle()->first();
            $bordereauAnalytique = BordereauAnalytique::pluck('id')->shuffle()->first();

            $Operation = Operation::create([
                'uuid' => Str::uuid(),
                'numero_operation' => 'OP123456',
                'type_operation' => 'mutation_totale_normale',
                'requestor_id' => $requestor->id,
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_prioprietes_id' => CertificatePropriete::pluck('id')->shuffle()->first(),
                'service_id' => Service::pluck('id')->shuffle()->first(),
                'validite_CP' => '2024-12-31',
                'numero_reference_CP' => 'CP123456',
                'numero_reference_CU' => 'CU123456',
                'geometre_id' => $geometre,
                'numero_reference_plan' => 'PLAN123',
                'etat_cession_id' => EtatCession::pluck('id')->shuffle()->first(),
                'commantaires_geometre' => 'Commentaires sur le géomètre',
                'numero_reference_quittance_etat_cession' => 'QUITTANCE123',
                'statut_geometre' => 'pending',
                'notaire_id' => $notaire,
                'lotissement_id' => $lotissement,
                'numero_reference_acte_expidition' => 'ACTE123',
                'statut_notaire' => 'pending',
                'commantaires_notaire' => 'Commentaires sur le notaire',
                'conservateur_id' => $conservateur,
                'prix' => 20000.00,
                'numero_reference_quittance_ordre_versement' => 'QUITTANCE_ORDRE123',
                'bordereau_analytique_id' => $bordereauAnalytique,
                'statut_conservateur' => 'pending',
                'commantaires_conservateur' => 'Commentaires sur le conservateur',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }  

        for ($i = 0; $i < 50; $i++) {
            $requestor = User::first();
            $geometre = User::where('role', 'geometre')->pluck('id')->shuffle()->first();
            $notaire = User::where('role', 'notaire')->pluck('id')->shuffle()->first();
            $conservateur = User::where('role', 'conservateur')->pluck('id')->shuffle()->first();
            

            $lotissement = Lotissement::pluck('id')->shuffle()->first();
            $bordereauAnalytique = BordereauAnalytique::pluck('id')->shuffle()->first();

            $Operation = Operation::create([
                'uuid' => Str::uuid(),
                'numero_operation' => 'OP123456',
                'type_operation' => 'mutation_totale_normale',
                'requestor_id' => $requestor->id,
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_prioprietes_id' => CertificatePropriete::pluck('id')->shuffle()->first(),
                'service_id' => Service::pluck('id')->shuffle()->first(),
                'validite_CP' => '2024-12-31',
                'numero_reference_CP' => 'CP123456',
                'numero_reference_CU' => 'CU123456',
                'geometre_id' => $geometre,
                'numero_reference_plan' => 'PLAN123',
                'etat_cession_id' => EtatCession::pluck('id')->shuffle()->first(),
                'commantaires_geometre' => 'Commentaires sur le géomètre',
                'numero_reference_quittance_etat_cession' => 'QUITTANCE123',
                'statut_geometre' => 'pending',
                'notaire_id' => $notaire,
                'lotissement_id' => $lotissement,
                'numero_reference_acte_expidition' => 'ACTE123',
                'statut_notaire' => 'pending',
                'commantaires_notaire' => 'Commentaires sur le notaire',
                'conservateur_id' => $conservateur,
                'prix' => 20000.00,
                'numero_reference_quittance_ordre_versement' => 'QUITTANCE_ORDRE123',
                'bordereau_analytique_id' => $bordereauAnalytique,
                'statut_conservateur' => 'pending',
                'commantaires_conservateur' => 'Commentaires sur le conservateur',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }  

        for ($i = 0; $i < 50; $i++) {
            $requestor = User::first();
            $geometre = User::where('role', 'geometre')->pluck('id')->shuffle()->first();
            $notaire = User::where('role', 'notaire')->pluck('id')->shuffle()->first();
            $conservateur = User::where('role', 'conservateur')->pluck('id')->shuffle()->first();
            

            $lotissement = Lotissement::pluck('id')->shuffle()->first();
            $bordereauAnalytique = BordereauAnalytique::pluck('id')->shuffle()->first();

            $Operation = Operation::create([
                'uuid' => Str::uuid(),
                'numero_operation' => 'OP123456',
                'type_operation' => 'mutation_totale_normale',
                'requestor_id' => $requestor->id,
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_prioprietes_id' => CertificatePropriete::pluck('id')->shuffle()->first(),
                'service_id' => Service::pluck('id')->shuffle()->first(),
                'validite_CP' => '2023-10-21',
                'numero_reference_CP' => 'CP1234345',
                'numero_reference_CU' => 'CU123543',
                'geometre_id' => $geometre,
                'numero_reference_plan' => 'PLAN145',
                'etat_cession_id' => EtatCession::pluck('id')->shuffle()->first(),
                'commantaires_geometre' => ' le géomètre a les bonnes mesures',
                'numero_reference_quittance_etat_cession' => 'QUITTANCE1765',
                'statut_geometre' => 'pending',
                'notaire_id' => $notaire,
                'lotissement_id' => $lotissement,
                'numero_reference_acte_expidition' => 'ACTE098',
                'statut_notaire' => 'pending',
                'commantaires_notaire' => 'Il fait tres bien son travail',
                'conservateur_id' => $conservateur,
                'prix' => 25000.00,
                'numero_reference_quittance_ordre_versement' => 'QUITTANCE_ORDRE123',
                'bordereau_analytique_id' => $bordereauAnalytique,
                'statut_conservateur' => 'pending',
                'commantaires_conservateur' => ' le conservateur assure que les documents sont biens gardés',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }  

    }
}
