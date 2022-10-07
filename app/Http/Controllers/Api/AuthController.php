<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // return 'hello';
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($validator->fails()) {
            return response([
                'errors' => $validator->errors()->all()
            ], 422);
        }

        $request['password'] = Hash::make($request->password);
        $request['remember_token'] = Str::random(10);

        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        $message = ['token' => $token];
        $response = response()->json([
            'message' => $message,
        ]);

        return $message;
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($login)) {
            $data = 'Invalid Login Credentials';
            $code = 401;
        } else {
            $user = Auth::user();
            $token = $user->createToken('user')->accessToken;
            $code = 200;
            $data = [
                'user' => $user,
                'token' => $token,
            ];
        }

        return response()->json([
            'data' => $data,
        ], $code);
    }
}