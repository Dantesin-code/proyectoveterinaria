<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{

    public function index()
    {
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        Pet::create([
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'age' => $request->age,
        ]);

        return redirect()->route('pets.index')->with('success', 'Mascota registrada con éxito.');
    }

    public function show(string $id)
    {
        // return view('pets/test');
    }

    public function edit(string $id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
        ]);

        $pet = Pet::findOrFail($id);
        $pet->update([
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'age' => $request->age,
        ]);

        return redirect()->route('pets.index')->with('success', 'Mascota actualizada con éxito.');
    }

    public function destroy(string $id)
    {
        $pet = Pet::findOrFail($id);

        $pet->delete();

        return redirect()->route('pets.index');
    }
}