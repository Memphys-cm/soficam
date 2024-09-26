<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'AGENT',
            'last_name' => ' ',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '1',
            'email' => 'agent@gmail.com',
            'is_active' => 1,
            'sexe' => 'F',
            'is_mobility' => 1,
            'password' => bcrypt('password'),
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'USAGER',
            'last_name' => 'G',
            'id_card_number' => '133454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Yaounde',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Yaounde',
            'service_id' => '2',
            'email' => 'usager@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'is_mobility' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'MENDOUGA',
            'last_name' => 'Antole Gervais (H)',
            'id_card_number' => '313454473',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'bafussam',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Badjoun',
            'service_id' => '2',
            'email' => 'koupit@gmail.com',
            'is_active' => 1,
            'sexe' => 'F',
            'is_mobility' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'Andela',
            'last_name' => 'Roger Fabien  (H)',
            'id_card_number' => '100342267',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Bamanedjou',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Bafussam',
            'service_id' => '2',
            'email' => 'chedjou@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'is_mobility' => 0,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'ONAMBELE',
            'last_name' => 'Jeanette',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '2',
            'email' => 'tengoua@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'is_mobility' => 0,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'Batoum',
            'last_name' => 'Roger',
            'id_card_number' => '133454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Edea',
            'service_id' => '2',
            'email' => 'ambassa@gmail.com',
            'is_active' => 1,
            'sexe' => 'F',
            'is_mobility' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'EPOH',
            'last_name' => 'Ndame yves ',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'yaounde',
            'service_id' => '2',
            'email' => 'ondoa@gmail.com',
            'is_active' => 1,
            'sexe' => 'F',
            'is_mobility' => 0,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'EBANE',
            'last_name' => 'Marthe Sophie',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '2',
            'email' => 'bidias@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'is_mobility' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'BISSECK',
            'last_name' => 'Marius',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Kumba',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Kumba',
            'service_id' => '2',
            'email' => 'bisseck@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'SONE',
            'last_name' => 'EHONE Christian ',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '2',
            'email' => 'baba@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'is_mobility' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'Abdoul ',
            'last_name' => 'Karim Yves ',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Foumban',
            'service_id' => '2',
            'email' => 'njoyaa@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'is_mobility' => 0,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'Ndifor',
            'last_name' => 'Ketus',
            'id_card_number' => '533454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Ebolowa',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Ebolowa',
            'service_id' => '2',
            'email' => 'priso1@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'is_mobility' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'AGBOR',
            'last_name' => 'Titus Quddus',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '2',
            'email' => 'magne@gmail.com',
            'is_active' => 1,
            'sexe' => 'F',
            'is_mobility' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'Njieh',
            'last_name' => 'Noel Evrard',
            'id_card_number' => '433454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Bamenda',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Bamenda',
            'service_id' => '2',
            'email' => 'cheperter@gmail.com',
            'is_active' => 1,
            'is_mobility' => 1,
            'sexe' => 'F',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);


        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'EDOA',
            'last_name' => 'Marie Antoinette',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Limbe',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Limbe',
            'service_id' => '2',
            'email' => 'somependa@gmail.com',
            'is_active' => 1,
            'is_mobility' => 1,
            'sexe' => 'F',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'MINLANG',
            'last_name' => 'Flore Yvette ',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '2',
            'email' => 'mohamadu@gmail.com',
            'is_active' => 1,
            'is_mobility' => 0,
            'sexe' => 'F',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'MPONDO',
            'last_name' => 'Din Gustave',
            'id_card_number' => '133454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Ambam',
            'service_id' => '2',
            'email' => 'tiaga@gmail.com',
            'is_active' => 1,
            'is_mobility' => 1,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);


        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'EYOUM',
            'last_name' => 'Daniel',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Logpom',
            'service_id' => '2',
            'email' => 'anegoue1@gmail.com',
            'is_active' => 1,
            'is_mobility' => 0,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);



        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'NGOSSO',
            'last_name' => 'Bell Yves',
            'id_card_number' => '533454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '694460898',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '2',
            'email' => 'ewane@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);


        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'MBEZELE',
            'last_name' => 'Henriette',
            'id_card_number' => '633454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Yaounde',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Mokolo',
            'service_id' => '2',
            'email' => 'mbezele@gmail.com',
            'is_active' => 1,
            'is_mobility' => 1,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);


        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'CHOFOR',
            'last_name' => 'Mirabelle',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Bamenda',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Bambili',
            'service_id' => '2',
            'email' => 'chofor@gmail.com',
            'is_active' => 1,
            'is_mobility' => 0,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);


        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'BESSANG',
            'last_name' => 'Yves',
            'id_card_number' => '833454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Basong',
            'service_id' => '2',
            'email' => 'bessang@gmail.com',
            'is_active' => 1,
            'is_mobility' => 0,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);


        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'NJIEH',
            'last_name' => 'Fridoline',
            'id_card_number' => '633454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '2',
            'email' => 'njieh@gmail.com',
            'is_active' => 1,
            'is_mobility' => 1,
            'sexe' => 'F',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'ESSO',
            'last_name' => 'Yves',
            'id_card_number' => '933454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '2',
            'email' => 'esso1@gmail.com',
            'is_active' => 1,
            'is_mobility' => 1,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);



        // for ($i = 0; $i < 50; $i++) {

        //     $user = User::create([
        //         'uuid' => Str::uuid(),
        //         'first_name' => 'MINLANG',
        //         'last_name' => 'Pauline',
        //         'id_card_number' => '633454432',
        //         // 'date_of_birth' => fake()->date(),
        //         'place_of_birth' => 'Douala',
        //         'primary_phone_number' => '655430986',
        //         'secondary_phone_number' => '690690440',
        //         'address' => 'ADAMAOUA',
        //         'service_id' => '2',
        //         'email' => 'minlang@gmail.com',
        //         'is_active' => 1,
        //         'sexe' => 'M',
        //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     ]);
        // } 
    }
}
