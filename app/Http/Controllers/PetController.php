<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{

    public function index(Request $request) {
        $users = User::all();
        $pets = Pet::with('user')->when($request->user_id, function ($query) use ($request) {
            return $query->where('user_id', $request->user_id);
        })->paginate(10);
        
        return view('admin.pets.index', compact('pets', 'users'));
    }

    public function create()
    {
        $owners = User::where('role', 'owner')->get();
        return view('admin.pets.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'species' => 'required',
            'breed' => 'nullable',
            'age' => 'nullable|integer|min:0',
            'gender' => 'required|in:male,female',
        ]);

        Pet::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'age' => $request->age,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.pets.index')->with('success', 'Pet added successfully!');
    }

    public function edit(Pet $pet)
{
    $owners = User::where('role', 'owner,user,admin')->get();
    return view('admin.pets.edit', compact('pet', 'owners'));
}


    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required',
            'species' => 'required',
            'breed' => 'nullable',
            'age' => 'nullable|integer|min:0',
            'gender' => 'required|in:male,female',
        ]);

        $pet->update([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'age' => $request->age,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin.pets.index')->with('success', 'Pet updated successfully!');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('admin.pets.index')->with('success', 'Pet deleted successfully!');
    }
    
}
