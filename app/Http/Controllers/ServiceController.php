<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * =============================
     * TAMPILKAN SEMUA SERVICE
     * =============================
     * Menampilkan daftar seluruh layanan/service di halaman index
     */
    public function index()
    {
        $services = Service::all(); // Ambil semua data service
        return view('admin.services.index', compact('services'));
    }

    /**
     * =============================
     * FORM TAMBAH SERVICE
     * =============================
     * Menampilkan form untuk menambahkan layanan baru
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * =============================
     * SIMPAN SERVICE BARU
     * =============================
     * Menyimpan data service baru ke database setelah divalidasi
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        // Simpan data ke tabel services
        Service::create($request->all());

        return redirect()->route('admin.services.index')->with([
            'success' => 'Service added successfully!',
            'color' => 'green' // Optional: buat styling alert di frontend
        ]);
    }

    /**
     * =============================
     * FORM EDIT SERVICE
     * =============================
     * Menampilkan form edit untuk service tertentu
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * =============================
     * UPDATE DATA SERVICE
     * =============================
     * Memperbarui data service setelah divalidasi
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string',
            'cost' => 'required|numeric',
        ]);

        $service = Service::findOrFail($id); // Pastikan service-nya ada
        $service->update($request->all());   // Update data

        return redirect()->route('admin.services.index')->with([
            'success' => 'Service updated successfully!',
            'color' => 'yellow'
        ]);
    }

    /**
     * =============================
     * HAPUS SERVICE
     * =============================
     * Menghapus service dari database berdasarkan ID
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id); // Pastikan service ditemukan
        $service->delete(); // Hapus service

        return redirect()->route('admin.services.index')->with([
            'success' => 'Service successfully deleted!!',
            'color' => 'red'
        ]);
    }
}
