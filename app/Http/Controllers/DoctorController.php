<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // ================================
    // TAMPILKAN SEMUA DOKTER + FILTER
    // ================================
    public function index(Request $request)
    {
        // Ambil data specialization unik dari semua dokter
        $specializations = Doctor::select('specialization')->distinct()->pluck('specialization');

        // Cek apakah ada filter specialization yang dipilih
        $query = Doctor::query();

        if ($request->has('specialization') && $request->specialization != '') {
            $query->where('specialization', $request->specialization);
        }

        // Ambil data dokter (filtered atau tidak)
        $doctors = $query->get();

        // Kirim data ke view index dokter
        return view('admin.doctors.index', compact('doctors', 'specializations'));
    }

    // =========================
    // SIMPAN DOKTER BARU
    // =========================
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'license_number' => 'required',
        ]);

        // Buat dokter baru dari input form
        Doctor::create($request->all());

        // Redirect dengan pesan sukses (warna hijau)
        return redirect()->route('admin.doctors.index')->with([
            'success' => 'Doctor added successfully!',
            'color' => 'green' // bisa 'green', 'yellow', 'red'
        ]);
    }

    // =========================
    // FORM EDIT DOKTER
    // =========================
    public function edit(Doctor $doctor)
    {
        // Kirim data dokter ke halaman edit
        return view('admin.doctors.edit', compact('doctor'));
    }

    // =========================
    // UPDATE DATA DOKTER
    // =========================
    public function update(Request $request, Doctor $doctor)
    {
        // Validasi data dari form
        $request->validate([
            'name' => 'required',
            'specialization' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'license_number' => 'required',
        ]);

        // Update data dokter
        $doctor->update($request->all());

        // Redirect ke halaman index dengan pesan sukses (warna kuning)
        return redirect()->route('admin.doctors.index')->with([
            'success' => 'Doctor updated successfully!',
            'color' => 'yellow'
        ]);
    }

    // =========================
    // HAPUS DATA DOKTER
    // =========================
    public function destroy(Doctor $doctor)
    {
        // Hapus dokter dari database
        $doctor->delete();

        // Redirect dengan pesan sukses (warna merah)
        return redirect()->route('admin.doctors.index')->with([
            'success' => 'Doctor deleted successfully!',
            'color' => 'red'
        ]);
    }

    // =========================
    // FORM CREATE DOKTER
    // =========================
    public function create()
    {
        // Tampilkan view untuk menambah dokter
        return view('admin.doctors.create');
    }

}