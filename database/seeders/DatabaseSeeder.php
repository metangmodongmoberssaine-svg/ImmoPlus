<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Owner;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Utilisateur Admin
        User::create([
            'name' => 'berssainetest',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Utilisateur Locataire (Indispensable pour tester les réservations)
        User::create([
            'name' => 'Alice Locataire',
            'email' => 'locataire@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'locataire',
        ]);

        // 3. Propriétaire
        $owner = Owner::create([
            'first_name' => 'jean',
            'last_name' => 'Dongmo',
            'email' => 'jean@gmail.com',
            'phone' => '+237676144495',
            'address' => 'Douala, Cameroun',
        ]);

        // 4. Bien immobilier N°1 (Validé / Disponible)
        Property::create([
            'owner_id' => $owner->id,
            'title' => 'Villa Moderne Akwa',
            'description' => 'Superbe villa avec jardin et piscine.',
            'type' => 'Villa',
            'price' => 350000,
            'address' => 'Rue Joffre',
            'city' => 'Douala',
            'bedrooms' => 4,
            'bathrooms' => 3,
            'area' => 250,
            'status' => 'available', // Visible sur la vitrine
        ]);

        // 5. Bien immobilier N°2 (En attente - Pour tester la validation Admin)
        Property::create([
            'owner_id' => $owner->id,
            'title' => 'Appartement Cosy Bastos',
            'description' => 'Appartement meublé idéal pour court séjour.',
            'type' => 'Appartement',
            'price' => 45000,
            'address' => 'Avenue Rosa Parks',
            'city' => 'Yaoundé',
            'bedrooms' => 2,
            'bathrooms' => 1,
            'area' => 85,
            'status' => 'available', // En attente de modération
        ]);
    }
}