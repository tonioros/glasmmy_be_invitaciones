<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $access_token = $request->get('user_access_token');
        $token = Auth::attempt(['access_token' => $access_token, 'password' => '1']);
        if (!!$token) {
            $user = Auth::user();
            $user->api_token = $token;
            $user->save();

            return [
                'status' => 'success',
                'user' => $user,
                'type' => 'bearer',

            ];
        }

        return response()->json(['message' => 'Something went wrong'], 401);
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user->api_token = null;
        $user->save();

        return response()->json(['message' => 'You are successfully logged out'], 200);
    }
}
