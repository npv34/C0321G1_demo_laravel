<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function login(Request $request) {
        $email = $request->email;
        $password = $request->password;

        $data = [
            'email' => $email,
            'password' => $password
        ];

        if (!Auth::attempt($data)) {
            return response()->json([
                'message' => 'Invalid login details'
            ]);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'data' => $user
        ]);
    }
}
