<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Tampilkan form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Tangani proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Validasi kredensial login
        if (Auth::attempt($credentials)) {
            
            // WAJIB ADA: Agar session login tidak hilang/nyangkut
            $request->session()->regenerate();

            $user = Auth::user();

            // Arahkan berdasarkan role pengguna
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard/mahasiswa');
            } elseif ($user->role === 'mhs') {
                return redirect()->intended('/');
            } elseif ($user->role === 'guest') {
                return redirect()->intended('/username');
            }

            // Fallback jika rolenya tidak ada yang cocok
            return redirect()->intended('/');
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    /**
     * Tampilkan form registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Tangani proses registrasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'mhs', // Set default role untuk pengguna baru
        ]);

        Auth::login($user);

        // Arahkan berdasarkan role pengguna baru
        if ($user->role === 'admin') {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }

    public function showForgotForm()
    {
        return view('auth.forgot-email'); // Memanggil file baru di langkah 1
    }

    public function verifyEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak terdaftar.']);
        }

        // Memanggil view yang sudah kita buat/rename tadi
        return view('auth.reset-password-direct', ['email' => $request->email]);
    }
    /**
     * Langsung eksekusi perubahan password di database
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Update password menggunakan Hash (PENTING!)
            $user->password = Hash::make($request->password); 
            $user->save();

            // Kirim pesan 'status' ke halaman login
            return redirect('/login')->with('status', 'Password berhasil diubah. Silakan login kembali.');
        }

        return back()->withErrors(['email' => 'User tidak ditemukan.']);
    }

    /**
     * Tangani proses logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
