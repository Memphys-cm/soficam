<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Sales\Sale;
use Illuminate\Support\Str;
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

            $requestor = User::first();
            $certificat_pro = CertificatePropriete::create([
                'uuid' => Str::uuid(),
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_proprietes_type' => collect(['personne_morale', 'personne_physique'])->random(),
                'certificate_propriete_reason' => fake()->sentence(20),
                'requestor_id' => $requestor->id,
                'price' => collect([25000, 50000, 75000, 20000])->random(),
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => fake()->randomDigitNotNull(10),
                'status' => collect(['pending_payment', 'expired', 'active'])->random(),
                'recorded_by' => User::role('super_admin')->first()->name,
            ]);

            $sale = Sale::create([
                'uuid' => Str::uuid(),
                'user_id' => $certificat_pro->requestor_id,
                'sales_amount' => $certificat_pro->price,
                'sales_type' => 'certificate_propriete',
                'created_by' => User::role('super_admin')->first()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'uuid' => Str::uuid(),
                'sale_id' => $sale->id,
                'price' => $certificat_pro->price,
                'quantity' => 1,
                'saleable_id' => $certificat_pro->id,
                'saleable_type' => 'App\Models\CertificatePropriete', // Adjust the namespace if different
                'created_by'  => User::role('super_admin')->first()->name,
            ];
            DB::table('saleables')->insert($saleableData);
        }

        for ($i = 0; $i < 50; $i++) {


            $requestor = User::first();
            $certificat_pro = CertificatePropriete::create([
                'uuid' => Str::uuid(),
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_proprietes_type' => collect(['personne_morale', 'personne_physique'])->random(),
                'certificate_propriete_reason' => fake()->sentence(20),
                'requestor_id' => $requestor->id,
                'price' => collect([20000, 30000, 40000, 50000])->random(),
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => fake()->randomDigitNotNull(10),
                'status' => collect(['pending_payment', 'expired', 'active'])->random(),
                'recorded_by' => User::role('super_admin')->first()->name,
            ]);

            $sale = Sale::create([
                'uuid' => Str::uuid(),
                'user_id' => $certificat_pro->requestor_id,
                'sales_amount' => $certificat_pro->price,
                'sales_type' => 'certificate_propriete',
                'created_by' => User::role('super_admin')->first()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'uuid' => Str::uuid(),
                'sale_id' => $sale->id,
                'price' => $certificat_pro->price,
                'quantity' => 2,
                'saleable_id' => $certificat_pro->id,
                'saleable_type' => 'App\Models\CertificatePropriete', // Adjust the namespace if different
                'created_by'  => User::role('super_admin')->first()->name,
            ];
            DB::table('saleables')->insert($saleableData);
        }

        for ($i = 0; $i < 50; $i++) {


            $requestor = User::first();
            $certificat_pro = CertificatePropriete::create([
                'uuid' => Str::uuid(),
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_proprietes_type' => collect(['personne_morale', 'personne_physique'])->random(),
                'certificate_propriete_reason' => fake()->sentence(20),
                'requestor_id' => $requestor->id,
                'price' => collect([20000, 40000, 60000, 80000])->random(),
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => fake()->randomDigitNotNull(10),
                'status' => collect(['pending_payment', 'expired', 'active'])->random(),
                'recorded_by' => User::role('super_admin')->first()->name,
            ]);

            $sale = Sale::create([
                'uuid' => Str::uuid(),
                'user_id' => $certificat_pro->requestor_id,
                'sales_amount' => $certificat_pro->price,
                'sales_type' => 'certificate_propriete',
                'created_by' => User::role('super_admin')->first()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'uuid' => Str::uuid(),
                'sale_id' => $sale->id,
                'price' => $certificat_pro->price,
                'quantity' => 3,
                'saleable_id' => $certificat_pro->id,
                'saleable_type' => 'App\Models\CertificatePropriete', // Adjust the namespace if different
                'created_by'  => User::role('super_admin')->first()->name,
            ];
            DB::table('saleables')->insert($saleableData);
        }

        for ($i = 0; $i < 50; $i++) {


            $requestor = User::first();
            $certificat_pro = CertificatePropriete::create([
                'uuid' => Str::uuid(),
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_proprietes_type' => collect(['personne_morale', 'personne_physique'])->random(),
                'certificate_propriete_reason' => fake()->sentence(20),
                'requestor_id' => $requestor->id,
                'price' => collect([10000, 20000, 30000, 40000])->random(),
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => fake()->randomDigitNotNull(10),
                'status' => collect(['pending_payment', 'expired', 'active'])->random(),
                'recorded_by' => User::role('super_admin')->first()->name,
            ]);

            $sale = Sale::create([
                'uuid' => Str::uuid(),
                'user_id' => $certificat_pro->requestor_id,
                'sales_amount' => $certificat_pro->price,
                'sales_type' => 'certificate_propriete',
                'created_by' => User::role('super_admin')->first()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'uuid' => Str::uuid(),
                'sale_id' => $sale->id,
                'price' => $certificat_pro->price,
                'quantity' => 4,
                'saleable_id' => $certificat_pro->id,
                'saleable_type' => 'App\Models\CertificatePropriete', // Adjust the namespace if different
                'created_by'  => User::role('super_admin')->first()->name,
            ];
            DB::table('saleables')->insert($saleableData);
        }

        for ($i = 0; $i < 50; $i++) {


            $requestor = User::first();
            $certificat_pro = CertificatePropriete::create([
                'uuid' => Str::uuid(),
                'titre_foncier_id' => TitreFoncier::pluck('id')->shuffle()->first(),
                'certificate_proprietes_type' => collect(['personne_morale', 'personne_physique'])->random(),
                'certificate_propriete_reason' => fake()->sentence(20),
                'requestor_id' => $requestor->id,
                'price' => collect([10000, 20000, 30000, 40000])->random(),
                'validity' => Carbon::now()->addMonths(3),
                'certificate_proprietes_number' => fake()->randomDigitNotNull(10),
                'status' => collect(['pending_payment', 'expired', 'active'])->random(),
                'recorded_by' => User::role('super_admin')->first()->name,
            ]);

            $sale = Sale::create([
                'uuid' => Str::uuid(),
                'user_id' => $certificat_pro->requestor_id,
                'sales_amount' => $certificat_pro->price,
                'sales_type' => 'certificate_propriete',
                'created_by' => User::role('super_admin')->first()->name,
            ]);

            // Create the Saleable item using only the specified information
            $saleableData = [
                'uuid' => Str::uuid(),
                'sale_id' => $sale->id,
                'price' => $certificat_pro->price,
                'quantity' => 5,
                'saleable_id' => $certificat_pro->id,
                'saleable_type' => 'App\Models\CertificatePropriete', // Adjust the namespace if different
                'created_by'  => User::role('super_admin')->first()->name,
            ];
            DB::table('saleables')->insert($saleableData);
        }

    }
}
