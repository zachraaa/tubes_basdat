<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use JWTFactory;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.verify',['except'=>['login','register']]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if ($token = JWTAuth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }
        // "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3YxL2F1dGgvbG9naW4iLCJpYXQiOjE2NTY0NjQwODgsImV4cCI6MTY1NjQ2NzY4OCwibmJmIjoxNjU2NDY0MDg4LCJqdGkiOiJrNENIbVhZRTBhWFMwelpHIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Gloj26NX822jn-bkJ7ba0kzYbW_oHs4dOIVRXWhlp-4"

        return response()->json(['error'=>'Unauthorized'],401);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(cons:['message' => 'Successfully logged out!']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTFactory::getTTL()*3600
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=>'error',
                'success'=>false,
                'error'=>$validator->errors()->toArray()
            ],400);
        }

        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
        ]);

        return response()->json([
            'message'=>'User has been created',
            'user'=>$user
        ]);
    }
}
