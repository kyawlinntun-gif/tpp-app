<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            if($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error!',
                    'errors' => $validateUser->errors()
                ], 401);
            }
    
            if(!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'Your Email & Password does not match!',
                ], 401);
            }
    
            $user = User::where('email', $request->email)->first();
    
            return response()->json([
                'status' => true,
                'message' => 'User logged in successfully!',
                'token' => $user->createToken('api')->plainTextToken
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);
    
            if($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error!',
                    'errors' => $validateUser->errors()
                ], 401);
            }
    
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
    
            return response()->json([
                'status' => true,
                'message' => 'User created successfully!',
                'user' => $user
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
