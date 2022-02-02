<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password,$user->password)){
            return response()->json([
                'message' => 'UNAUTHORIZED'
            ],401);
        }
        $user->tokens()->delete();
        $token = $user->createToken('token-name')->plainTextToken;
        return response()->json([
            "Message" => 'Success',
            'user' => $user,
            'token' => $token
        ]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json([
            "Message" => 'Logout Success',
        ]);
    }
}
