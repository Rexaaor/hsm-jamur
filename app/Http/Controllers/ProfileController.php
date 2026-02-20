<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Profile', [
            'user' => $request->user()
        ]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name'             => 'required|string|max:255',
            'no_wa'            => 'nullable|string|max:20',

            // password rules
            'current_password' => 'required_with:password',
            'password'         => 'nullable|min:8|confirmed',
        ]);

        // Cek password lama
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => 'Password lama tidak sesuai',
                ]);
            }

            $user->password = Hash::make($request->password);
        }

        $user->name  = $request->name;
        $user->no_wa = $request->no_wa;

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
