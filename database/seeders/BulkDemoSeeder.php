<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Division;
use App\Models\Service;
use App\Models\SubDivision;
use App\Models\MembreDuCabinet;
use App\Models\Sales\Sale;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

/**
 * Données de démo volumineuses pour le tableau de bord (ordres de grandeur cibles).
 * Inserts par paquets pour limiter la mémoire.
 *
 * Les horodatages sont générés en UTC ; la session MySQL est forcée en +00:00
 * pendant le seed pour que les chaînes ne soient pas interprétées dans un fuseau
 * avec DST (ex. 02h inexistante le jour du passage à l’heure d’été).
 */
class BulkDemoSeeder extends Seeder
{
    private const TARGET_TOTAL_USERS = 2300;

    private const TARGET_TOTAL_TITRE_FONCIERS = 3000;

    private const TARGET_TOTAL_IMMATRICULATIONS = 1200;

    /** Montant total visé pour SUM(sales_amount), en FCFA */
    private const TARGET_TOTAL_SALES_FCFA = 300_000_000;

    private const TARGET_TOTAL_LOTISSEMENTS = 3000;

    private const TARGET_TOTAL_OPERATIONS = 8000;

    private const INSERT_CHUNK = 400;

    /** Étapes pour la barre de progression (ordre d’exécution) */
    private const PROGRESS_STEPS = 7;

    private float $seedStartedAt = 0.0;

    private int $progressStep = 0;

    /**
     * Date/heure aléatoire (UTC) entre le 1er janvier et maintenant.
     * Heures limitées à 10h–22h pour éviter les instants ambigus si une couche
     * réapplique encore un fuseau local.
     */
    private function randomUtcDatetimeString(): string
    {
        $start = Carbon::now('UTC')->copy()->startOfYear();
        $end = Carbon::now('UTC');
        $ts = rand($start->timestamp, $end->timestamp);
        $date = gmdate('Y-m-d', $ts);
        $h = rand(10, 22);
        $m = rand(0, 59);
        $s = rand(0, 59);

        return sprintf('%s %02d:%02d:%02d', $date, $h, $m, $s);
    }

    private function randomUtcDateString(): string
    {
        $start = Carbon::now('UTC')->copy()->startOfYear();
        $end = Carbon::now('UTC');
        $ts = rand($start->timestamp, $end->timestamp);

        return gmdate('Y-m-d', $ts);
    }

    private function reportProgress(string $label): void
    {
        $this->progressStep++;
        $pct = 100 * $this->progressStep / self::PROGRESS_STEPS;
        $elapsed = microtime(true) - $this->seedStartedAt;
        $eta = $this->progressStep > 0 && $this->progressStep < self::PROGRESS_STEPS
            ? ($elapsed / $this->progressStep) * (self::PROGRESS_STEPS - $this->progressStep)
            : 0.0;
        $msg = sprintf(
            '[BulkDemo] %s — %.0f %% — écoulé %.0fs — reste ~%.0fs',
            $label,
            $pct,
            $elapsed,
            $eta
        );
        $this->command?->info($msg);
    }

    /**
     * Insert groupé avec repli : demi-chunks puis ligne à ligne en cas d’échec.
     *
     * @param  array<int, array<string, mixed>>  $rows
     */
    private function safeInsert(string $table, array $rows): void
    {
        if ($rows === []) {
            return;
        }

        try {
            DB::table($table)->insert($rows);
        } catch (Throwable $e) {
            if (count($rows) === 1) {
                $this->command?->warn("[BulkDemo] Ignoré ($table) : ".$e->getMessage());

                return;
            }
            $mid = (int) floor(count($rows) / 2);
            if ($mid < 1) {
                $mid = 1;
            }
            $this->safeInsert($table, array_slice($rows, 0, $mid));
            $this->safeInsert($table, array_slice($rows, $mid));
        }
    }

    /**
     * @param  array<int, array<string, mixed>>  $rowBatches
     */
    private function flushChunks(string $table, array &$rowBatches): void
    {
        if ($rowBatches === []) {
            return;
        }
        $this->safeInsert($table, $rowBatches);
        $rowBatches = [];
    }

