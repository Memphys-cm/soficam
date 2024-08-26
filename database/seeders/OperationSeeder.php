<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Operation;
use App\Models\User;
use App\Models\TitreFoncier;
use App\Models\ImmatriculationDirecte;
use App\Models\CertificatePropriete;
use App\Models\Service;
use App\Models\MembreDuCabinet;
use App\Models\EtatCession;
use App\Models\Lotissement;
use App\Models\BordereauAnalytique;
use App\Models\Lotissements\Lotissement as LotissementsLotissement;
use Illuminate\Support\Str;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nombre d'enregistrements à insérer
        $recordsToInsert = 5000;

        // Récupérer toutes les ids des tables dépendantes
        $userIds = User::pluck('id')->toArray();
        $titreFoncierIds = TitreFoncier::pluck('id')->toArray();
        $immatriculationDirecteIds = ImmatriculationDirecte::pluck('id')->toArray();
        $certificatePrioprietesIds = CertificatePropriete::pluck('id')->toArray();
        $serviceIds = Service::pluck('id')->toArray();
        $membreDuCabinetIds = MembreDuCabinet::pluck('id')->toArray();
        $etatCessionIds = EtatCession::pluck('id')->toArray();
        $lotissementIds = LotissementsLotissement::pluck('id')->toArray();
        $bordereauAnalytiqueIds = BordereauAnalytique::pluck('id')->toArray();

        for ($i = 0; $i < $recordsToInsert; $i++) {
            Operation::create([
                'uuid' => Str::uuid(),
                'numero_operation' => 'OP-' . strtoupper(Str::random(10)),
                'type_operation' => collect(['mutation_totale_normale', 'mutation_totale_par_deces', 'morcellement_normale', 'morcellement_forcee', 'retrait_indivision_normale', 'retrait_indivision_forcee', 'immatriculation_directe', 'lotissement'])->random(),
                'status' => collect(['en cour', 'terminer', 'en attente'])->random(),
                'requestor_id' => $this->getRandomId($userIds),
                'titre_foncier_id' => $this->getRandomId($titreFoncierIds),
                'immatriculation_directe_id' => $this->getRandomId($immatriculationDirecteIds),
                'certificate_prioprietes_id' => $this->getRandomId($certificatePrioprietesIds),
                'service_id' => $this->getRandomId($serviceIds),
                'validite_CP' => now()->addDays(rand(1, 365)),
                'numero_reference_CP' => strtoupper(Str::random(15)),
                'numero_reference_CU' => strtoupper(Str::random(15)),
                'geometre_id' => $this->getRandomId($membreDuCabinetIds),
                'numero_reference_plan' => strtoupper(Str::random(15)),
                'etat_cession_id' => $this->getRandomId($etatCessionIds),
                'commantaires_geometre' => 'Commentaires sur le géomètre.',
                'numero_reference_quittance_etat_cession' => strtoupper(Str::random(15)),
                'statut_geometre' => collect(['pending_payment', 'ongoing', 'completed', 'pending'])->random(),
                'notaire_id' => $this->getRandomId($membreDuCabinetIds),
                'lotissement_id' => $this->getRandomId($lotissementIds),
                'numero_reference_acte_expidition' => strtoupper(Str::random(15)),
                'statut_notaire' => collect(['ongoing', 'completed', 'pending'])->random(),
                'commantaires_notaire' => 'Commentaires sur le notaire.',
                'conservateur_id' => $this->getRandomId($userIds),
                'prix' => rand(100000, 5000000) / 100,
                'numero_reference_quittance_ordre_versement' => strtoupper(Str::random(15)),
                'bordereau_analytique_id' => $this->getRandomId($bordereauAnalytiqueIds),
                'statut_conservateur' => collect(['pending_payment', 'ongoing', 'completed', 'pending'])->random(),
                'commantaires_conservateur' => 'Commentaires sur le conservateur.',
            ]);
        }
    }

    /**
     * Obtenir une ID aléatoire si les IDs existent.
     */
    private function getRandomId(array $ids)
    {
        return !empty($ids) ? $ids[array_rand($ids)] : null;
    }
}
