<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class UserPetController extends Controller
{
    // =============================
    // FORM TAMBAH PET
    // =============================
    public function create()
    {
        return view('pets.create');
    }

    // =============================
    // SIMPAN PET KE DATABASE
    // =============================
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'breed' => 'nullable|string|max:100',
            'age' => 'nullable|integer|min:0',
            'gender' => 'required|in:male,female',
        ]);

        // Menyimpan pet baru ke database
        Pet::create([
            'user_id' => auth()->id(),  // Menggunakan ID user yang sedang login
            'name' => $request->name,
            'species' => $request->species,
            'breed' => $request->breed,
            'age' => $request->age,
            'gender' => $request->gender,
        ]);

        // Redirect ke halaman dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Pet berhasil ditambahkan!');
    }
}
