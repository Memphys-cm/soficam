<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les IDs des utilisateurs et des titres fonciers
        // \App\Models\User::create([
        //     'first_name' => fake()->name(),
        //     'last_name' => fake()->name(),
        //     'sexe' => 'M', // Ajouter le sexe généré aléatoirement
        //     'id_card_number' => Str::random(11),
        //     'date_of_birth' => fake()->date(),
        //     'place_of_birth' => fake()->country(),
        //     'primary_phone_number' => fake()->phoneNumber(),
        //     'secondary_phone_number' => fake()->phoneNumber(),
        //     'address' => fake()->address(),
        //     'email' => 'super_admin@app.com',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ]);

        $user = User::where('email', 'super_admin@app.com')->first();

        $user->assignRole('super_admin');


    }
}
