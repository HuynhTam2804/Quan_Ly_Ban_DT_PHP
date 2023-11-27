<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class APIAuthController extends Controller
{
    public function Login(){
        $acc = request(['ten_dang_nhap', 'password']);

        if (! $token = auth("api")->attempt($acc)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token, $acc);
    }

    protected function respondWithToken($token, $acc)
    {
        return response()->json([
            'Info' => $acc,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }
    
    public function Logout()
    {
        auth("api")->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
