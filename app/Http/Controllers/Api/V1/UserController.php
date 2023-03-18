<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $data  = $request->validationData();
        
        $data['password'] = Hash::make($request['password']);
        
        $user = User::create($data);
        $token = $user->createToken('api_token')->plainTextToken;
        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => config('sanctum.expiration') * 60
        ]);
    }
    
    public function login(UserLoginRequest $request)  
    {
        try {
            $credentials = $request->validationData();
            
            if (!auth()->attempt($credentials)) {
                throw new \Exception('Invalid credentials');
            }
            
            $user = User::where('email', $credentials['email'])->first();
            $user['token'] = $user->createToken('api_token')->plainTextToken;
            
            return new UserResource($user);
            
        }catch (\Exception $e) {
            return response()->json([
                'message' => 'Login failed.',
                'errors' => [ $e->getMessage()]
            ], 401);
        }
    }
}
