<?php

use App\Http\Controllers\{
    ProfileController,
    PetController,
    DoctorController,
    AppointmentsController,
    ServiceController,
    PaymentController,
    UserAppointmentController,
    UserPetController,
    InvoiceController,
    AdminDashboardController
};
use Illuminate\Support\Facades\{Route, Auth};

// ==============================
// DASHBOARD UMUM (SETELAH LOGIN)
// ==============================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================
// ROUTE UNTUK USER YANG LOGIN
// ==========================
Route::middleware('auth')->group(function () {

    // ------------------------
    // MANAJEMEN PROFIL
    // ------------------------
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ------------------------
    // RESOURCE ROUTES ADMIN
    // ------------------------
    Route::resource('/admin/doctors', DoctorController::class)->names('admin.doctors');
    Route::delete('/doctors/{doctor}', [DoctorController::class, 'destroy'])->name('admin.doctors.destroy');
    Route::resource('/admin/pets', PetController::class)->names('admin.pets')
    ->except(['show']) // 👉 Skip route show
    ->names('admin.pets');
    Route::get('admin/pets/{pet}/edit', [PetController::class, 'edit'])->name('admin.pets.edit');
    Route::resource('/admin/appointments', AppointmentsController::class)->names('admin.appointments');
    Route::resource('/admin/services', ServiceController::class)->names('admin.services');
    Route::resource('/admin/payments', PaymentController::class)->names('admin.payments');
    Route::resource('/admin/invoices', InvoiceController::class)->names('admin.invoices');
    

    // ------------------------
    // CUSTOM ROUTE PEMBAYARAN
    // ------------------------
    Route::post('/admin/payments', [PaymentController::class, 'store'])->name('admin.payments.store');
    Route::get('/admin/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('admin.payments.edit');
    Route::put('/admin/payments/{payment}', [PaymentController::class, 'update'])->name('admin.payments.update');
    Route::delete('/admin/payments/{payment}', [PaymentController::class, 'destroy'])->name('admin.payments.destroy');

    // Fallback jika akses create payment tanpa appointment ID
    Route::get('/admin/payments/create', function () {
        return redirect()->route('admin.appointments.index')
                         ->with('error', 'Appointment ID is required to create a payment.');
    })->name('admin.payments.create.fallback');

    // ------------------------
    // DASHBOARD ADMIN (ROLE CHECK)
    // ------------------------
    Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    });
});

// ==========================
// RUTE PUBLIK (TANPA LOGIN)
// ==========================
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/appointments', function () {
    return view('appointments');
})->name('appointments');

// ==================================
// RUTE KHUSUS UNTUK USER YANG LOGIN
// ==================================
Route::middleware('auth')->group(function () {

    // ------------------------
    // APPOINTMENT OLEH USER
    // ------------------------
    Route::get('/appointments/create', [UserAppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments/create', [UserAppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/thankyou', [UserAppointmentController::class, 'thankyou'])->name('appointments.thankyou');

    // ------------------------
    // PET YANG DIBUAT USER
    // ------------------------
    Route::get('/pets/create', [UserPetController::class, 'create'])->name('pets.create');
    Route::post('/pets', [UserPetController::class, 'store'])->name('pets.store');

    // ------------------------
    // LOGOUT
    // ------------------------
    Route::get('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    });
});

// ==========================
// ROUTE AUTENTIKASI DEFAULT
// ==========================
require __DIR__.'/auth.php';
