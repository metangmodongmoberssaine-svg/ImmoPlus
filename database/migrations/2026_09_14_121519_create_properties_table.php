<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            //il s'agit ici de la table owners
            $table->foreignId('owner_id')->constrained()->onDelete('cascade'); 
            $table->string('title');
            $table->text('description')->nullable();
            //comme exemple de type nous avons les maisons,appartements,studio,chambre,terrain
            $table->string('type');
            $table->decimal('price', 12, 2);
            $table->string('address');
            $table->string('city');
            $table->integer('bedrooms')->default(0);
            $table->integer('bathrooms')->default(0);
            //superficie
            $table->decimal('area', 8, 2);
            $table->enum('status', ['available', 'rented', 'sold'])->default('available');
            //il s'agit du schemin de limage principale
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
