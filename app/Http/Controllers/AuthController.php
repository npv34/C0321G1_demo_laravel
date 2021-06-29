<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showFormLogin() {
        return view('login');
    }

    function showFormRegister() {
        return view('register');
    }

    function register(Request $request) {
        dd($request->all());
    }

    function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $data = [
          'email' => $email,
          'password' => $password
        ];

        if (!Auth::attempt($data)) {
            session()->flash('login-error','Tai khoan hoac mat khau khong chinh xac!');
            return redirect()->route('auth.showFormLogin');
        }

        return redirect()->route('admin.dashboard');
    }

    function logout() {
        Auth::logout();
        return redirect()->route('auth.showFormLogin');
    }
}
