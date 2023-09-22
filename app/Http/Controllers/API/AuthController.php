<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_id' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user()
        ]);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'massage'=>$validator->errors()
            ], 422);
        }
        if (!($token = Auth::guard('api')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);

    }
}
