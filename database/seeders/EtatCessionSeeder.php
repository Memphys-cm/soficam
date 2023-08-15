<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sales\Sale;
use App\Models\EtatCession;
use App\Models\SubDivision;
use App\Models\TitreFoncier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EtatCessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtatCession::flushEventListeners();

        for ($i = 0; $i < 25; $i++) {

            $etat_cession = EtatCession::create([
                'reference_etat_cession' => fake()->randomDigitNotNull(10),
                'type_personne' => collect(['morale','physique'])->random(),
                'zone' => collect(['terrain_urbain','terrain_rurale'])->random(),
                'type_operation' => collect(['bornage', 'morcellement', 'mutation_totale', 'retrait_indivision', 'immatriculation_direct', 'concession'])->random(),
                'status' => collect(['pending_payment', 'paid', 'cancelled', 'completed'])->random(),
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'sub_division_id' => SubDivision::pluck('id')->shuffle()->first(),
                'user_id' => User::role('user')->pluck('id')->shuffle()->first(),
                'superficie_en_m2' => fake()->randomDigitNot(5),
                'cout' => collect([25000, 50000])->random(),
                'frais_suplementaires' => 2500,
                'cout_etat_cession' => collect([25000, 50000, 75000, 20000])->random(),
            ]);

            $sale = Sale::create([
                'user_id' => $etat_cession->user_id,
                'sales_amount' => $etat_cession->cout_etat_cession,
                'sales_type' => 'EtatCession',
                'created_by' => User::role('super_admin')->first()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $etat_cession->cout_etat_cession,
                'quantity' => 1,
                'saleable_id' => $etat_cession->id,
                'saleable_type' => 'App\Models\EtatCession', // Adjust the namespace if different
                'created_by' => User::role('super_admin')->first()->name,
            ];
            DB::table('saleables')->insert($saleableData);
        }

    }
}
