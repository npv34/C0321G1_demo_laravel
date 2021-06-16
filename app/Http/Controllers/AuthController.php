<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

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
}
