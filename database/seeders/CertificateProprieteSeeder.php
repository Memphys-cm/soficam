<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sales\Sale;
use App\Models\TitreFoncier;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CertificatePropriete;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificateProprieteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CertificatePropriete::flushEventListeners();

        for ($i = 0; $i < 25; $i++) {

            $certificat_pro = CertificatePropriete::create([
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_proprietes_type' => collect(['personne_morale', 'personne_physique'])->random(),
                'certificate_propriete_reason' => fake()->sentence(20),
                'requestor_id' => User::role('user')->pluck('id')->shuffle()->first(),
                'price' => collect([25000, 50000, 75000, 20000])->random(),
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => fake()->randomDigitNotNull(10),
                'status' => collect(['pending_payment', 'expired', 'active'])->random(),
                'recorded_by' => User::role('super_admin')->first()->name,
            ]);

            $sale = Sale::create([
                'user_id' => $certificat_pro->user_id,
                'sales_amount' => $certificat_pro->price,
                'sales_type' => 'CertificatePropriete',
                'created_by' => User::role('super_admin')->first()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'sale_id' => $sale->id,
                'price' => $certificat_pro->price,
                'quantity' => 1,
                'saleable_id' => $certificat_pro->id,
                'saleable_type' => 'App\Models\CertificatePropriete', // Adjust the namespace if different
                'created_by'  => User::role('super_admin')->first()->name,
            ];
            DB::table('saleables')->insert($saleableData);
        }
    }
}
