<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appointment; // Corrected model name
use App\Models\Pet;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index(Request $request)
{
    $appointments = Appointment::query();

    if ($request->has('status') && $request->status != '') {
        $appointments->where('status', $request->status);
    }

    $appointments = $appointments->paginate(10);

    return view('admin.appointments.index', compact('appointments'));
}


    public function create()
    {
        $pets = Pet::all();
        $doctors = Doctor::all();
        $services = Service::all();
        return view('admin.appointments.create', compact('pets', 'doctors', 'services'));
    }

    public function store(Request $request)
{
    $request->validate([
        'pet_id' => 'required',
        'doctor_id' => 'required',
        'service_id' => 'required',
        'time' => 'required|date', // ← Sudah sesuai dengan kolom DB
        'status' => 'required|in:scheduled,completed,cancelled',
    ]);

    $appointment = Appointment::create([
        'pet_id' => $request->pet_id,
        'doctor_id' => $request->doctor_id,
        'service_id' => $request->service_id,
        'time' => $request->time,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.appointments.index')->with('success', 'Appointment created!');
}




    public function edit(Appointment $appointment)
{
    $pets = \App\Models\Pet::all();
    $doctors = \App\Models\Doctor::all();
    $services = \App\Models\Service::all();

    return view('admin.appointments.edit', compact('appointment', 'pets', 'doctors', 'services'));
}



    public function update(Request $request, Appointment $appointment) // Use the correct model name
    {
        $request->validate([
            'pet_id' => 'required',
            'doctor_id' => 'required',
            'service_id' => 'required',
            'time' => 'required|date',
            'status' => 'required|in:scheduled,completed,cancelled',
        ]);

        $appointment->update($request->all()); // Use the correct model name

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment updated successfully!');
    }

    public function destroy($id)
{
    $appointment = Appointment::findOrFail($id);

    // Hapus data
    $appointment->delete();

    // Kirim pesan sukses dengan warna merah
    return redirect()->route('admin.appointments.index')
                     ->with('success', 'Appointment successfully deleted!')
                     ->with('color', 'red');
}

}