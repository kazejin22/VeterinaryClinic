<?php

// ==================================
// INI ADALAH PAYMENT CONTROLLER
// SEBUAH FITUR YANG AKAN DATANG
// UNTUK SEKARANG BELUM ADA 
// KARENA AKU HARUS NGEJAR DEADLINE
// UNTUK PENGUMPULAN PROJECT KE DOSEN
// ==================================

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // =============================
    // MENAMPILKAN SEMUA PEMBAYARAN
    // =============================
    public function index()
    {
        // Mengambil semua pembayaran dengan relasi appointment
        $payments = Payment::with('appointment')->get();
        return view('admin.payments.index', compact('payments'));
    }

    // =============================
    // FORM BUAT PEMBAYARAN BARU
    // =============================
    public function create()
    {
        return view('admin.payments.create');
    }

    // =============================
    // SIMPAN DATA PEMBAYARAN BARU
    // =============================
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id', // appointment harus valid
            'amount' => 'required|numeric',
            'status' => 'required|in:paid,unpaid',
            'payment_date' => 'nullable|date',
        ]);

        // Simpan data ke database
        Payment::create([
            'appointment_id' => $request->appointment_id,
            'amount' => $request->amount,
            'status' => $request->status,
            'payment_date' => $request->payment_date,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.payments.index')->with('success', 'Payment berhasil ditambahkan!');
    }

    // =============================
    // UPDATE DATA PEMBAYARAN
    // =============================
    public function update(Request $request, Payment $payment)
    {
        // Validasi data input
        $request->validate([
            'amount' => 'required|numeric',
            'status' => 'required|in:paid,unpaid',
            'payment_date' => 'nullable|date',
        ]);

        // Update data payment
        $payment->update([
            'amount' => $request->amount,
            'status' => $request->status,
            'payment_date' => $request->payment_date,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully!');
    }

    // =============================
    // HAPUS DATA PEMBAYARAN
    // =============================
    public function destroy(Payment $payment)
    {
        // Hapus data dari database
        $payment->delete();

        // Redirect dengan notifikasi sukses
        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully!');
    }
}
