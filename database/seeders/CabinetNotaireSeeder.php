<?php

namespace Database\Seeders;

use App\Models\Cabinet;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CabinetNotaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabinet::create([
            'uuid' => Str::uuid(),
            'first_name' => 'John',
            'last_name' => 'Doe',
            'phone_number' => '0123456789',
            'address' => '123 Example Street',
            'post' => 'Senior notaire',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for($i=0 ; $i<50 ; $i++){

            Cabinet::create([
                'uuid' => Str::uuid(),
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'phone_number' => '0987654321',
                'address' => '456 Another Ave',
                'post' => 'Junior Notaire',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }

    }
}
