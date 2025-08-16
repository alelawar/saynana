<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function viewReg()
    {
        return view('register.index');
    }

    public function register(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $percentage = rand(10,20);
        $code = 'WELCOME-'. strtoupper(Str::random(6));

        $voucher = Voucher::create([
            'code' => $code,
            'percentage' => $percentage,
            'max_uses' => 1, 
            'is_public' => false, 
        ]);

        UserVoucher::create([
            'user_id' => $user->id,
            'voucher_id' => $voucher->id
        ]);

        // Log the user in
        return redirect('/login')->with('success', 'Registrasi Berhasil! Silahkan Login');
    }

    public function viewLog()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        $dataUser = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($dataUser)) {
            $request->session()->regenerate();
            return redirect('/profile')->with('success', 'Login Berhasil!');
        }

        return back()->with('error', 'Username / password salah!');
    }

    public function Logout() {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout Berhasil!');
    }
}
