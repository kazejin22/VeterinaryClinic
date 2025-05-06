<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Invoice;

class UserAppointmentController extends Controller
{
    // =============================
    // TAMPIL FORM APPOINTMENT
    // =============================
    public function create()
    {
        // Ambil pet yang dimiliki oleh user yang login
        $pets = Pet::where('user_id', auth()->id())->get();
        $doctors = Doctor::all();  // Ambil semua dokter
        $services = Service::all(); // Ambil semua layanan

        return view('appointments.create', compact('pets', 'doctors', 'services'));
    }

    // =============================
    // SIMPAN APPOINTMENT
    // =============================
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'pet_id' => 'required',
            'doctor_id' => 'required',
            'service_id' => 'required',
            'time' => 'required|date',
        ]);

        // Menyimpan appointment baru ke database
        $appointment = Appointment::create([
            'pet_id' => $request->pet_id,
            'doctor_id' => $request->doctor_id,
            'service_id' => $request->service_id,
            'time' => $request->time,
            'status' => 'scheduled', // status default 'scheduled'
        ]);

        // Ambil layanan yang dipilih
        $service = Service::findOrFail($request->service_id);

        // Buat invoice otomatis
        $invoice = Invoice::create([
            'appointment_id' => $appointment->id,
            'invoice_number' => 'INV-' . strtoupper(bin2hex(random_bytes(6))), // Buat nomor invoice acak
            'time' => $appointment->time, // Gunakan waktu appointment untuk invoice
            'cost' => $service->cost,
        ]);

        // Redirect ke halaman thank you setelah appointment berhasil dibuat
        return redirect()->route('appointments.thankyou')->with('invoice', $invoice);
    }

    // =============================
    // HALAMAN TERIMA KASIH SETELAH APPOINTMENT DIBUAT
    // =============================
    public function thankyou(Request $request)
    {
        // Ambil invoice dari session atau URL parameter
        $invoice = $request->invoice;
        
        return view('appointments.thankyou', compact('invoice'));
    }

}
