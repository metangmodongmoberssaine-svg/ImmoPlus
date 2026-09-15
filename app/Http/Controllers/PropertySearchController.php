<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertySearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Property::query()->where('status', 'available');

        // Filtre par ville
        if ($request->filled('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        // Filtre par type (appartement, maison, etc.)
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filtre par prix minimum
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        // Filtre par prix maximum
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $properties = $query->latest()->paginate(9);

        return view('search.index', compact('properties'));
    }
}