    private function randomGeoTriple(Division $divisionModel, SubDivision $subModel): array
    {
        $divisionsByRegion = $divisionModel->newQuery()
            ->get(['id', 'region_id'])
            ->groupBy('region_id');

        $subsByDivision = $subModel->newQuery()
            ->get(['id', 'division_id'])
            ->groupBy('division_id');

        $regionIds = $divisionsByRegion->keys()->filter()->values()->all();
        if ($regionIds === []) {
            throw new \RuntimeException('Aucune région / division pour le seed.');
        }

        for ($attempt = 0; $attempt < 50; $attempt++) {
            $rid = $regionIds[array_rand($regionIds)];
            $divs = $divisionsByRegion->get($rid);
            if (! $divs || $divs->isEmpty()) {
                continue;
            }
            $div = $divs->random();
            $subs = $subsByDivision->get($div->id);
            if (! $subs || $subs->isEmpty()) {
                continue;
            }

            return [$rid, $div->id, $subs->random()->id];
        }

        $firstDiv = $divisionModel->newQuery()->firstOrFail();
        $firstSub = $subModel->newQuery()->where('division_id', $firstDiv->id)->firstOrFail();

        return [$firstDiv->region_id, $firstDiv->id, $firstSub->id];
    }

    public function run(): void
    {
        $this->seedStartedAt = microtime(true);
        $this->progressStep = 0;

        $divisionModel = new Division;
        $subModel = new SubDivision;

        $services = Service::pluck('id')->all();
        $geoIds = MembreDuCabinet::where('type_membre', 'geometre')->pluck('id')->all();
        $notIds = MembreDuCabinet::where('type_membre', 'notaire')->pluck('id')->all();
        $admin = User::where('email', 'super_admin@app.com')->first();

        if ($services === [] || $geoIds === [] || $notIds === [] || ! $admin) {
            $this->command?->warn('BulkDemoSeeder: prérequis manquants (services, membres, admin).');

            return;
        }

        $prevTz = (string) (DB::selectOne('SELECT @@session.time_zone AS tz')->tz ?? 'SYSTEM');
        DB::unprepared("SET SESSION time_zone = '+00:00'");

        try {

        $nowUtc = Carbon::now('UTC')->format('Y-m-d H:i:s');
        $zones = ['urbain', 'rurale'];
        $etatsTerrain = ['batit', 'non_batit'];

        // --- Utilisateurs supplémentaires ---
        $currentUsers = User::count();
        $usersToAdd = max(0, self::TARGET_TOTAL_USERS - $currentUsers);
        if ($usersToAdd > 0) {
            $batch = 200;
            for ($offset = 0; $offset < $usersToAdd; $offset += $batch) {
                $n = min($batch, $usersToAdd - $offset);
                try {
                    User::factory()->count($n)->create();
                } catch (Throwable $e) {
                    $this->command?->warn('[BulkDemo] Lot utilisateurs ('.$n.') : '.$e->getMessage());
                    for ($j = 0; $j < $n; $j++) {
                        try {
                            User::factory()->create();
                        } catch (Throwable $e2) {
                            $this->command?->warn('[BulkDemo] Utilisateur ignoré : '.$e2->getMessage());
                        }
                    }
                }
            }
        }
        $this->reportProgress('Utilisateurs');

        $allUserIds = User::pluck('id')->all();

        // --- Titres fonciers supplémentaires (insert SQL) ---
        $currentTf = DB::table('titre_fonciers')->count();
        $tfToAdd = max(0, self::TARGET_TOTAL_TITRE_FONCIERS - $currentTf);
        $tfRows = [];

        for ($k = 0; $k < $tfToAdd; $k++) {
            [$rid, $did, $sid] = $this->randomGeoTriple($divisionModel, $subModel);
            $created = $this->randomUtcDatetimeString();
            $num = 'BULK-TF-' . str_pad((string) ($k + 1), 7, '0', STR_PAD_LEFT);

            $tfRows[] = [
                'uuid' => (string) Str::uuid(),
                'numero_titre_foncier' => $num,
                'numero_conservation' => (string) rand(1, 9999),
                'date_de_delivrance_du_TF' => $this->randomUtcDateString(),
                'numero_du_duplicata' => '1',
                'type_personne' => $k % 2 === 0 ? 'physique' : 'morale',
                'region_id' => $rid,
                'division_id' => $did,
                'sub_division_id' => $sid,
                'land_id' => null,
                'groupement' => null,
                'lieu_dit' => 'Secteur ' . ($k % 200),
                'zone' => $zones[$k % 2],
                'numero_folio' => (string) (($k % 99) + 1),
                'volume' => '1',
                'superficie_du_TF_mere' => (string) (2000 + ($k % 8000)),
                'etat_TF' => 'DISPONIBLE',
                'etat_terrain' => $etatsTerrain[$k % 2],
                'provenance_TF' => 'mutation_totale',
                'numero_bordereau_analytique' => null,
                'limit_nord' => 'route',
                'limit_sud' => 'route',
                'limit_est' => 'route',
                'limit_ouest' => 'route',
                'is_vip' => 0,
                'taxFoncier_amount' => rand(5000, 50000),
                'status_tax' => 'non_payer',
                'national_code' => null,
                'created_at' => $created,
                'updated_at' => $created,
            ];

            if (count($tfRows) >= self::INSERT_CHUNK) {
                $this->flushChunks('titre_fonciers', $tfRows);
            }
        }
        $this->flushChunks('titre_fonciers', $tfRows);
        $this->reportProgress('Titres fonciers');

        $tfIds = DB::table('titre_fonciers')->pluck('id')->all();

        // --- Immatriculations directes ---
        $currentImmat = DB::table('immatriculation_directes')->count();
        $immatToAdd = max(0, self::TARGET_TOTAL_IMMATRICULATIONS - $currentImmat);
        $statuts = ['En cours', 'En instruction', 'Clôturé', 'En attente'];
        $immatRows = [];

        for ($i = 0; $i < $immatToAdd; $i++) {
            [$rid, $did, $sid] = $this->randomGeoTriple($divisionModel, $subModel);
            $created = $this->randomUtcDatetimeString();
            $immatRows[] = [
                'uuid' => (string) Str::uuid(),
                'reference' => 'IMMAT-BULK-' . str_pad((string) ($i + 1), 6, '0', STR_PAD_LEFT),
                'localisation' => 'RCA',
                'region_id' => $rid,
                'division_id' => $did,
                'sub_division_id' => $sid,
                'statut' => $statuts[$i % count($statuts)],
                'StatutStyle' => 'primary',
                'created_at' => $created,
                'updated_at' => $created,
            ];

            if (count($immatRows) >= self::INSERT_CHUNK) {
                $this->flushChunks('immatriculation_directes', $immatRows);
            }
        }
        $this->flushChunks('immatriculation_directes', $immatRows);
        $this->reportProgress('Immatriculations');

        // --- Ventes : compléter jusqu’à TARGET_TOTAL_SALES_FCFA (somme des montants) ---
        $gapFcfa = self::TARGET_TOTAL_SALES_FCFA - (float) Sale::sum('sales_amount');
        if ($gapFcfa > 1000 && $allUserIds !== []) {
            $nLines = min(10000, max(1, (int) ceil($gapFcfa / 30000)));
            $perLine = (int) floor($gapFcfa / $nLines);
            $remainder = (int) round($gapFcfa - ($perLine * $nLines));
            $saleTypes = ['taxe_fonciere', 'certificate_propriete', 'mutation'];
            $payStatuses = ['totally_paid', 'totally_paid', 'partially_paid'];

            $saleRows = [];
            for ($i = 0; $i < $nLines; $i++) {
                $amt = max(1, $perLine + ($i < $remainder ? 1 : 0));
                $created = $this->randomUtcDatetimeString();
                $saleRows[] = [
                    'uuid' => (string) Str::uuid(),
                    'sales_amount' => $amt,
                    'sales_type' => $saleTypes[$i % count($saleTypes)],
                    'user_id' => $allUserIds[array_rand($allUserIds)],
                    'payment_status' => $payStatuses[$i % count($payStatuses)],
                    'payment_method' => 'cash',
                    'created_by' => 'BulkDemoSeeder',
                    'created_at' => $created,
                    'updated_at' => $created,
                ];

                if (count($saleRows) >= self::INSERT_CHUNK) {
                    $this->flushChunks('sales', $saleRows);
                }
            }
            $this->flushChunks('sales', $saleRows);
        }
        $this->reportProgress('Ventes');

        // --- Lotissements (1 code par entrée, TF existant) ---
        $currentLots = DB::table('lotissements')->count();
        $lotsToAdd = max(0, self::TARGET_TOTAL_LOTISSEMENTS - $currentLots);
        if ($lotsToAdd > 0 && $tfIds !== []) {
            $geoId = $geoIds[array_rand($geoIds)];
            $lotRows = [];
            for ($i = 0; $i < $lotsToAdd; $i++) {
                $created = $this->randomUtcDatetimeString();
                $lotRows[] = [
                    'uuid' => (string) Str::uuid(),
                    'code' => 'LOT-BULK-' . str_pad((string) ($i + 1), 7, '0', STR_PAD_LEFT),
                    'titre_foncier_id' => $tfIds[array_rand($tfIds)],
                    'geometre_id' => $geoId,
                    'geometre_cabinet_id' => null,
                    'maeture' => null,
                    'promoteur_immobiliere' => null,
                    'lotisseur' => null,
                    'agent_immobiliere' => null,
                    'geometric' => null,
                    'urbaniste' => null,
                    'controlleur' => null,
                    'created_at' => $created,
                    'updated_at' => $created,
                ];

                if (count($lotRows) >= self::INSERT_CHUNK) {
                    $this->flushChunks('lotissements', $lotRows);
                }
            }
            $this->flushChunks('lotissements', $lotRows);
        }
        $this->reportProgress('Lotissements');

        // --- Opérations (volume pour graphiques) ---
        $currentOps = DB::table('operations')->count();
        $opsToAdd = max(0, self::TARGET_TOTAL_OPERATIONS - $currentOps);
        $types = [
            'mutation_totale_normale',
            'mutation_totale_par_deces',
            'morcellement_normale',
            'morcellement_forcee',
            'retrait_indivision_normale',
            'retrait_indivision_forcee',
            'immatriculation_directe',
            'lotissement',
        ];
        $geom = ['pending_payment', 'ongoing', 'completed', 'pending'];

        if ($opsToAdd > 0 && $tfIds !== []) {
            $opStatuses = ['en cour', 'terminer', 'en attente'];
            $validiteCp = Carbon::now('UTC')->addDays(30)->format('Y-m-d');
            $opRows = [];
            for ($i = 0; $i < $opsToAdd; $i++) {
                $created = $this->randomUtcDatetimeString();
                $opRows[] = [
                    'uuid' => (string) Str::uuid(),
                    'numero_operation' => 'OP-BULK-' . str_pad((string) ($i + 1), 8, '0', STR_PAD_LEFT),
                    'type_operation' => $types[$i % count($types)],
                    'status' => $opStatuses[$i % 3],
                    'requestor_id' => $allUserIds[array_rand($allUserIds)],
                    'titre_foncier_id' => $tfIds[array_rand($tfIds)],
                    'immatriculation_directe_id' => null,
                    'certificate_prioprietes_id' => null,
                    'service_id' => $services[array_rand($services)],
                    'validite_CP' => $validiteCp,
                    'numero_reference_CP' => 'CP-B-' . $i,
                    'numero_reference_CU' => 'CU-B-' . $i,
                    'geometre_id' => $geoIds[array_rand($geoIds)],
                    'numero_reference_plan' => 'PLAN-B-' . $i,
                    'etat_cession_id' => null,
                    'commantaires_geometre' => null,
                    'numero_reference_quittance_etat_cession' => null,
                    'statut_geometre' => $geom[$i % count($geom)],
                    'notaire_id' => $notIds[array_rand($notIds)],
                    'lotissement_id' => null,
                    'numero_reference_acte_expidition' => null,
                    'statut_notaire' => 'ongoing',
                    'commantaires_notaire' => null,
                    'conservateur_id' => $admin->id,
                    'prix' => rand(100000, 5000000) / 100,
                    'numero_reference_quittance_ordre_versement' => null,
                    'bordereau_analytique_id' => null,
                    'statut_conservateur' => 'pending',
                    'commantaires_conservateur' => null,
                    'created_at' => $created,
                    'updated_at' => $created,
                    'deleted_at' => null,
                ];

                if (count($opRows) >= self::INSERT_CHUNK) {
                    $this->flushChunks('operations', $opRows);
                }
            }
            $this->flushChunks('operations', $opRows);
        }
        $this->reportProgress('Opérations');

        // --- Quelques liens TF ↔ usagers (graphique H/F) ---
        $pivotTarget = min(2000, count($tfIds) * 2);
        $pivotRows = [];
        for ($p = 0; $p < $pivotTarget; $p++) {
            $pivotRows[] = [
                'titre_foncier_id' => $tfIds[array_rand($tfIds)],
                'user_id' => $allUserIds[array_rand($allUserIds)],
                'created_at' => $nowUtc,
                'updated_at' => $nowUtc,
            ];
            if (count($pivotRows) >= self::INSERT_CHUNK) {
                $this->flushChunks('titrefoncier_user', $pivotRows);
            }
        }
        $this->flushChunks('titrefoncier_user', $pivotRows);
        $this->reportProgress('Liens TF ↔ usagers');

        $totalSec = microtime(true) - $this->seedStartedAt;
        $this->command?->info(sprintf('[BulkDemo] Terminé en %.1fs.', $totalSec));

        } finally {
            try {
                $escaped = str_replace("'", "''", $prevTz);
                DB::unprepared("SET SESSION time_zone = '{$escaped}'");
            } catch (Throwable) {
                // ignore
            }
        }
    }
}
