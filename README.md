# ImmoPlus - Application de Gestion Immobilière

ImmoPlus est une application web conçue avec Laravel permettant de gérer des biens immobiliers, des propriétaires et des contrats de location.

##  Fonctionnalités principales
- Authentification et gestion des rôles (Admin, Agent, Propriétaire, Client)
- Gestion des propriétaires (CRUD)
- Gestion des biens immobiliers (CRUD, upload d'images, statuts)
- Gestion des contrats de location et réservations
- Recherche et filtrage avancé des biens

##  Technologies utilisées
- **Backend :** Laravel 11 / PHP 8.3
- **Base de données :** MySQl
- **Frontend :** Blade / Tailwind CSS (ou Bootstrap)
- **Gestionnaire de versions :** Git & GitHub

##  Installation et configuration locale
1. Cloner le projet : `https://github.com/metangmodongmoberssaine-svg/ImmoPlus.git`
2. Installer les dépendances : `composer install`
3. Copier le fichier `.env.example` vers `.env` et configurer la base de données.
4. Générer la clé d'application : `php artisan key:generate`
5. Lancer les migrations : `php artisan migrate`
6. Lancer le serveur local : `php artisan serve`

## 🧪 Données de test (Seeding)
Pour alimenter la base de données avec des comptes et biens de démonstration :
```bash
php artisan db:seed