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
        // Créer un utilisateur Admin
        User::create([
            'name' => 'berssainetest',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Créer un propriétaire
        $owner = Owner::create([
            'first_name' => 'jean',
            'last_name' => 'Dongmo',
            'email' => 'jean@gmail.com',
            'phone' => '+237676144495',
            'address' => 'Douala, Cameroun',
        ]);

        // Créer un bien immobilier
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
            'status' => 'available',
        ]);
    }
}