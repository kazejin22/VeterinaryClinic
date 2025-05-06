<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * =============================
     * TAMPILKAN FORM PROFIL USER
     * =============================
     * Menampilkan halaman edit profil dengan data user yang sedang login
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(), // Ambil data user dari request
        ]);
    }

    /**
     * =============================
     * UPDATE PROFIL USER
     * =============================
     * Menyimpan perubahan pada data user yang sedang login
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Isi data user dari input yang sudah divalidasi
        $request->user()->fill($request->validated());

        // Jika email berubah, reset verifikasi email
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Simpan perubahan
        $request->user()->save();

        // Redirect kembali ke halaman edit profil dengan status berhasil
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * =============================
     * HAPUS AKUN USER
     * =============================
     * Melakukan validasi password lalu menghapus akun user yang sedang login
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password sebelum menghapus akun
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user(); // Ambil user yang login

        Auth::logout(); // Logout dulu sebelum dihapus

        $user->delete(); // Hapus user dari database

        // Invalidate session & regenerasi token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return Redirect::to('/');
    }
}
