<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ================= LOGIN =================
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 PRIORITAS 1: ADMIN HARUS KE DASHBOARD
            if ($user->role == 'admin') {
                return redirect('/dashboard');
            }

            // 🔥 PRIORITAS 2: USER → redirect ke halaman sebelumnya
            if ($request->redirect_to) {
                return redirect($request->redirect_to);
            }

            // 🔥 DEFAULT USER
            return redirect('/kontak-wilayah');
        }

        return back()->with('error', 'Email atau password salah');
    }

    // ================= REGISTER =================
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // default user
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }

    // ================= LOGOUT =================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/kontak-wilayah'); // ✅ arahkan ke sini
    }
}
