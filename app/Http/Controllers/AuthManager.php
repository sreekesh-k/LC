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
        return redirect(route('login'))->with('Error', 'invalid credintials');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user) {
            return redirect(route('register'))->with("Error", "Couldnt Register");
        }
        return redirect()->intended(route('login'))->with("Success", "You can now login");
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('home'));
    }
}
