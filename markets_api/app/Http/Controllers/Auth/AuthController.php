<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'msg' => 'User registered successfully',
            'data' => [compact('user', 'token')]
        ], 201);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'msg' => 'Credentials invalid',
                    'data' => []
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'msg' => 'Could not create token',
                'data' => []
            ], 500);
        }
        return response()->json(['msg' => 'Login user', 'data' => [compact('token')]]);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json([
                    'msg' => 'User not found',
                    'data' => []
                ], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json([
                'msg' => 'Token expired',
                'data' => []
            ], 401);
        } catch (TokenInvalidException $e) {
            return response()->json([
                'msg' => 'Token invalid',
                'data' => []
            ], 401);
        } catch (JWTException $e) {
            return response()->json([
                'msg' => 'Tokan absent',
                'data' => []
            ], 401);
        }
        return response()->json(compact('user'));
    }
}
