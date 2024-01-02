<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    public function login() {
        dd("Here");
    }

    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken("Api token")->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'Successfully created a user',
            'token' => $token
        ]);
    }
}
