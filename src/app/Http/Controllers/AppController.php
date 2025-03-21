<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;

class AppController extends Controller
{
    // Dashboard page with search
    public function index(Request $request)
    {
        $search = $request->query('search');
        $parties = Party::when($search, function ($query, $search) {
            return $query->searchByName($search);
        })->paginate(5);

        return view('dashboard', compact('parties', 'search'));
    }

    // Show the form to create a new party
    public function create()
    {
    return view('parties.create');
    }

// Store a new party in the database
    public function store(Request $request)
    {
    $validated = $request->validate([
        'full_name' => 'required|string|max:100',
        'Phone_no' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
    ]);

    Party::create($validated);

    return redirect()->route('dashboard')->with('success', 'Party created successfully!');
    }

    // Show a specific party's details
    public function show(Party $party)
    {
        return view('parties.show', compact('party'));
    }

    // Show the form to edit a party
    public function edit(Party $party)
    {
        return view('parties.edit', compact('party'));
    }

    // Update a party in the database
    public function update(Request $request, Party $party)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:100',
            'Phone_no' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        $party->update($validated);

        return redirect()->route('dashboard')->with('success', 'Party updated successfully!');
    }

    // Soft delete a party
    public function destroy(Party $party)
    {
        $party->delete();

        return redirect()->route('dashboard')->with('success', 'Party deleted successfully!');
    }
}