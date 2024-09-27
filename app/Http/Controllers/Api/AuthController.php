<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\LoginRequest;

class AuthController extends BaseController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        try {
            if(!Auth::attempt($request->only(['email', 'password']))) {
                return $this->sendError('Your Email & Password does not match!', null, 401);
            }
    
            $user = $this->authService->login($request->email);
            $result = new AuthResource($user);
    
            return $this->sendResponse($result, 'User logged in successfully!', 200);
        } catch (Exception $e) {
            return $this->sendError($e->getMessage(), null, 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed'
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
