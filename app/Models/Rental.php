<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory ;
    protected $fillable = [
         'property_id',
         'user_id',
         'start_date',
         'end_date',
         'monthly_rent',
         'deposit',
         'status',
         'terms',   
          ];

          //relation vers le bien immobilier
          public function property()
          {
            return $this ->belongsTo(Property::class);
          }

          //relation vers l'utilisateur (locataire)
          public function tenant() {
            return $this->belongTo(User::class, 'user_id');
          }
}
