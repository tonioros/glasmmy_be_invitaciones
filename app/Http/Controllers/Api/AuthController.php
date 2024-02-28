<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $access_token = $request->get('user_access_token');
        $access_token = $this->decode($access_token);
        $token = Auth::attempt(['access_token' => $access_token, 'password' => '1']);
        if (!!$token) {
            $user = Auth::user();
            $user->last_login = Carbon::now()->format("Y-m-d H:m:s");
            $user->api_token = $token;
            $user->save();
            return [
                'status' => 'success',
                'user' => $user,
                'type' => 'bearer',
            ];
        }
        return response()->json(['status' => 'failed', 'message' => 'El token de acceso no es valido, ingresa el token correcto'], 401);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->api_token = null;
        $user->save();
        return response()->json(['message' => 'You are successfully logged out'], 200);
    }

    public function decode($text)
    {
        $decoded = $text;
        for ($i = 0; $i <= 4; $i++) {
            $decoded = base64_decode($decoded);
        }
        return $decoded;
    }
}
