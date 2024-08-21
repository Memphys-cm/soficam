<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Service;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'id_card_number' => $this->faker->numerify('#########'),
            'place_of_birth' => $this->faker->city,
            'primary_phone_number' => $this->faker->phoneNumber,
            'secondary_phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'service_id' => Service::inRandomOrder()->first()->id, // Utilisation d'un ID valide
            'email' => $this->faker->unique()->safeEmail,
            'is_active' => 1,
            'sexe' => $this->faker->randomElement(['M', 'F']),
            'password' => bcrypt('password'), // mot de passe par défaut
            'is_mobility' => 0, // Défaut à 0
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
