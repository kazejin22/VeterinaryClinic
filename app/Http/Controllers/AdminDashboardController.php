<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Invoice;
use App\Models\Pet;
use App\Models\Service;

class AdminDashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();
    if (!$user || $user->role !== 'admin') abort(403, 'Unauthorized access.');

    $data = [
        'users_count' => User::count(),
        'doctors_count' => Doctor::count(),
        'appointments_count' => Appointment::count(),
        'invoices_count' => Invoice::count(),
        'pets_count' => Pet::count(),
        'services_count' => Service::count(),
        'latest_appointments' => Appointment::latest()->take(5)->get(),
        'latest_invoices' => Invoice::latest()->take(5)->get(),
        'chartData' => [
        'Users' => User::count(),
        'Doctors' => Doctor::count(),
        'Appointments' => Appointment::count(),
        'Invoices' => Invoice::count(),
        'Pets' => Pet::count(),
        'Services' => Service::count(),
        ]
    ];

    return view('admin.dashboard', $data);
}

    

}
