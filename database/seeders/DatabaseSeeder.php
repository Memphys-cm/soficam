<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        
        $this->call(ServiceSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(SubDivisionSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);

        \App\Models\User::factory(1000)->create();
        \App\Models\User::create([
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'id_card_number' => Str::random(11),
            'date_of_birth' => fake()->date(),
            'place_of_birth' => fake()->country(),
            'primary_phone_number' => fake()->phoneNumber(),
            'secondary_phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'email' => 'super_admin@app.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $user = User::where('email','super_admin@app.com')->first();

        $user->assignRole('super_admin');


        $user_role = Role::where('name', 'user')->first();

        User::all()->each(function ($user) use ($user_role) {
            if (explode("@", $user->email)[1] !== "app.com") {
                return $user->assignRole($user_role);
            }
        });  
        
    }
}
