<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;

class InvoiceController extends Controller
{
    // =============================
    // MENAMPILKAN SEMUA INVOICE
    // =============================
    public function index(Request $request)
    {
        $doctorName = $request->input('doctor_name');

        $invoices = Invoice::with(['appointment.pet.user', 'appointment.doctor', 'appointment.service'])
            ->when($doctorName, function ($query) use ($doctorName) {
                $query->whereHas('appointment.doctor', function ($q) use ($doctorName) {
                    $q->where('name', $doctorName);
                });
            })
            ->latest()
            ->get();

        $doctors = Doctor::orderBy('name')->get();

        return view('admin.invoices.index', compact('invoices', 'doctors'));
    }

    // =============================
    // FORM BUAT INVOICE BARU
    // =============================
    public function create()
    {
        $appointments = Appointment::doesntHave('invoice')->get();
        return view('admin.invoices.create', compact('appointments'));
    }

    // =============================
    // SIMPAN DATA INVOICE BARU
    // =============================
    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'cost' => 'required|numeric',
            'time' => 'required|date',
        ]);

        Invoice::create([
            'appointment_id' => $request->appointment_id,
            'invoice_number' => $request->invoice_number,
            'cost' => $request->cost,
            'time' => $request->time,
        ]);

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice berhasil dibuat!');
    }

    // =============================
    // MENAMPILKAN DETAIL INVOICE
    // =============================
    public function show(Invoice $invoice)
    {
        $invoice->load('appointment');
        return view('admin.invoices.show', compact('invoice'));
    }

    // =============================
    // FORM EDIT DATA INVOICE
    // =============================
    public function edit(Invoice $invoice)
    {
        $appointments = Appointment::all();
        return view('admin.invoices.edit', compact('invoice', 'appointments'));
    }

    // =============================
    // UPDATE DATA INVOICE
    // =============================
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'invoice_number' => 'required|unique:invoices,invoice_number,' . $invoice->id,
            'cost' => 'required|numeric',
            'time' => 'required|date',
        ]);

        $invoice->update([
            'invoice_number' => $request->invoice_number,
            'cost' => $request->cost,
            'time' => $request->time,
        ]);

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice berhasil diperbarui!');
    }

    // =============================
    // HAPUS DATA INVOICE
    // =============================
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('admin.invoices.index')->with('success', 'Invoice berhasil dihapus!');
    }
}