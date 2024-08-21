<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ImmatriculationDirecte;

class ImmatriculationDirecteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = [
            '1- Création du Dossier',
            '2- Cotation du Dossier au Csdaf',
            '3- Délivrance de l\'Ordre de Versement',
            '4- Changements de Statut après la Publication d’Avis',
            '5- Génération du Certificat d\'Affichage',
            '6- Changements de Statut liés au Certificat d\'Affichage',
            '7- Enregistrement de la Descente sur le Terrain',
            '8- Établissement de l\'État de Cession et Paiement',
            '9- Instruction de la Descente sur le Terrain',
            '10- Changement de Statut après la Descente sur le Terrain',
            '11- Mise à Jour du Dossier Technique',
            '12- Mise en Forme du Dossier Administratif',
            '13- Changements de Statut après Transmission',
            '14- Établissement du Bordereau de Transmission',
            '15- Changements de Statut après le Bordereau',
            '16- Production du Certificat Final',
            '17- Finalisation et Clôture du Dossier',
            '18- Vérification Finale',
            '19- Remise des Documents Officiels',
            '20- Archivage du Dossier',
        ];

        for ($i = 1; $i <= 50; $i++) {
            ImmatriculationDirecte::create([
                'uuid' => Str::uuid(),
                'reference' => 'REF-' . Str::random(8),
                'localisation' => 'Localisation ' . $i,
                'region_id' => rand(1, 10),
                'division_id' => rand(1, 10),
                'sub_division_id' => rand(1, 10),
                'zone' => 'Zone ' . $i,
                'etat_terrain' => 'Etat ' . $i,
                'duplicata' => null,
                'source_terrain' => 'Source ' . $i,
                'superficie' => rand(100, 1000),
                'volume' => 'Volume ' . $i,
                'folio' => 'Folio ' . $i,
                'numero_cp' => 'CP-' . Str::random(5),
                'titre_foncier_id' => rand(1, 10),
                'numero_bordereau_transmission' => 'BT-' . Str::random(5),
                'next_step' => $steps[array_rand($steps)],
                'statut' => 'En cours',
                'StatutStyle' => 'primary',
                'date_delivrance' => now()->subDays(rand(1, 365)),
                'comissions' => json_encode(['Commission 1', 'Commission 2']),
                'service_id' => rand(1, 5),
                'cotation_user_id' => rand(1, 5),
                'observation_cotation' => 'Observation cotation ' . $i,
                'date_cotation' => now()->subDays(rand(1, 365)),
                'status_cotation' => 'done',
                'montant_ordre_versement' => rand(1000, 5000),
                'numero_ordre_versement' => 'OV-' . Str::random(5),
                'numero_arrete_ordre_versement' => 'AO-' . Str::random(5),
                'date_ordre_versement' => now()->subDays(rand(1, 365)),
                'status_ordre_versement' => 'done',
                'status_avis_publique' => 'done',
                'date_avis_publique' => now()->subDays(rand(1, 365)),
                'date_avis_publique_signe' => now()->subDays(rand(1, 365)),
                'calendar_decision' => 'Calendrier ' . $i,
                'calendar_decision_date' => now()->subDays(rand(1, 365)),
                'date_debut_certificat_d_affichage' => now()->subDays(rand(1, 365)),
                'date_fin_certificat_d_affichage' => now()->subDays(rand(1, 365)),
                'date_certificat_d_affichage_signer' => now()->subDays(rand(1, 365)),
                'date_convocation' => now()->subDays(rand(1, 365)),
                'status_convocation' => 'Statut convocation ' . $i,
                'geometre_id' => rand(1, 5),
                'date_geometre_enregistrer' => now()->subDays(rand(1, 365)),
                'pv_enregistrer' => now()->subDays(rand(1, 365)),
                'dossier_technique_complet' => now()->subDays(rand(1, 365)),
                'dossier_jumelage' => now()->subDays(rand(1, 365)),
                'transmission_csdaf' => now()->subDays(rand(1, 365)),
                'dossier_administratif_complet' => now()->subDays(rand(1, 365)),
                'dossier_technique_enregistrer' => now()->subDays(rand(1, 365)),
                'etat_cession_id' => rand(1, 10),
                'etat_cession' => now()->subDays(rand(1, 365)),
                'etat_cession_payer' => now()->subDays(rand(1, 365)),
                'date_publication_dossier_vise' => now()->subDays(rand(1, 365)),
                'date_signature_bulletin' => now()->subDays(rand(1, 365)),
                'coordonnees' => json_encode(['lat' => rand(0, 90), 'lng' => rand(0, 180)]),
                'limit_nord' => 'Nord ' . $i,
                'limit_sud' => 'Sud ' . $i,
                'limit_est' => 'Est ' . $i,
                'limit_ouest' => 'Ouest ' . $i,
                'dossier_technique_created' => now()->subDays(rand(1, 365)),
                'descente_terrain' => now()->subDays(rand(1, 365)),
                'transmission_dos_tech_csdaf' => now()->subDays(rand(1, 365)),
                'transmission_delegue_departemental' => now()->subDays(rand(1, 365)),
                'transmission_delegue_regional' => now()->subDays(rand(1, 365)),
                'date_calendrier_descente' => now()->subDays(rand(1, 365)),
                'service' => 'Service ' . $i,
                'date_dossier_signe_csr_cadastre' => now()->subDays(rand(1, 365)),
                'date_dossier_transmi_au_Mindcaf' => now()->subDays(rand(1, 365)),
                'date_dossier_complet_transmi_CSRegional_mindcaf' => now()->subDays(rand(1, 365)),
                'date_dossier_vise_en_attente_publication' => now()->subDays(rand(1, 365)),
                'service_dossier_complet_id' => rand(1, 5),
                'user_dossier_complet_id' => rand(1, 5),
                'observation_dossier_complet' => 'Observation dossier complet ' . $i,
                'date_dossier_complet_vise_coter' => now()->subDays(rand(1, 365)),
                'numero_redevance_fonciere' => 'RF-' . Str::random(5),
                'ordre_redevance_fonciere' => now()->subDays(rand(1, 365)),
                'montant_ordre_redevance_fonciere' => rand(1000, 5000),
                'cadre_id' => rand(1, 5),
                'observation_cotation_cadre' => 'Observation cotation cadre ' . $i,
                'date_cotation_cadre' => now()->subDays(rand(1, 365)),
                'coter_csrcadastre' => now()->subDays(rand(1, 365)),
                'dos_tech_transmis_drm' => now()->subDays(rand(1, 365)),
                'dos_compl_csrdaf' => now()->subDays(rand(1, 365)),
                'cotation_compl_csrdaf' => now()->subDays(rand(1, 365)),
                'numero_serie' => 'NS-' . Str::random(5),
                'is_finalisation' => 'non',
                'is_complete' => rand(0, 1),
            ]);
        }
        $immatriculations = ImmatriculationDirecte::all();
        $users = User::all();

        foreach ($immatriculations as $immatriculation) {
            // Associe aléatoirement entre 1 et 3 utilisateurs à chaque immatriculation_directe
            $userIds = $users->random(rand(1, 3))->pluck('id');

            foreach ($userIds as $userId) {
                DB::table('immatriculation_directe_user')->insert([
                    'immatriculation_directe_id' => $immatriculation->id,
                    'user_id' => $userId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
