<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister() {
        return view('backend.auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:60',
            'email' => 'required|email|min:8|max:30|unique:users',
            'password' => 'required|min:8|max:16'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        session(['user_id' => $user->id, 'user_name' => $user->name]);

        return redirect('dashboard')->with(["alert-type" => "success", "message" => "Register Sucessfully"]);
    }

    public function showLogin() {
        return view('backend.auth.login');
    }

    public function login(Request $request) {
        $request->validate([
             'email' => 'required|email|min:8|max:30',
            'password' => 'required|min:8|max:16'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id, 'user_name' => $user->name]);
            return redirect('dashboard');
        }

        return back()->with('fail', 'Invalid credentials');
    }

    public function dashboard() {
        return view('statstatistics.index', ['user' => session('user_name')]);
    }

    public function logout() {
        session()->flush();
        return redirect('login');
    }
}

