<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $cred = $request->only('email', 'password');
        if (Auth::attempt($cred)) {
            return redirect()->intended(route('reading'));
        }
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $data['password'] = Hash::make($request->password);
        $newUser = User::create($data);
        return redirect()->intended(route('login'));
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('home'));
    }
}
