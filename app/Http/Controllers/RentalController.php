<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Property;
use App\Models\User;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;

use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = Rental::with(['property', 'tenant'])->latest()->paginate(10);
        return view('rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::where('status', 'available')->get();
        $tenants = User::where('role', 'client')->get();
        return view('rentals.create', compact('properties', 'tenants'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRentalRequest $request)
    {
        $rental = Rental::create($request->validated());
        return redirect()->route('rentals.index')->with('success', 'contrat de location crée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rental $rental)
    {
        $rental->property()->update(['status' => 'available']);
        $rental->delete();

        return redirect()->route('rentals.index')->with('success', 'Contrat de location annulé.');
    }
}
