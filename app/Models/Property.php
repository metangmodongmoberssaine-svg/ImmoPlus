<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model {
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'title',
        'description',
        'type',
        'price',
        'address',
        'city',
        'bedrooms',
        'bathrooms',
        'area',
        'status',
        'image',
    ];
    //relation un bien appartenent a un proprietaire

    public function owner() {
        return $this->belongsTo(Owner::class);
    }
}
