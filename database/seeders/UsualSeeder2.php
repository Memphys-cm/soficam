<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Collection;

class UsualSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer les IDs des utilisateurs et des titres fonciers
        $users = DB::table('users')->pluck('id');
        $titresFoncier = DB::table('immatriculation_directes')->pluck('id');

        // Convertir les IDs en collections pour faciliter les opérations
        $usersCollection = $users instanceof Collection ? $users : collect($users);
        $titresFoncierCollection = $titresFoncier instanceof Collection ? $titresFoncier : collect($titresFoncier);

        // Créer un tableau d'associations
        $associations = [];

        // Associer les titres fonciers aux utilisateurs
        foreach ($usersCollection as $userId) {
            // Vérifier que l'utilisateur existe dans la collection
            if ($usersCollection->contains($userId)) {
                // Prendre 5 titres fonciers aléatoires pour chaque utilisateur
                $randomTitles = $titresFoncierCollection->random(min(1, $titresFoncierCollection->count()));
                foreach ($randomTitles as $titleId) {
                    // Vérifier que le titre foncier existe dans la collection
                    if ($titresFoncierCollection->contains($titleId)) {
                        $associations[] = ['immatriculation_directe_id' => $titleId, 'user_id' => $userId];
                    }
                }
            }
        }

        // Insérer les données dans la table titrefoncier_user
        if (!empty($associations)) {
            DB::table('immatriculation_directe_user')->insert($associations);
        }

        // Assurez-vous que le rôle "user" existe
        $role = Role::where('name', 'user')->firstOrFail();

        // Identifier l'ID du premier utilisateur
        $firstUserId = User::orderBy('id')->value('id');

        // Assigner le rôle "user" à tous les utilisateurs sauf le premier
        User::where('id', '!=', $firstUserId)->each(function ($user) use ($role) {
            $user->assignRole($role);
        });
    }
}
