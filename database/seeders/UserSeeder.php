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
            'first_name' => 'MENDOUGA',
            'last_name' => 'Antole Gervais',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'ADAMAOUA',
            'service_id' => '1',
            'email' => 'balg1a@gmail.com',
            'is_active' => 1,
            'sexe' => 'F',
            'is_mobility' => 1,
            'password' => bcrypt('password'),
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'ONAMBELE',
            'last_name' => 'Thierry Roland',
            'id_card_number' => '133454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Yaounde',
            'primary_phone_number' => '677550820',
            'secondary_phone_number' => '677550820',
            'address' => 'Yaounde',
            'service_id' => '2',
            'email' => 'atangana@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'is_mobility' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'FOTSO',
            'last_name' => 'Manfred Dieudonne',
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
            'first_name' => 'EPOH Ndame',
            'last_name' => 'yves',
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
            'first_name' => 'EBANE',
            'last_name' => 'Marthe Sophie',
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
            'first_name' => 'BISSECK',
            'last_name' => 'Raphael Arnaud',
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
            'first_name' => 'SONE',
            'last_name' => 'EHONE Christian ',
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
            'first_name' => 'AGBOR Titus',
            'last_name' => 'Quddus',
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
            'first_name' => 'BABA',
            'last_name' => 'Ahmadou',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '674328975',
            'secondary_phone_number' => '679054330',
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
            'first_name' => 'NJOYA',
            'last_name' => 'Malik',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '674328976',
            'secondary_phone_number' => '679065431',
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
            'first_name' => 'PRISO',
            'last_name' => 'Nael',
            'id_card_number' => '533454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Ebolowa',
            'primary_phone_number' => '674346976',
            'secondary_phone_number' => '679754331',
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
            'first_name' => 'MAGNE',
            'last_name' => 'Celstine',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '674328975',
            'secondary_phone_number' => '679054330',
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
            'first_name' => 'CHE',
            'last_name' => 'peter',
            'id_card_number' => '433454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Bamenda',
            'primary_phone_number' => '674346978',
            'secondary_phone_number' => '679675433',
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
            'first_name' => 'SONE',
            'last_name' => 'penda',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Limbe',
            'primary_phone_number' => '674346979',
            'secondary_phone_number' => '697967534',
            'address' => 'Limbe',
            'service_id' => '2',
            'email' => 'somependa@gmail.com',
            'is_active' => 1,
            'is_mobility' => 1,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'MOHAMADOU',
            'last_name' => 'Aminou',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '674390979',
            'secondary_phone_number' => '679674334',
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
            'first_name' => 'TAIGA',
            'last_name' => 'sadio',
            'id_card_number' => '133454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '689390979',
            'secondary_phone_number' => '690690432',
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
            'first_name' => 'ANEGOUE',
            'last_name' => 'mama',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '689430979',
            'secondary_phone_number' => '690690432',
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
            'first_name' => 'BISSECK',
            'last_name' => 'Marius',
            'id_card_number' => '233454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Kumba',
            'primary_phone_number' => '689430980',
            'secondary_phone_number' => '690690433',
            'address' => 'Kumba',
            'service_id' => '2',
            'email' => 'bisseck@gmail.com',
            'is_active' => 1,
            'sexe' => 'M',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        User::create([
            'uuid' => Str::uuid(),
            'first_name' => 'EWANE',
            'last_name' => 'Sorel',
            'id_card_number' => '533454432',
            // 'date_of_birth' => fake()->date(),
            'place_of_birth' => 'Douala',
            'primary_phone_number' => '689430981',
            'secondary_phone_number' => '690690434',
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
            'primary_phone_number' => '689430982',
            'secondary_phone_number' => '690690435',
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
            'primary_phone_number' => '655430982',
            'secondary_phone_number' => '690690436',
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
            'primary_phone_number' => '655430983',
            'secondary_phone_number' => '690690437',
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
            'primary_phone_number' => '655430984',
            'secondary_phone_number' => '690690438',
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
            'primary_phone_number' => '655430985',
            'secondary_phone_number' => '690690439',
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
